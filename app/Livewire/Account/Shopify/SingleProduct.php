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

class SingleProduct extends Component
{
    use LivewireAlert;
    use RequestTrait, FunctionTrait;

    public $urlsingle = ''; 

    public function render()
    {
        return view('livewire.account.shopify.single-product');
    }

    public function importsingleproduct() {


        try {
            $validated = $this->validate([
                'urlsingle' => 'required'
            ]);
        
            // Validation passed, continue with your logic
        } catch (\Illuminate\Validation\ValidationException $e) {
            // Validation failed, handle the error here
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

        try {
            $productCreateMutation = 'productCreate (input: {' . $this->getGraphQLPayloadForProductPublishUrl($store, $this->urlsingle) . '}) { 
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
            Log::info('Shopify endpoint:'.$endpoint);

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
    
    private function getGraphQLPayloadForProductPublishUrl($store, $url) {
  
        $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
        $context = stream_context_create($opts);
        $html = file_get_contents($url . '.json', false, $context);
        $productData = json_decode($html, true);
    
        $temp = [];
        $temp[] = 
            ' title: "' . $productData['product']['title'] . '",
              published: true,
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
