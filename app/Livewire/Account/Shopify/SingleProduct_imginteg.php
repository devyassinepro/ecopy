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
    public $publish = true;

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
       
        $url = $this->urlsingle;

        if ($this->isAmazonUrl($url)) {
            // Redirect to the Amazon scraping function

            Log::info("Amazon product");
            return $this->scrapeAmazonProduct($url);
        }elseif ($this->isEtsyUrl($url)) {
            // Redirect to the Etsy scraping function
            return $this->scrapeEtsyProduct($url);
        }elseif ($this->isAliExpressUrl($url)) {
            // Redirect to the Etsy scraping function
            return $this->scrapeAliExpressProduct($url);
        } else {

            return $this->scrapeWooCommerceProduct($url);

            Log::info("Not Amazon product");

        }

    }

    private function isAmazonUrl($url)
    {
        return preg_match('/^(https?:\/\/)?(www\.)?amazon\.[a-z]{2,6}\/.*$/', $url);
    }

    private function isEtsyUrl($url)
    {
        return preg_match('/^(https?:\/\/)?(www\.)?etsy\.[a-z]{2,6}\/.*$/', $url);
    }

    private function isAliExpressUrl($url)
    {
        return preg_match('/^(https?:\/\/)?(www\.)?([a-z]{2,3}\.)?aliexpress\.[a-z]{2,6}\/.*$/', $url);
    }


//     private function scrapeAliExpressProduct($url)
// {
    
//      // Send GET request to the URL with necessary headers
//      $response = $this->client->request('GET', $url, [
//         'headers' => [
//             'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36',
//             'Accept-Language' => 'en-US,en;q=0.9',
//             'Accept-Encoding' => 'gzip, deflate, br',
//         ]
//     ]);
//       // Get the HTML content from the response
//       $html = $response->getBody()->getContents();
//       $crawler = new Crawler($html);

//       // Find the script tag containing the data
//       $scriptNode = $crawler->filterXPath('//script[contains(text(),"window.runParams")]/text()');
//       if ($scriptNode->count() === 0) {
//           Log::error("Script containing runParams not found. HTML snippet: " . substr($html, 0, 2000));
//           throw new \Exception("Script containing runParams not found");
//       }

//       // Extract data using regex pattern
//       $scriptText = $scriptNode->text();
//       preg_match('/window.runParams = ({.+?});/', $scriptText, $matches);
//       if (!isset($matches[1])) {
//           Log::error("runParams data not found. HTML snippet: " . substr($html, 0, 2000));
//           throw new \Exception("runParams data not found");
//       }

//       $data = json_decode($matches[1], true);
//       if (json_last_error() !== JSON_ERROR_NONE) {
//           Log::error("Failed to decode JSON. Error: " . json_last_error_msg());
//           throw new \Exception("Failed to decode JSON");
//       }

//       // Parse product data using JMESPath
//       $query = isset($data['skuModule']) ? 
//           '{name: titleModule.subject, total_orders: titleModule.formatTradeCount, feedback: titleModule.feedbackRating, description_url: descriptionModule.descriptionUrl, description_short: pageModule.description, keywords: pageModule.keywords, images: imageModule.imagePathList, stock: quantityModule.totalAvailQuantity, seller: storeModule.{id: storeNum, url: storeURL, name: storeName, country: countryCompleteName, positive_rating: positiveRate, positive_rating_count: positiveNum, started_on: openTime, is_top_rated: topRatedSeller}, specification: specsModule.props[].{name: attrName, value: attrValue}, variants: skuModule.skuPriceList[].{name: skuAttr, sku: skuId, available: skuVal.availQuantity, stock: skuVal.inventory, full_price: skuVal.skuAmount.value, discount_price: skuVal.skuActivityAmount.value, currency: skuVal.skuAmount.currency}}' :
//           '{name: productInfoComponent.subject, total_orders: tradeComponent.formatTradeCount, feedback: feedbackComponent, description_url: productDescComponent.descriptionUrl, description_short: metaDataComponent.description, keywords: metaDataComponent.keywords, images: imageComponent.imagePathList, stock: inventoryComponent.totalAvailQuantity, seller: sellerComponent.{id: storeNum, url: storeURL, name: storeName, country: countryCompleteName, positive_rating: positiveRate, positive_rating_count: positiveNum, started_on: openTime, is_top_rated: topRatedSeller}, specification: productPropComponent.props[].{name: attrName, value: attrValue}, variants: priceComponent.skuPriceList[].{name: skuAttr, sku: skuId, available: skuVal.availQuantity, stock: skuVal.inventory, full_price: skuVal.skuAmount.value, discount_price: skuVal.skuActivityAmount.value, currency: skuVal.skuAmount.currency}}';

//       $product = JmesPath\search($query, $data);

//       // Convert specification to key-value pairs
//       if (isset($product['specification']) && is_array($product['specification'])) {
//         $product['specification'] = array_column($product['specification'], 'value', 'name');
//     } else {
//         $product['specification'] = [];
//     }
//       // Log the product data
//       Log::info($product);
//     // Return the product data as JSON response
//     return response()->json($product);
// }


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
 
    Log::info("title aff ".$title);

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
    Log::info($productData);

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
                $price = $wholePrice->text() . $fractionPrice->text();
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
                        break;
                    }
                }
            }
    
            if (is_null($price)) {
                $price = 'Price not available';
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


    public function importsingleproduct2() {


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


        $user_id = Auth::user()->id;
        $store = Shopifystores::where('user_id', $user_id)
                               ->where('status', 'active')
                               ->get(); 

        $storeArray = $store->toArray();
        $store = $storeArray[0];
        $publish = $this->publish;


        try {
            $productCreateMutation = 'productCreate (input: {' . $this->getGraphQLPayloadForProductPublishUrl($store, $this->urlsingle,$publish) . '}) { 
                product {
                    id
                    variants(first: 100) {
                        edges {
                            node {
                                id
                                title
                                position
                            }
                        }
                    }
                }
                userErrors { field message }
            }';
            // Log::info("Json file " . $productCreateMutation);
            $mutation = 'mutation { ' . $productCreateMutation . ' }';
            
            $endpoint = getShopifyURLForStore('graphql.json', $store);
            // Log::info('Shopify endpoint affiche:'.$endpoint);

            $headers = getShopifyHeadersForStore($store);
            $payload = ['query' => $mutation];
            
            $response = $this->makeAnAPICallToShopify('POST', $endpoint, null, $headers, $payload);
            //  Log::info('Shopify API Response:', ['response' => $response]);
            
            // Check the response
            if (isset($response['statusCode']) && $response['statusCode'] == 200) {
                if (isset($response['body']['data']['productCreate']['userErrors']) && !empty($response['body']['data']['productCreate']['userErrors'])) {
                    $errors = $response['body']['data']['productCreate']['userErrors'];
                    $errorMessages = array_map(function($error) {
                        return $error['message'];
                    }, $errors);
                    return back()->with('error', 'Product creation failed: ' . implode(', ', $errorMessages));
                }

                $this->dispatch('reload-page');
                $this->alert('success', __('Product Imported successfully'));


            // // Capture the product ID and variant IDs
            // $productID = $response['body']['data']['productCreate']['product']['id'];
            // $variantIDs = [];
            // foreach ($response['body']['data']['productCreate']['product']['variants']['edges'] as $variant) {
            //     $variantIDs[$variant['node']['position']] = $variant['node']['id'];
            // }
            // Log::info('variantIDs:', ['variantIDs' => $variantIDs]);

            // // Upload images to the product
            // $images = [
            //     'https://cdn.shopify.com/s/files/1/0075/7547/0191/products/rejuvene-appareil-anti-age-par-traitement-led-5-en-1-nouveaute-2019-appareil-anti-age-par-traitement-led-1-rejuvene-7181158219887.png?v=1559812289',
            //     'https://cdn.shopify.com/s/files/1/0075/7547/0191/products/rejuvene-appareil-anti-age-par-traitement-led-5-en-1-nouveaute-2019-appareil-anti-age-par-traitement-led-1-rejuvene-7181157892207.png?v=1559812289',
            //     // Add more image URLs as needed
            // ];

            // $imageIDs = [];
            // foreach ($images as $imageURL) {
            //     $imageUploadMutation = 'mutation {
            //         productUpdate(input: {
            //             id: "' . $productID . '",
            //             images: {
            //                 src: "' . $imageURL . '"
            //             }
            //         }) {
            //             product {
            //                 id
            //                 images(first: 10) {
            //                     edges {
            //                         node {
            //                             id
            //                             src
            //                         }
            //                     }
            //                 }
            //             }
            //             userErrors {
            //                 field
            //                 message
            //             }
            //         }
            //     }';

            //     $payload = ['query' => $imageUploadMutation];
            //     $imageUploadResponse = $this->makeAnAPICallToShopify('POST', $endpoint, null, $headers, $payload);
            //     Log::info('Shopify Image Upload Response:', ['response' => $imageUploadResponse]);

            //     if (isset($imageUploadResponse['statusCode']) && $imageUploadResponse['statusCode'] == 200) {
            //         $imagesData = $imageUploadResponse['body']['data']['productUpdate']['product']['images']['edges'];
            //         foreach ($imagesData as $imageData) {
            //             $imageIDs[] = $imageData['node']['id'];
            //         }
            //     } else {
            //         Log::error('Failed to upload image:', ['response' => $imageUploadResponse]);
            //     }
            // }

            // // Associate images with variants
            // foreach ($variantIDs as $position => $variantID) {
            //     if (isset($imageIDs[$position - 1])) {
            //         $imageID = $imageIDs[$position - 1];
            //         $updateMutation = 'mutation {
            //             productVariantUpdate(input: {
            //                 id: "' . $variantID . '",
            //                 imageId: "' . $imageID . '"
            //             }) {
            //                 productVariant {
            //                     id
            //                     image {
            //                         id
            //                         src
            //                     }
            //                 }
            //                 userErrors {
            //                     field
            //                     message
            //                 }
            //             }
            //         }';

            //         $payload = ['query' => $updateMutation];
            //         $updateResponse = $this->makeAnAPICallToShopify('POST', $endpoint, null, $headers, $payload);
            //         Log::info('Shopify Variant Image Update Response:', ['response' => $updateResponse]);

            //         if (isset($updateResponse['statusCode']) && $updateResponse['statusCode'] != 200) {
            //             Log::error('Failed to update variant image:', ['variantID' => $variantID, 'response' => $updateResponse]);
            //         }
            //     }
            // }
                // return back()->with('success', 'Product Created!');
            } else {
                return back()->with('error', 'Product creation failed!');
            }
        } catch (Exception $e) {
            // Log::error('Error in publishProductUrl:', ['message' => $e->getMessage()]);
            return back()->with('error', 'Product creation failed: ' . $e->getMessage());
        }
    }

    public function testEvent()
    {
        $this->dispatch('test-event');
    }
    
    private function getGraphQLPayloadForProductPublishUrl($store, $url,$publishproduct) {
  
        $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
        $context = stream_context_create($opts);
        $html = file_get_contents($url . '.json', false, $context);
        $productData = json_decode($html, true);
        
        // Log::info('Publish Product:'.$publishproduct);
        $publishproduct = $publishproduct ? 'true' : 'false';


        $temp = [];
        $temp[] = 
            ' title: "' . $productData['product']['title'] . '",
              published: ' . $publishproduct . ',
              vendor: "' . $productData['product']['vendor'] . '" ';
        if (isset($productData['product']['body_html']) && $productData['product']['body_html'] !== null)
             $escapedDescriptionHtml = json_encode($productData['product']['body_html']);

            $temp[] = ' descriptionHtml: ' . $escapedDescriptionHtml . '';

        if (isset($productData['product']['product_type']))
            $temp[] = ' productType: "' . $productData['product']['product_type'] . '"';
            $temp[] = ' tags: ["' . implode('", "', explode(',', $productData['product']['tags'])) . '"]';

            if (isset($productData['product']['options']) && is_array($productData['product']['options'])) {
                // Extract all option values and combine them into a single string
                $optionValues = array_reduce($productData['product']['options'], function($carry, $option) {
                    // Combine the values of each option into a single string, separated by commas
                    return $carry . implode(',', $option['values']) . ',';
                }, '');
            
                // Remove the trailing comma
                $optionValues = rtrim($optionValues, ',');
            
                // Wrap the combined option values in quotes and prepare the final options array format
                $formattedOptions = '"' . $optionValues . '"';
            
                $temp[] = 'options: [' . $formattedOptions . ']';
            } else {
                $formattedOptions = '';
            }

        if (isset($productData['product']['variants']) && is_array($productData['product']['variants'])) {
            $temp[] = 'variants: [' . $this->getVariantsGraphQLConfigUrl($productData) . ']';

        }

        if (isset($productData['product']['images']) && is_array($productData['product']['images'])) {
            $temp[] = 'images: [' . $this->getImagesGraphQLConfigUrl($productData) . ']';

        }
    
        return implode(',', $temp);
    }
    

    private function getVariantsGraphQLConfigUrl($productData) {
        try {
            $str = [];
            foreach ($productData['product']['variants'] as $key => $variant) {

                $compareAtPrice = !empty($variant['compare_at_price']) ? $variant['compare_at_price'] : 'null';
                $compareAtPriceField = $compareAtPrice !== 'null' ? 'compareAtPrice: ' . $compareAtPrice . ',' : '';

                  // Ensure option values are correctly set
                $optionValues = [];
                if (isset($variant['option1']) && $variant['option1'] !== null) {
                    $optionValues[] = $variant['option1'];
                }
                if (isset($variant['option2']) && $variant['option2'] !== null) {
                    $optionValues[] = $variant['option2'];
                }
                if (isset($variant['option3']) && $variant['option3'] !== null) {
                    $optionValues[] = $variant['option3'];
                }
                $formattedOptionValues = implode('", "', $optionValues);
            

                $str[] = '{
                    taxable: false,
                    title: "'.$variant['title'].'",
                    price: '.$variant['price'].',
                    ' . $compareAtPriceField . '
                    sku: "'.$variant['sku'].'",
                    options: [" '.$formattedOptionValues.' "],
                    position: '.$variant['position'].',
                    inventoryItem: {cost: '.$variant['price'].', tracked: false},
                    inventoryManagement: null,
                    inventoryPolicy: DENY
                }';
            }
            return implode(',', $str); 
        } catch (Exception $e) {
            dd($e->getMessage().' '.$e->getLine());
            return null;
        }
    }

    private function getImagesGraphQLConfigUrl($productData) {
        try {
            $str = [];
            foreach ($productData['product']['images'] as $key => $image) {
                $str[] = '{
                    src: "'.$image['src'].'",
                }';
            }
            return implode(',', $str); 
        } catch (Exception $e) {
            dd($e->getMessage().' '.$e->getLine());
            return null;
        }
    }


}
