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

    //token = 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
    public $urlsingle = ''; 
    public $product = null;
    public $title;
    public $body_html;
    public $vendor;
    public $product_type;

    public function render()
    {
        return view('livewire.account.shopify.single-product');
    }

    // public function importsingleproduct() {


    //     try {
    //         $validated = $this->validate([
    //             'urlsingle' => 'required'
    //         ]);
        
    //         // Validation passed, continue with your logic
    //     } catch (\Illuminate\Validation\ValidationException $e) {
    //         // Validation failed, handle the error here
    //         $this->alert('warning', __('url not valid!'));
        
    //         // Redirect back to the previous page with the validation errors
    //         return redirect()->back()->withErrors($e->validator);
    //     }

    //     Log::info('$this->url:'.$this->urlsingle);

    //     $user_id = Auth::user()->id;
    //     $store = Shopifystores::where('user_id', $user_id)
    //                            ->where('status', 'active')
    //                            ->get(); 

    //     $storeArray = $store->toArray();
    //     $store = $storeArray[0];

    //     try {
    //         $productCreateMutation = 'productCreate (input: {' . $this->getGraphQLPayloadForProductPublishUrl($store, $this->urlsingle) . '}) { 
    //             product {
    //                 id
    //                 variants(first: 100) {
    //                     edges {
    //                         node {
    //                             id
    //                             title
    //                             position
    //                         }
    //                     }
    //                 }
    //             }
    //             userErrors { field message }
    //         }';
    //         Log::info("Json file " . $productCreateMutation);
    //         $mutation = 'mutation { ' . $productCreateMutation . ' }';
            
    //         $endpoint = getShopifyURLForStore('graphql.json', $store);
    //         Log::info('Shopify endpoint:'.$endpoint);

    //         $headers = getShopifyHeadersForStore($store);
    //         $payload = ['query' => $mutation];
            
    //         $response = $this->makeAnAPICallToShopify('POST', $endpoint, null, $headers, $payload);
    //         Log::info('Shopify API Response:', ['response' => $response]);
            
    //         // Check the response
    //         if (isset($response['statusCode']) && $response['statusCode'] == 200) {
    //             if (isset($response['body']['data']['productCreate']['userErrors']) && !empty($response['body']['data']['productCreate']['userErrors'])) {
    //                 $errors = $response['body']['data']['productCreate']['userErrors'];
    //                 $errorMessages = array_map(function($error) {
    //                     return $error['message'];
    //                 }, $errors);
    //                 return back()->with('error', 'Product creation failed: ' . implode(', ', $errorMessages));
    //             }

    //             $this->alert('success', __('Product Imported successfully'));

    //           } else {
    //             return back()->with('error', 'Product creation failed!');
    //         }
    //     } catch (Exception $e) {
    //         // Log::error('Error in publishProductUrl:', ['message' => $e->getMessage()]);
    //         return back()->with('error', 'Product creation failed: ' . $e->getMessage());
    //     }
    // }

    public function importsingleproduct() {
        try {
            $validated = $this->validate([
                'urlsingle' => 'required|url'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->alert('warning', __('URL not valid!'));
            return;
        }

        $user_id = Auth::user()->id;
        $store = Shopifystores::where('user_id', $user_id)
                               ->where('status', 'active')
                               ->first(); 

        if (!$store) {
            $this->alert('warning', __('Active store not found!'));
            return;
        }

        try {
            $productData = $this->fetchProductDataFromUrl($this->urlsingle);

            $this->title = $productData['title'];
            $this->body_html = $productData['body_html'];
            $this->vendor = $productData['vendor'];
            $this->product_type = $productData['product_type'];

            $this->product = $productData; // This is important to trigger the UI update

            $this->alert('success', __('Product data imported successfully'));

        } catch (Exception $e) {
            $this->alert('warning', __('Product import failed: ') . $e->getMessage());
        }
    }

    public function updateProduct() {
        $user_id = Auth::user()->id;
        $store = Shopifystores::where('user_id', $user_id)
                               ->where('status', 'active')
                               ->first(); 

        if (!$store) {
            $this->alert('warning', __('Active store not found!'));
            return;
        }
        // $productArray = json_decode(json_encode($this->product), true);

        // Log::info('product file:', ['response' => $this->product]);

        // Log::info("title file " . $this->title);


        try {
            $productCreateMutation = 'productCreate (input: {' . $this->getGraphQLPayloadForProductPublishUrl($store) . '}) { 
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

            Log::info("Json file " . $productCreateMutation);
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

              } else {
                return back()->with('error', 'Product creation failed!');
            }
        } catch (Exception $e) {
            // Log::error('Error in publishProductUrl:', ['message' => $e->getMessage()]);
            return back()->with('error', 'Product creation failed: ' . $e->getMessage());
        }
    }

    private function fetchProductDataFromUrl($url) {
        $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
        $context = stream_context_create($opts);
        $html = file_get_contents($url . '.json', false, $context);
        $productData = json_decode($html, true);

        return [
            'id' => $productData['product']['id'],
            'title' => $productData['product']['title'],
            'body_html' => $productData['product']['body_html'] ?? '',
            'vendor' => $productData['product']['vendor'],
            'product_type' => $productData['product']['product_type'] ?? '',
            'tags' => $productData['product']['tags'] ?? '',
            'options' => $productData['product']['options'] ?? [],
            'variants' => $productData['product']['variants'] ?? [],
            'images' => $productData['product']['images'] ?? []
        ];
    }

    private function getGraphQLPayloadForProductPublishUrl($store) {
        $productData = $this->product;
 
       $temp = [];
        $temp[] = 
            'title: "' . $this->title . '",
            published: true,
            vendor: "' . $this->vendor . '" ';

        if (isset($this->body_html) && $this->body_html !== null)
                $escapedDescriptionHtml = json_encode($this->body_html);
            $temp[] = ' descriptionHtml: ' . $escapedDescriptionHtml . '';

        if (isset($this->product_type))
            $temp[] = ' productType: "' . $this->product_type . '"';
            $temp[] = ' tags: ["' . implode('", "', explode(',', $productData['tags'])) . '"]';


        if (isset($productData['options']) && is_array($productData['options'])) {
            $optionValues = array_reduce($productData['options'], function($carry, $option) {
                return $carry . implode(',', $option['values']) . ',';
            }, '');
            $optionValues = rtrim($optionValues, ',');
            $formattedOptions = '"' . $optionValues . '"';
            $temp[] = 'options: [' . $formattedOptions . ']';
        }

        if (isset($productData['variants']) && is_array($productData['variants'])) {
            $temp[] = 'variants: [' . $this->getVariantsGraphQLConfigUrl($productData) . ']';
        }

        if (isset($productData['images']) && is_array($productData['images'])) {
            $temp[] = 'images: [' . $this->getImagesGraphQLConfigUrl($productData) . ']';
        }

        return implode(',', $temp);
    }

    private function getVariantsGraphQLConfigUrl($productData) {
        $str = [];
        foreach ($productData['variants'] as $variant) {
            $compareAtPrice = !empty($variant['compare_at_price']) ? $variant['compare_at_price'] : 'null';
            $compareAtPriceField = $compareAtPrice !== 'null' ? 'compareAtPrice: ' . $compareAtPrice . ',' : '';

            $optionValues = [];
            if (isset($variant['option1'])) $optionValues[] = $variant['option1'];
            if (isset($variant['option2'])) $optionValues[] = $variant['option2'];
            if (isset($variant['option3'])) $optionValues[] = $variant['option3'];
            $formattedOptionValues = implode('", "', $optionValues);

            $str[] = '{
                taxable: false,
                title: "' . $variant['title'] . '",
                price: ' . $variant['price'] . ',
                ' . $compareAtPriceField . '
                sku: "' . $variant['sku'] . '",
                options: ["' . $formattedOptionValues . '"],
                position: ' . $variant['position'] . ',
                inventoryItem: {cost: ' . $variant['price'] . ', tracked: false},
                inventoryManagement: null,
                inventoryPolicy: DENY
            }';
        }
        return implode(',', $str); 
    }

    private function getImagesGraphQLConfigUrl($productData) {
        $str = [];
        foreach ($productData['images'] as $image) {
            $str[] = '{
                src: "' . $image['src'] . '",
            }';
        }
        return implode(',', $str); 
    }

}
