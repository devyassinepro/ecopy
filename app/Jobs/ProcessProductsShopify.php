<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Jobs\PublishProductToShopifyJob;



class ProcessProductsShopify implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $products;
    protected $store;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($products,$store)
    {
        //
        $this->products = $products;
        $this->store = $store;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //

            try {
                foreach ($this->products as $product) {
                    PublishProductToShopifyJob::dispatch($product, $this->store);
                }
                Log::info('All products processed successfully.');
            } catch (Exception $e) {
                Log::error('Error processing products:', ['message' => $e->getMessage()]);
            }
    }
}
