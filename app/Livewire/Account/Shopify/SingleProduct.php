<?php

namespace App\Livewire\Account\Shopify;
use App\Traits\FunctionTrait;
use App\Traits\RequestTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use App\Models\Shopifystores;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Symfony\Component\DomCrawler\Crawler;
use GuzzleHttp\Client;
use JmesPath;


class SingleProduct extends Component
{
    use LivewireAlert;
    use RequestTrait, FunctionTrait;
    private $client;

    public $urlsingle = ''; 
    public $publish = false;

    public function render()
    {
        return view('livewire.account.shopify.single-product');
    }

    public function __construct()
    {
        $this->client = new Client();
    }

    public function importsingleproduct() {

         try {
            $validated = $this->validate([
                'urlsingle' => 'required'
            ]);
        
            // Validation passed, continue with your logic
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, handle the error here
            $this->dispatch('reload-page');
            $this->alert('warning', __('url not valid!'));

            // Redirect back to the previous page with the validation errors
            return redirect()->back()->withErrors($e->validator);
        }
       
        $url = strtok($this->urlsingle, '?');
        $productData = null;

        if ($this->isAmazonUrl($url)) {
            // import Amazon Product

            Log::info("Detected Amazon URL, starting scrape.");
            try {
                $amazonProductData = $this->scrapeAmazonProduct($url);
                $productData = $this->transformAmazonProductData($amazonProductData);

            } catch (Exception $e) {
                Log::error("Amazon scraping error: " . $e->getMessage());
                return back()->with('error', 'Failed to scrape Amazon product: ' . $e->getMessage());
            }
        } elseif ($this->isEtsyUrl($url)) {
            // import Etsy Product
            Log::info("Detected Etsy URL, starting scrape.");
            try {
                $etsyProductData = $this->scrapeEtsyProduct($url);
                $productData = $this->transformEtsyProductData($etsyProductData); // Implement similar transformation for Etsy
            } catch (Exception $e) {
                Log::error("Etsy scraping error: " . $e->getMessage());
                return back()->with('error', 'Failed to scrape Etsy product: ' . $e->getMessage());
            }
        }else{

            // import Etsy Product

        $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
        $context = stream_context_create($opts);
        $html = file_get_contents($url . '.json', false, $context);
        $productData = json_decode($html, true);
        }
        $user_id = Auth::user()->id;
        $store = Shopifystores::where('user_id', $user_id)
                               ->where('status', 'active')
                               ->get(); 

        $storeArray = $store->toArray();
        $store = $storeArray[0];
        $publish = $this->publish;


        try {

            // working create product with images
            $productCreateMutation = 'productCreate (input: {' . $this->getGraphQLPayloadForProductPublishUrl($publish, $productData) . '},' . $this->getGraphQLPayloadForProductMedia($productData) . ') { 
                product {
                    id
                    title
                    options {
                        id
                        name
                        position
                        optionValues {
                          id
                          name
                          hasVariants
                        }
                      }
                      variants(first: 250) {
                        edges {
                          node {
                            id
                            title
                            price
                            sku
                          }
                        }
                      }
                        media(first: 10) {
                            nodes {
                            alt
                            mediaContentType
                            preview {
                                status
                            }
                            }
                        }
                  }
                  userErrors {
                    field
                    message
                  }
            }';

            // Log::info("Json file " . $productCreateMutation);
            $mutation = 'mutation { ' . $productCreateMutation . ' }';
            $endpoint = getShopifyURLForStore('graphql.json', $store);
            // Log::info("Json endpoint " . $endpoint);

            $headers = getShopifyHeadersForStore($store);
            $payload = ['query' => $mutation];
            
            $response = $this->makeAnAPICallToShopify('POST', $endpoint, null, $headers, $payload);
            // Log::info('Shopify API Response:', ['response' => $response]);
            
            // Check the response
            if (isset($response['statusCode']) && $response['statusCode'] == 200) {
               
                if (isset($response['body']['data']['productCreate']['userErrors']) && !empty($response['body']['data']['productCreate']['userErrors'])) {
                    $errors = $response['body']['data']['productCreate']['userErrors'];
                    $errorMessages = array_map(function($error) {
                        return $error['message'];
                    }, $errors);
                    return back()->with('error', 'Product creation failed: ' . implode(', ', $errorMessages));
                }

                  // Extract product ID
                  if (isset($response['body']['data']['productCreate']['product']['id'])) {
                    $productId = $response['body']['data']['productCreate']['product']['id'];
                    // You can use $productId for further processing
                    // Log::info('Product created successfully. Product ID: ' . $productId);

                }

                            // product variantes creation 
                        $productCreateVariantsBulkMutation = 'productVariantsBulkCreate (variants :[' . $this->getGraphQLPayloadForProductVariantsBulkCreate($productData, $productId) . '],productId :"'.$productId.'",strategy: REMOVE_STANDALONE_VARIANT,) { 
                            userErrors {
                            field
                            message
                            }
                            product {
                            id
                            options {
                                id
                                name
                                values
                                position
                                optionValues {
                                id
                                name
                                hasVariants
                                }
                            }
                            }
                            productVariants {
                            id
                            title
                            selectedOptions {
                                name
                                value
                            }
                            }
                    }';

                // Log::info("Json file " . $productCreateVariantsBulkMutation);

                $mutationVariants = 'mutation { ' . $productCreateVariantsBulkMutation . ' }';
                
                $endpoint = getShopifyURLForStore('graphql.json', $store);
                $headers = getShopifyHeadersForStore($store);
                $payload = ['query' => $mutationVariants];
                
                $response = $this->makeAnAPICallToShopify('POST', $endpoint, null, $headers, $payload);
                Log::info('Shopify API Response Variants:', ['response' => $response]);


                $user = Auth::user();
                // Incrémenter la valeur de 'importedproducts'

                if (is_null($user->importedproducts) || $user->importedproducts === '') {
                    $user->importedproducts = 0;
                    $user->save();
                }                
                $user->increment('importedproducts');
                $user->save();
                $this->dispatch('reload-page');
                $this->alert('success', __('Product Imported successfully'));

            } else {
                return back()->with('error', 'Product creation failed!');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Product creation failed: ' . $e->getMessage());
        }
}


// private function getGraphQLPayloadForProduct($productData, $publishproduct) {
  
//     $publishproduct = $publishproduct ? 'true' : 'false';

//     $temp = [];
//     $temp[] = 
//         ' title: "' . $productData['title'] . '",
//           published: ' . $publishproduct . ',
//           vendor: "Scraped Vendor" ';
    
//     $escapedDescriptionHtml = json_encode($productData['description']);
//     $temp[] = ' descriptionHtml: ' . $escapedDescriptionHtml . '';

//     if (isset($productData['variants']) && is_array($productData['variants'])) {
//         $temp[] = 'variants: [' . $this->getVariantsGraphQLConfig($productData['variants'],$productData['price']) . ']';
//     }
//     Log::info("temp[] variants  ".$temp);

//     if (isset($productData['images']) && is_array($productData['images'])) {
//         $temp[] = 'images: [' . $this->getImagesGraphQLConfig($productData['images']) . ']';
//     }
//     Log::info("temp[] images  ".$temp);

//     Log::info("getGraphQLPayloadForProduct END ");
//     Log::info("getGraphQLPayloadForProduct END aff ".$temp);

//     return implode(',', $temp);
// }

// private function getVariantsGraphQLConfig($variants,$price) {
//     $str = [];
//     foreach ($variants as $variant) {
//         Log::info("getGraphQLPayloadForProduct variant variant: " . json_encode($variant));

//       $formattedOptionValues = implode('", "', $variant['info']);
//       Log::info(" variant variant: " . $variant['info']);
//       Log::info(" variant variant formattedOptionValues: " . $formattedOptionValues);


//         $str[] = '{
//             taxable: false,
//             title: "' . $variant['info'] . '",
//             price: ' . $price . ',
//             inventoryManagement: null,
//             inventoryPolicy: DENY
//         }';
//     }
//     return implode(',', $str); 
// }

// private function getImagesGraphQLConfig($images) {
//     $str = [];
//     foreach ($images as $image) {
//         $str[] = '{
//             src: "' . $image . '",
//         }';
//     }
//     return implode(',', $str); 
// }

private function isAmazonUrl($url)
{
    return preg_match('/^(https?:\/\/)?(www\.)?amazon\.[a-z]{2,6}\/.*$/', $url);
}

private function isEtsyUrl($url)
{
    return preg_match('/^(https?:\/\/)?(www\.)?etsy\.[a-z]{2,6}\/.*$/', $url);
}

 

//scrapping etsy product 
    private function scrapeEtsyProduct($url)
{
    $response = $this->client->get($url, [
        'headers' => [
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
            'Accept-Language' => 'en-US,en;q=0.9',
            'Accept-Encoding' => 'gzip, deflate, br',
        ]
    ]);
    $html = $response->getBody()->getContents();
    $crawler = new Crawler($html);
   
    // Scrape title
    $titleNode = $crawler->filter('h1[data-buy-box-listing-title="true"]');
    if ($titleNode->count() === 0) {
        throw new \Exception("Product title not found");
    }
    $title = $titleNode->text();
 
    // Scrape description
    $descriptionNode = $crawler->filter('.wt-text-body-01.wt-break-word');
    $description = $descriptionNode->each(function (Crawler $node) {
        return $node->text();
    });

    // Scrape product images
    $images = $crawler->filter('.wt-list-unstyled.carousel-pane-list li img')->each(function (Crawler $node) {
        return $node->attr('src');
    });

    // Filter out unwanted images
    $filteredImages = array_filter($images, function ($src) {
        // Filter out images that are placeholders or have the 'play-button' in the URL
        return strpos($src, 'play-button') === false && strpos($src, 'transparent-pixel') === false;
    });

    // Optionally, you might want to remove small image versions
    $filteredImages = array_map(function ($src) {
        return preg_replace('/(_AC_US\d+_\.jpg)$/', '.jpg', $src);
    }, $filteredImages);

    // Scrape price
    $priceNode = $crawler->filter('.wt-text-title-larger.wt-mr-xs-1.wt-text-slime, .wt-text-title-larger.wt-mr-xs-1');
    if ($priceNode->count() > 0) {
        $priceText = $priceNode->text();
        // Extract numerical value using regex
        if (preg_match('/(\d+[,.]\d+)/', $priceText, $matches)) {
            $price = $matches[1]; // Extracts the first match, which should be the price in format "18,03"
            $price = str_replace(',', '.', $price); // Convert comma to dot if necessary
        } else {
            $price = 'Price not available';
        }
    } else {
        $price = 'Price not available';
    }
    // Handle variants extraction if applicable
    // This needs to be adapted to Etsy's structure
    // Scrape variants
    $variants = [];
    $variantNodes = $crawler->filter('div[data-selector="listing-page-variation"]');
    $variantNodes->each(function (Crawler $variantNode) use (&$variants) {
        $labelNode = $variantNode->filter('label');
        $label = $labelNode->count() > 0 ? $labelNode->text() : 'No label';

        $options = [];
        $optionNodes = $variantNode->filter('option');
        $optionNodes->each(function (Crawler $optionNode) use (&$options) {
            if ($optionNode->attr('value') !== '') {
                $options[] = $optionNode->text();
            }
        });

        $variants[] = ['label' => $label, 'options' => $options];
    });

    $productData = [
        'title' => $title,
        'description' => $description,
        'images' => array_values($filteredImages),
        'price' => $price,
        'variants' => $variants,
    ];

    // Log the product data
    // Log::info($productData);

    return response()->json($productData);
    }


    //scrapping Amazon product 
    private function scrapeAmazonProduct($url)
    {

               // $response = $this->client->get($this->urlsingle);
               $response = $this->client->get($url, [
                'headers' => [
                    'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
                    'Accept-Language' => 'en-US,en;q=0.9',
                    'Accept-Encoding' => 'gzip, deflate, br',
                ]
            ]);
            $html = $response->getBody()->getContents();
            $crawler = new Crawler($html);
           
            $titleNode = $crawler->filter('#productTitle');
            if ($titleNode->count() === 0) {
                throw new \Exception("Product title not found");
            }
            $title = $titleNode->text();

            $descriptionNode = $crawler->filter('#feature-bullets ul li span');
            $description = $descriptionNode->each(function (Crawler $node) {
                return $node->text();
            });
    
            // Scrape product images
            $images = $crawler->filter('.a-unordered-list.a-nostyle.a-button-list.a-vertical.a-spacing-top-micro.regularAltImageViewLayout img')->each(function (Crawler $node) {
                return $node->attr('src');
            });
    
            // If no images found, try the second list structure
            if (empty($images)) {
                $images = $crawler->filter('.a-unordered-list.a-nostyle.a-button-list.a-vertical.a-spacing-top-micro.gridAltImageViewLayoutIn1x7 img')->each(function (Crawler $node) {
                    $src = $node->attr('src');
                    // Attempt to get the larger version of the image
                    $highResSrc = preg_replace('/\._AC_US\d+_\.jpg$/', '.jpg', $src);
                    return $highResSrc;
                });
            }
            // Filter out unwanted images
            $filteredImages = array_filter($images, function ($src) {
                // Filter out images that are placeholders or have the 'play-button' in the URL
                return strpos($src, 'play-button') === false && strpos($src, 'transparent-pixel') === false;
            });
    
            // Optionally, you might want to remove small image versions
            $filteredImages = array_map(function ($src) {
                return preg_replace('/(_AC_US\d+_\.jpg)$/', '.jpg', $src);
            }, $filteredImages);
    
            // Handle price extraction with specific structure
            $price = null;

            $wholePrice = $crawler->filter('.a-price-whole')->first();
            $fractionPrice = $crawler->filter('.a-price-fraction')->first();
            $priceSymbol = $crawler->filter('.a-price-symbol')->first();

            if ($wholePrice->count() > 0 && $fractionPrice->count() > 0 && $priceSymbol->count() > 0) {
                $price = $wholePrice->text() . '.' . $fractionPrice->text();
            } else {
                // Fallback to previous selectors
                $priceSelectors = [
                    '#priceblock_ourprice',        // Standard price
                    '#priceblock_dealprice',       // Deal price
                    '#priceblock_saleprice',       // Sale price
                    '#buyNewSection .a-color-price', // "Buy New" price
                    '#price_inside_buybox',        // Inside buy box price
                    '.offer-price'                 // Offer price
                ];

                foreach ($priceSelectors as $selector) {
                    $priceNode = $crawler->filter($selector);
                    if ($priceNode->count() > 0) {
                        $price = trim($priceNode->text());
                        // Normalize the price format by replacing comma with period
                        $price = str_replace(',', '.', $price);
                        break;
                    }
                }
            }

            if (is_null($price)) {
                $price = 'Price not available';
            } else {
                // Ensure the price is a valid float format
                $price = number_format((float)$price, 2, '.', '');
            }
    
            $variants = $this->scrapeAmazonVariants($html);
    
    
            $productData = [
                'title' => $title,
                'description' => $description,
                'images' => array_values($filteredImages),
                'price' => $price,
                'variants' => $variants,
            ];
    
            // Log the product data
            Log::info($productData);

            return $productData;
    }

    private function scrapeAmazonVariants($html)
    {
        $variants = [];
        
        // Regular expression to extract the JSON data for variants
        if (preg_match('/dimensionValuesDisplayData"\s*:\s*(\{.+?\}),\n/', $html, $matches)) {
            $jsonData = $matches[1];
            $variantData = json_decode($jsonData, true);

            // Iterate over each variant and extract ASIN and other relevant information
            foreach ($variantData as $key => $value) {
                $variantAsin = $key;
                $variantInfo = $value;

                // Additional details like price might need separate extraction

                $variants[] = [
                    'asin' => $variantAsin,
                    'info' => $variantInfo,
                ];
            }
        } else {
            Log::warning('No variant data found in the HTML.');
        }

        return $variants;
    }


    private function transformAmazonProductData($amazonProductData) {
        $descriptionHtml = implode('<br>', $amazonProductData['description']);
        
        // Transform images array into the required format
        $images = array_map(function($url) {
            return ['src' => $url];
        }, $amazonProductData['images']);
    
        // Ensure the price is in the correct format
        $price = str_replace(',', '.', $amazonProductData['price']);
    
    
        // Transform variants array into the required format
        $variants = array_map(function($variant) use ($amazonProductData) {
            $variantInfo = is_array($variant['info']) ? implode(', ', $variant['info']) : $variant['info'];
            return [
                'title' => $amazonProductData['title'] . ' - ' . $variantInfo,
                'price' => $amazonProductData['price'],
                'compare_at_price' => null,
                'sku' => $variant['asin'],
                'option1' => isset($variant['info'][0]) ? $variant['info'][0] : null,
                'option2' => isset($variant['info'][1]) ? $variant['info'][1] : null,
                'option3' => isset($variant['info'][2]) ? $variant['info'][2] : null,
                'position' => 1 // Default to 1, or you can set this dynamically
            ];
        }, $amazonProductData['variants']);
    
        // Extract unique option values and format them as expected
        $optionValues = array_reduce($amazonProductData['variants'], function($carry, $variant) {
            foreach ($variant['info'] as $info) {
                if (!in_array($info, $carry)) {
                    $carry[] = $info;
                }
            }
            return $carry;
        }, []);
    
        // Create a single string of all unique options
        $optionsString = implode(',', $optionValues);
        
        // Prepare options array to match expected format in `getGraphQLPayloadForProductPublishUrl`
        $options = [['name' => 'Color', 'values' => $optionValues]];
    
        $productData = [
            'product' => [
                'title' => $amazonProductData['title'],
                'body_html' => $descriptionHtml,
                'vendor' => 'Amazon Vendor', // Set a default vendor
                'product_type' => 'Electronics', // Set a default product type
                'tags' => '', // Set empty tags or set relevant tags
                'options' => $options, // Set the formatted options array
                'variants' => $variants,
                'images' => $images,
                'price' => $price

            ],
            'optionsString' => $optionsString
        ];


    // Log final product data
    Log::info("Final Product Data amazon: " . json_encode($productData));

    return $productData;
    }
    
    private function transformEtsyProductData($etsyProductData) {
        // Decode JSON response if needed
        if ($etsyProductData instanceof \Illuminate\Http\JsonResponse) {
            $etsyProductData = json_decode($etsyProductData->getContent(), true);
        }
    
        // Convert description array to string
        $descriptionHtml = '';
        if (isset($etsyProductData['description'])) {
            if (is_array($etsyProductData['description'])) {
                $descriptionHtml = nl2br(implode("\n", $etsyProductData['description']));
            } else {
                $descriptionHtml = nl2br($etsyProductData['description']);
            }
        }
    
        // Log description
        Log::info("Description HTML: " . $descriptionHtml);
    
        // Transform images array into the required format
        $images = [];
        if (isset($etsyProductData['images']) && is_array($etsyProductData['images'])) {
            $images = array_map(function($url) {
                return ['src' => $url];
            }, $etsyProductData['images']);
        }
    
        // Log images
        Log::info("Images: " . json_encode($images));
    
        // Ensure the price is in the correct format
        $price = str_replace(',', '.', $etsyProductData['price'] ?? '0.00');
    
        // Log price
        Log::info("Price: " . $price);
    
    // Initialize variants array
    $variants = [];
    $optionsList = []; // Initialize the options list

    // Extract unique option values and names
    if (isset($etsyProductData['variants']) && is_array($etsyProductData['variants'])) {
        foreach ($etsyProductData['variants'] as $index => $variantGroup) {
            Log::info("Processing variant group: " . json_encode($variantGroup));

            if (isset($variantGroup['label']) && isset($variantGroup['options']) && is_array($variantGroup['options'])) {
                foreach ($variantGroup['options'] as $option) {
                    // Extract value with price
                    preg_match('/^(.*?)(\s*\(\s*€[\d,]+\s*\))?$/', $option, $matches);
                    $optionLabel = isset($matches[1]) ? trim($matches[1]) : $option;
                    $optionPrice = isset($matches[2]) ? trim($matches[2]) : '';

                    // Combine option label and price
                    $combinedOption = $optionLabel . $optionPrice;

                    // Add to option list
                    if (!in_array($combinedOption, $optionsList)) {
                        $optionsList[] = $combinedOption;
                    }

                    // Extract price from option if available
                    preg_match('/\(\s*€([\d,]+)\s*\)/', $option, $priceMatches);
                    $variantPrice = isset($priceMatches[1]) ? str_replace(',', '.', $priceMatches[1]) : $price;

                    // Create the variant entry with additional attributes
                    $variants[] = [
                        'title' => $etsyProductData['title'] . ' - ' . $combinedOption,
                        'price' => (float) $variantPrice, // Ensure the price is correctly formatted
                        'compare_at_price' => null,
                        'sku' => $variantGroup['asin'] ?? '',
                        'option1' => $combinedOption,
                        'option2' => '',
                        'option3' => '',
                        'position' => $index + 1 // Position based on index
                    ];
                }
            } else {
                Log::info("Variant group missing label or options: " . json_encode($variantGroup));
            }
        }
    }

    // Build the options string from the list
    $optionsString = implode(',', $optionsList);

    // Log final variants and options string
    Log::info("Options String: " . $optionsString);
    Log::info("Transformed Variants: " . json_encode($variants));

    // Prepare the final product data array
    $productData = [
        'product' => [
            'title' => $etsyProductData['title'] ?? 'Untitled',
            'descriptionHtml' => $descriptionHtml,
            'vendor' => 'Etsy Vendor', // Set a default vendor
            'productType' => 'Crafts', // Set a default product type
            'tags' => '', // Set empty tags or set relevant tags
            'options' => [['name' => 'Size', 'values' => $optionsList]], // Set the formatted options array
            'variants' => $variants, // Set the formatted variants array
            'images' => $images,
            'price' => $price
        ]
    ];

    // Log final product data
    Log::info("Final Product Data: " . json_encode($productData));

    return $productData;
    }
    

    public function testEvent()
    {
        $this->dispatch('test-event');
    }


// Create Product with options
private function getGraphQLPayloadForProductPublishUrl($publishproduct, $productData) {

    $publishproduct = $publishproduct ? "ACTIVE" : "DRAFT";
    $temp = [];
    $temp[] = 
        ' title: "' . $productData['product']['title'] . '",
          status: ' . $publishproduct . ',
          vendor: "' . $productData['product']['vendor'] . '" ';
          
    if (isset($productData['product']['body_html']) && $productData['product']['body_html'] !== null) {
        $escapedDescriptionHtml = json_encode($productData['product']['body_html']);
        $temp[] = ' descriptionHtml: ' . $escapedDescriptionHtml . '';
    }

    if (isset($productData['product']['product_type']))
        $temp[] = ' productType: "' . $productData['product']['product_type'] . '"';

    if (isset($productData['product']['tags']))
        $temp[] = ' tags: ["' . implode('", "', explode(',', $productData['product']['tags'])) . '"]';

    // Options
    if (isset($productData['product']['options']) && is_array($productData['product']['options']) && !empty($productData['product']['options'])) {
        $formattedOptions = array_map(function ($option) {
            return '{
                name: "' . $option['name'] . '",
                values: [' . implode(', ', array_map(function($value) {
                    return '{name: "' . $value . '"}';
                }, $option['values'])) . ']
            }';
        }, $productData['product']['options']);
        $temp[] = 'productOptions: [' . implode(', ', $formattedOptions) . ']';
    }

    return implode(',', $temp);
}


// Create Variants to product
private function getGraphQLPayloadForProductVariantsBulkCreate($productData,$productId) {

    $temp = [];
    
        // Variants
    // $temp[] = ' productId: "' . $productId . '"';

    if (isset($productData['product']['variants']) && is_array($productData['product']['variants']) && !empty($productData['product']['variants'])) {
        $temp[] = '' . $this->getVariantsGraphQLConfigUrl($productData) . '';
    }else{
        $temp[] = 'variants: [{
            taxable: false,
            title: "",
            price: '.$productData['product']['price'].',
            sku: "",
            position: 1,
            inventoryItem: {cost: 67, tracked: false},
            inventoryManagement: null,
            inventoryPolicy: DENY
        }]';
    }


    return implode(',', $temp);
}

private function getVariantsGraphQLConfigUrl($productData) {
    try {
        $str = [];
        // Extract option names
        $optionname1 = $productData['product']['options'][0]['name'] ?? null;
        $optionname2 = $productData['product']['options'][1]['name'] ?? null;
        $optionname3 = $productData['product']['options'][2]['name'] ?? null;

        foreach ($productData['product']['variants'] as $key => $variant) {
            $compareAtPrice = !empty($variant['compare_at_price']) ? $variant['compare_at_price'] : 'null';
            $compareAtPriceField = $compareAtPrice !== 'null' ? 'compareAtPrice: ' . $compareAtPrice . ',' : '';

             // Format option values
             $mediasrc = "";
             $optionValues = [];
             if (isset($variant['option1']) && $variant['option1'] !== null) {
                 $optionValues[] = '{name: "' . $variant['option1'] . '", optionName: "' . $optionname1 . '"}';
             }
             if (isset($variant['option2']) && $variant['option2'] !== null) {
                 $optionValues[] = '{name: "' . $variant['option2'] . '", optionName: "' . $optionname2 . '"}';
             }
             if (isset($variant['option3']) && $variant['option3'] !== null) {
                 $optionValues[] = '{name: "' . $variant['option3'] . '", optionName: "' . $optionname3 . '"}';
             }
             $formattedOptionValues = implode(', ', $optionValues);

             foreach ($productData['product']['images'] as $image) {
                if ($variant['image_id'] === $image['id']) {
                    $mediasrc = $image['src'];
                    break; // Stop checking after a match
                }
            }
            // Log::info("Variant mediasrc " . $mediasrc);
            $cleanedUrl = strtok($mediasrc, '?');
 
            $str[] = '{
                taxable: false,
                price: ' . $variant['price'] . ',
                ' . $compareAtPriceField . '
                optionValues: [' . $formattedOptionValues . '],
                inventoryItem: {cost: ' . $variant['price'] . ', tracked: false},
                mediaSrc:"' . $cleanedUrl . '",
                inventoryPolicy: DENY
            }';
        }
        return implode(',', $str);
    } catch (Exception $e) {
        dd($e->getMessage() . ' ' . $e->getLine());
        return null;
    }
}

//  Add media to product
private function getGraphQLPayloadForProductMedia($productData) {

    $temp = [];
    
    if (isset($productData['product']['images']) && is_array($productData['product']['images'])) {
        $temp[] = 'media: [' . $this->getMediaGraphQLConfigUrl($productData) . ']';
    }

    return implode(',', $temp);
}

private function getMediaGraphQLConfigUrl($productData) {
    try {
        $str = [];
        foreach ($productData['product']['images'] as $key => $image) {
            $str[] = '{
                mediaContentType: IMAGE,
                alt: "Image of ' . $productData['product']['title'] . '",
                originalSource: "' . $image['src'] . '"
            }';
        }
        return implode(',', $str);
    } catch (Exception $e) {
        dd($e->getMessage() . ' ' . $e->getLine());
        return null;
    }
}
    
 
    
}