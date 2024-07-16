<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\Shopifystores;
use App\Traits\FunctionTrait;
use App\Traits\RequestTrait;
use Exception;
use Illuminate\Support\Facades\Log;

class PublishProductToShopifyJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, RequestTrait, FunctionTrait;

    protected $product;
    protected $store;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($product, $store)
    {
        $this->product = $product;
        $this->store = $store;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $productCreateMutation = 'productCreate (input: {' . $this->getGraphQLPayloadForProductPublishUrl($this->store, $this->product) . '}) { 
                product { id }
                userErrors { field message }
            }';

            $mutation = 'mutation { ' . $productCreateMutation . ' }';
            $endpoint = $this->getShopifyURLForStore('graphql.json', $this->store);
            $headers = $this->getShopifyHeadersForStore($this->store);
            $payload = ['query' => $mutation];

            $response = $this->makeAnAPICallToShopify('POST', $endpoint, null, $headers, $payload);

            if (isset($response['statusCode']) && $response['statusCode'] == 200) {
                if (isset($response['body']['data']['productCreate']['userErrors']) && !empty($response['body']['data']['productCreate']['userErrors'])) {
                    $errors = $response['body']['data']['productCreate']['userErrors'];
                    $errorMessages = array_map(function($error) {
                        return $error['message'];
                    }, $errors);
                    throw new Exception('Product creation failed: ' . implode(', ', $errorMessages));
                }

                Log::info('Product Imported successfully');
            } else {
                throw new Exception('Product creation failed!');
            }
        } catch (Exception $e) {
            Log::error('Error in publishProductUrl:', ['message' => $e->getMessage()]);
        }
    }
    private function getGraphQLPayloadForProductPublishUrl($store, $productData) 
    {
        $temp = [];
        $temp[] = 'title: "' . addslashes($productData->title) . '"';
        $temp[] = 'published: true';
        $temp[] = 'vendor: "' . addslashes($productData->vendor) . '"';
        
        if (isset($productData->body_html) && $productData->body_html !== null) {
            $escapedDescriptionHtml = json_encode($productData->body_html);
            $temp[] = 'descriptionHtml: ' . $escapedDescriptionHtml;
        }
    
        if (isset($productData->product_type)) {
            $temp[] = 'productType: "' . addslashes($productData->product_type) . '"';
        }
    
        if (isset($productData->options) && is_array($productData->options)) {
            $options = [];
            foreach ($productData->options as $option) {
                $optionValues = implode(',', array_map('addslashes', $option->values));
                $options[] = '"' . $optionValues . '"';
            }
            $temp[] = 'options: [' . implode(', ', $options) . ']';
        }
    
        if (isset($productData->variants) && is_array($productData->variants)) {
            $temp[] = 'variants: [' . $this->getVariantsGraphQLConfigUrl($productData->variants) . ']';
        }
    
        if (isset($productData->images) && is_array($productData->images)) {
            $temp[] = 'images: [' . $this->getImagesGraphQLConfigUrl($productData->images) . ']';
        }
    
        return implode(', ', $temp);
    }
    

    private function getVariantsGraphQLConfigUrl($variants) 
    {
        $str = [];
        foreach ($variants as $variant) {
            $compareAtPriceField = !empty($variant->compare_at_price) ? 'compareAtPrice: "' . $variant->compare_at_price . '",' : '';
            $optionValues = [];
            if (isset($variant->option1)) $optionValues[] = addslashes($variant->option1);
            if (isset($variant->option2)) $optionValues[] = addslashes($variant->option2);
            if (isset($variant->option3)) $optionValues[] = addslashes($variant->option3);
            $formattedOptionValues = implode('", "', $optionValues);
    
            $str[] = '{
                taxable: false,
                title: "' . addslashes($variant->title) . '",
                price: ' . $variant->price . ',
                ' . $compareAtPriceField . '
                sku: "' . addslashes($variant->sku) . '",
                options: ["' . $formattedOptionValues . '"],
                position: ' . $variant->position . ',
                inventoryItem: {cost: ' . $variant->price . ', tracked: false},
                inventoryManagement: null,
                inventoryPolicy: DENY
            }';
        }
        return implode(', ', $str);
    }

    private function getImagesGraphQLConfigUrl($images) 
    {
        $str = [];
        foreach ($images as $image) {
            $str[] = '{
                src: "' . addslashes($image->src) . '"
            }';
        }
        return implode(', ', $str);
    }

    private function getShopifyURLForStore($endpoint, $store) {
        return $this->checkIfStoreIsPrivate($store) ? 
            'https://' . $store['api_key'] . ':' . $store['api_secret_key'] . '@' . $store['myshopify_domain'] . '/admin/api/' . config('custom.shopify_api_version') . '/' . $endpoint 
            : 
            'https://' . $store['myshopify_domain'] . '/admin/api/' . config('custom.shopify_api_version') . '/' . $endpoint;
    }

    private function getShopifyHeadersForStore($store, $method = 'GET') {
        return $method == 'GET' ? [
            'Content-Type' => 'application/json',
            'X-Shopify-Access-Token' => $store['access_token']
        ] : [
            'Content-Type: application/json',
            'X-Shopify-Access-Token: ' . $store['access_token']
        ];
    }
    function checkIfStoreIsPrivate($store) {
        return isset($store['api_key']) && isset($store['api_secret_key'])
                && $store['api_key'] !== null && $store['api_secret_key'] !== null  
                && strlen($store['api_key']) > 0 && strlen($store['api_secret_key']) > 0; 
    }


}
