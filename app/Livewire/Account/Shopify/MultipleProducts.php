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
use App\Jobs\PublishProductToShopifyJob;


class MultipleProducts extends Component
{
    use LivewireAlert;
    use RequestTrait, FunctionTrait;

    public $url = ''; 
    public $products = []; // To hold fetched products
    public $selectedProducts = []; // To hold selected products

    public function render()
    {
        return view('livewire.account.shopify.multiple-products');
    }
     // import All Store 


     public function fetchProducts()
    {
        try {
            $validated = $this->validate([
                'url' => 'required|url'
            ]);

            $this->products = $this->fetchShopifyProducts($this->url);
          
            // Log::info('All Products Json:', ['product' => $this->products]);

            $this->alert('success', __('Products fetched successfully'));

        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->alert('warning', __('URL not valid!'));
        } catch (Exception $e) {
            Log::error('Error fetching products:', ['message' => $e->getMessage()]);
            $this->alert('error', __('Product fetch failed: ') . $e->getMessage());
        }
    }
    public function selectAllProducts()
    {
        $this->selectedProducts = array_map(function($product) {
            return $product->id;
        }, $this->products);

        $this->addSelectedProducts();

    }
    private function fetchShopifyProducts($url)
    {


        //if domaine with url ;;; 
        $parsedUrl = parse_url($url);

        if (isset($parsedUrl['host'])) {
            $domain = $parsedUrl['scheme'] . '://' . $parsedUrl['host']. '/' ;

        } else {
            $this->alert('warning', __('This Store not Supported by Weenify !'));

            // return redirect()->route('account.storesearch.index');
        }
       
        $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
        $context = stream_context_create($opts);
        $html = file_get_contents($domain . 'products.json?page=1&limit=250', false, $context);
        $response = json_decode($html);

        if (isset($response->products)) {
            return $response->products;
        }

        throw new Exception('Failed to fetch products from Shopify');
    }
  
    public function addSelectedProducts()
    {
        try {
            $user_id = Auth::user()->id;
            $store = Shopifystores::where('user_id', $user_id)
                                    ->where('status', 'active')
                                    ->firstOrFail(); 
    
            foreach ($this->selectedProducts as $productId) {
                $product = $this->findProductById($productId);
                if ($product) {
                    $productArray = json_decode(json_encode($product), true);
                    // Log::info('Product:', ['product' => $productArray]);
                    // $this->createShopifyProduct($productArray, $store);
                   
                        PublishProductToShopifyJob::dispatch($productArray, $store);
                    
    
                }
            }
    
            $this->alert('success', __('Products imported successfully'));
            return redirect()->route('account.homeshopify.index');

        } catch (Exception $e) {
            // Log::error('Error importing products:', ['message' => $e->getMessage()]);
            $this->alert('error', __('Product import failed: ') . $e->getMessage());
        }
    }

    private function findProductById($productId)
    {
        foreach ($this->products as $product) {
            if ($product->id == $productId) {
                return $product;
            }
        }
        return null;
    }




//     private function createShopifyProduct($productArray, $store)
// {
//     try {
//         $productCreateMutation = 'productCreate (input: {' . $this->getGraphQLPayloadForProductPublishUrl($store, $productArray) . '}) { 
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
//         $endpoint = $this->getShopifyURLForStore('graphql.json', $store);

//         $headers = $this->getShopifyHeadersForStore($store);
//         $payload = ['query' => $mutation];

//         $response = $this->makeAnAPICallToShopify('POST', $endpoint, null, $headers, $payload);
//         Log::info('Shopify API Response:', ['response' => $response]);

//         if (isset($response['statusCode']) && $response['statusCode'] == 200) {
//             if (isset($response['body']['data']['productCreate']['userErrors']) && !empty($response['body']['data']['productCreate']['userErrors'])) {
//                 $errors = $response['body']['data']['productCreate']['userErrors'];
//                 $errorMessages = array_map(function($error) {
//                     return $error['message'];
//                 }, $errors);
//                 throw new Exception('Product creation failed: ' . implode(', ', $errorMessages));
//             }

//             $this->alert('success', __('Product Imported successfully'));
//         } else {
//             throw new Exception('Product creation failed!');
//         }
//     } catch (Exception $e) {
//         // Log::error('Error in publishProductUrl:', ['message' => $e->getMessage()]);
//         throw $e;
//     }
// }

//     private function getGraphQLPayloadForProductPublishUrl($store, $productData) 
//     {
//         $temp = [];
//         $temp[] = 'title: "' . addslashes($productData['title']) . '"';
//         $temp[] = 'published: true';
//         $temp[] = 'vendor: "' . addslashes($productData['vendor']) . '"';
        
//         if (isset($productData['body_html']) && $productData['body_html'] !== null) {
//             $escapedDescriptionHtml = json_encode($productData['body_html']);
//             $temp[] = 'descriptionHtml: ' . $escapedDescriptionHtml;
//         }
    
//         if (isset($productData['product_type'])) {
//             $temp[] = 'productType: "' . addslashes($productData['product_type']) . '"';
//         }
    
//         // if (isset($productData['tags'])) {
//         //     $temp[] = 'tags: ["' . implode('", "', explode(',', $productData['tags'])) . '"]';
//         // }
    
//         if (isset($productData['options']) && is_array($productData['options'])) {
//             $options = [];
//             foreach ($productData['options'] as $option) {
//                 $optionValues = implode(',', array_map('addslashes', $option['values']));
//                 $options[] = '"' . $optionValues . '"';
//             }
//             $temp[] = 'options: [' . implode(', ', $options) . ']';
//         }
    
//         if (isset($productData['variants']) && is_array($productData['variants'])) {
//             $temp[] = 'variants: [' . $this->getVariantsGraphQLConfigUrl($productData['variants']) . ']';
//         }
    
//         if (isset($productData['images']) && is_array($productData['images'])) {
//             $temp[] = 'images: [' . $this->getImagesGraphQLConfigUrl($productData['images']) . ']';
//         }
    
//         return implode(', ', $temp);
//     }
    

//     private function getVariantsGraphQLConfigUrl($variants) 
//     {
//         $str = [];
//         foreach ($variants as $variant) {
//             $compareAtPriceField = !empty($variant['compare_at_price']) ? 'compareAtPrice: "' . $variant['compare_at_price'] . '",' : '';
//             $optionValues = [];
//             if (isset($variant['option1'])) $optionValues[] = addslashes($variant['option1']);
//             if (isset($variant['option2'])) $optionValues[] = addslashes($variant['option2']);
//             if (isset($variant['option3'])) $optionValues[] = addslashes($variant['option3']);
//             $formattedOptionValues = implode('", "', $optionValues);
    
//             $str[] = '{
//                 taxable: false,
//                 title: "' . addslashes($variant['title']) . '",
//                 price: ' . $variant['price'] . ',
//                 ' . $compareAtPriceField . '
//                 sku: "' . addslashes($variant['sku']) . '",
//                 options: ["' . $formattedOptionValues . '"],
//                 position: ' . $variant['position'] . ',
//                 inventoryItem: {cost: ' . $variant['price'] . ', tracked: false},
//                 inventoryManagement: null,
//                 inventoryPolicy: DENY
//             }';
//         }
//         return implode(', ', $str);
//     }


    // private function getImagesGraphQLConfigUrl($images) 
    // {
    //     $str = [];
    //     foreach ($images as $image) {
    //         $str[] = '{
    //             src: "' . addslashes($image['src']) . '"
    //         }';
    //     }
    //     return implode(', ', $str);
    // }

    //  public function importstore()
    //  {
 
    //      try {
    //          $validated = $this->validate([
    //              'url' => 'required'
    //          ]);
         
    //          // Validation passed, continue with your logic
    //      } catch (\Illuminate\Validation\ValidationException $e) {
    //          // Validation failed, handle the error here
    //          $this->alert('warning', __('url not valid!'));
         
    //          // Redirect back to the previous page with the validation errors
    //          return redirect()->back()->withErrors($e->validator);
    //      }
 
    //     //  Log::info('$this->url:'.$this->url);
    //      $url = $this->url;
 
    //     // JSON string
    //        // store Dev
    //      // $store = '{"table_id":2,"id":67046080733,"email":"devyassinepro@gmail.com","name":"Weenify","access_token":"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","api_key":"59a995e864b719f1c5405554b7156bfb","api_secret_key":"d687a676685b8e18ececd78abc3b39d5","myshopify_domain":"weenify.myshopify.com","phone":null,"fulfillment_service_response":null,"address1":null,"fulfillment_orders_opt_in":0,"fulfillment_service":0,"address2":null,"zip":null,"created_at":"2024-06-07T12:03:34.000000Z","updated_at":"2024-06-07T12:03:34.000000Z"}';
 
    //      $user_id = Auth::user()->id;
    //      $store = Shopifystores::where('user_id', $user_id)
    //                             ->where('status', 'active')
    //                             ->get(); 
 
    //      $storeArray = $store->toArray();
    //      $store = $storeArray[0];
 
    //      $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
    //      $context = stream_context_create($opts);
    //      $html = file_get_contents($url . 'products.json?page=1&limit=250', false, $context);
    //      $products = json_decode($html)->products;
 
    //      $totalProducts = count($products);
    //     //  Log::info('Shopify totalProducts:'.$totalProducts);
 
    //      $processedProducts = 0;
 
    //      foreach ($products as $product) {
    //          try {
 
    //              $productCreateMutation = 'productCreate (input: {' . $this->getGraphQLPayloadForStorePublishUrl($product) . '}) { 
    //                  product { id }
    //                  userErrors { field message }
    //              }';
     
    //              // Log::info("Json file " . $productCreateMutation);
 
    //              $mutation = 'mutation { ' . $productCreateMutation . ' }';
     
    //              $endpoint = $this->getShopifyURLForStore('graphql.json', $store);
 
    //              $headers = $this->getShopifyHeadersForStore($store);
 
    //              $payload = ['query' => $mutation];
     
    //              $response = $this->makeAnAPICallToShopify('POST', $endpoint, null, $headers, $payload);
    //             //  Log::info('Shopify API Response:', ['response' => $response]);
 
    //              // $processedProducts++;
    //              // $this->progress = round(($processedProducts / $totalProducts) * 100);
    //              // $this->alert('success', __('Product Imported successfully') . $product->title .'');
 
 
    //                  // Check the response
    //                    // Check the response
    //              if (isset($response['statusCode']) && $response['statusCode'] == 200) {
    //                  if (isset($response['body']['data']['productCreate']['userErrors']) && !empty($response['body']['data']['productCreate']['userErrors'])) {
    //                      $errors = $response['body']['data']['productCreate']['userErrors'];
    //                      $errorMessages = array_map(function($error) {
    //                          return $error['message'];
    //                      }, $errors);
    //                      return back()->with('error', 'Product creation failed: ' . implode(', ', $errorMessages));
    //                  }
 
    //                  $this->alert('success', __('Product Imported successfully'));
 
 
    //                  // return back()->with('success', 'Product Created!');
    //              } else {
    //                  return back()->with('error', 'Product creation failed!');
    //              }
 
    //          } catch (Exception $e) {
    //             //  Log::error('Error in publishProductUrl:', ['message' => $e->getMessage()]);
    //              return back()->with('error', 'Product creation failed: ' . $e->getMessage());
    //          }
    //      }
 
    //  }

    //  function getShopifyURLForStore($endpoint, $store) {
    //     return checkIfStoreIsPrivate($store) ? 
    //         'https://'.$store['api_key'].':'.$store['api_secret_key'].'@'.$store['myshopify_domain'].'/admin/api/'.config('custom.shopify_api_version').'/'.$endpoint 
    //         :
    //         'https://'.$store['myshopify_domain'].'/admin/api/'.config('custom.shopify_api_version').'/'.$endpoint;
    // }
    
    // function getShopifyHeadersForStore($store, $method = 'GET') {
    //     return $method == 'GET' ? [
    //         'Content-Type' => 'application/json',
    //         'X-Shopify-Access-Token' => $store['access_token']
    //     ] : [
    //         'Content-Type: application/json',
    //         'X-Shopify-Access-Token: '.$store['access_token']
    //     ];
    // }
      
}
