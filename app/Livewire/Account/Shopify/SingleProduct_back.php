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

        $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
        $context = stream_context_create($opts);
        $html = file_get_contents($url . '.json', false, $context);
        $productData = json_decode($html, true);
        
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

            Log::info("Json file " . $productCreateMutation);
            $mutation = 'mutation { ' . $productCreateMutation . ' }';
            $endpoint = getShopifyURLForStore('graphql.json', $store);
            Log::info("Json endpoint " . $endpoint);

            $headers = getShopifyHeadersForStore($store);
            $payload = ['query' => $mutation];
            
            $response = $this->makeAnAPICallToShopify('POST', $endpoint, null, $headers, $payload);
            Log::info('Shopify API Response:', ['response' => $response]);
            
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
                    Log::info('Product created successfully. Product ID: ' . $productId);

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

            Log::info("Json file " . $productCreateVariantsBulkMutation);

            $mutationVariants = 'mutation { ' . $productCreateVariantsBulkMutation . ' }';
            
            $endpoint = getShopifyURLForStore('graphql.json', $store);
            $headers = getShopifyHeadersForStore($store);
            $payload = ['query' => $mutationVariants];
            
            $response = $this->makeAnAPICallToShopify('POST', $endpoint, null, $headers, $payload);
            Log::info('Shopify API Response Variants:', ['response' => $response]);

                $this->dispatch('reload-page');
                $this->alert('success', __('Product Imported successfully'));

            } else {
                return back()->with('error', 'Product creation failed!');
            }
        } catch (Exception $e) {
            return back()->with('error', 'Product creation failed: ' . $e->getMessage());
        }
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
            Log::info("Variant mediasrc " . $mediasrc);
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
