<?php

namespace App\Livewire\Account\Research;
use Jantinnerezo\LivewireAlert\LivewireAlert;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Storeuser;
use App\Models\stores;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Listproducts extends Component
{
    use LivewireAlert;
    use WithPagination;
    public $search = "";
    public $filtrePagination = "";
    public $filterDropshipping = true;


    public function placeholder()
    {
        return view('skeleton');
    }

        //    filters data
        public $title = '';
        public $titleexclude = '';
        public $description = '';
        public $descriptionexlude = '';
        public $url = ''; 
        public $urlexlude = '';
        public $pricemin = '';
        public $pricemax = '';
        public $storemin = '';
        public $storemax = '';
        public $country = '';
        public $currency = '';

protected $debug = true;


protected $paginationTheme = 'bootstrap';
public $page = 1;

    public function updatePagination($perPage)
    {
        $this->filtrePagination = $perPage;
    }

    public function save(){
        return view('skeleton');
    }

public function render()
{
    if(check_user_type() != 'user')
    {
        redirect()->route('dashboard')->with('error','You can not access this page.');
    }

    // Calculate the date three months ago from now
    $threeMonthsAgo = Carbon::now()->subMonths(4);
        
        $products = Product::where('title', '>=', 10)
        ->whereBetween('created_at_shopify', [$threeMonthsAgo, Carbon::now()])
        ->latest('created_at_shopify');
        
    // filters
    if($this->title != ""){
        // $this->resetPage();
        $products->where("title", "LIKE",  "%". $this->title ."%");
    }
    if($this->url != ""){
        $products->where('url', 'LIKE', "%{$this->url}%");
    }

    if (!empty($this->titleexclude)) {
        $products->where('title', 'not like', "%{$this->titleexclude}%");
    }

    if (!empty($this->urlexlude)) {
        $products->where('url', 'not like', "%{$this->urlexlude}%");
    }

    if (!empty($this->pricemin)) {

        // $products->where('prix', '>=', $this->priceMin);
        $products->where('prix', '>=', $this->pricemin);

    }
    if (!empty($this->pricemax)) {
        $products->where('prix', '<=', $this->pricemax);
    }
    if (!empty($this->storemin)) {
        // $products->where('prix', '>=', $this->priceMin);
        $products->whereHas('stores', function ($query) {
            $query->where('allproducts', '<=', $this->storemin);
        });
    }
    if (!empty($this->storemax)) {
        $products->whereHas('stores', function ($query) {
            $query->where('allproducts', '>=', $this->storemax);
        });
    }
    if (!empty($this->country)) {
        $products->whereHas('stores', function ($query) {
            $query->where('country', '=', $this->country);
        });
    }
    if (!empty($this->currency)) {
        $products->whereHas('stores', function ($query) {
            $query->where('currency', '=', $this->currency);
        });
    }
    if ($this->filterDropshipping) {
        $products->where('dropshipping', 1); // Assuming 'dropshipping' is a boolean column
    }


    if($this->filtrePagination != ""){

        $products =$products->paginate($this->filtrePagination);
    }else{
        // $products =$products->paginate(20);
    }

    if($this->page > 1){
        $products = $products->paginate(25, ['*'], 'page', $this->page);
        // dd($products);
    }else {
        $products =  $products->paginate(25);
        // dd($products);
    }
       return view('livewire.account.research.listproducts', compact('products'));

}


public function updated($property)
{
    if ($property === 'search') {
        $this->resetPage();
    }
}
public function gotoPage($page)
{
    $this->page = $page; // Set the selected page
}

public function updatingQuery(){
    $this->resetPage();
}

public function updatedSearch()
{
    $this->resetPage();
}

        /**Trackstore from product research
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function trackstore($id)
    {

        if(check_user_type() != 'user')
        {
            return redirect()->route('dashboard')->with('error','You can not access this page.');
        }

        $user_id = Auth::user()->id;
        $storeuser = Storeuser::where('user_id', $user_id)->count();
       
       
        if(currentTeam()->onTrial()){

            if($storeuser >=3 ){
                $this->alert('warning', __('You can not add more stores on trial !'));
                return redirect()->route('account.storesearch.index');

            }
        }
        else if(check_store_limit() <= $storeuser)
        {
            return redirect()->route('subscription.plans');
        }
         $storedata = DB::table('stores')->where('id', $id)->first();
         $stores = stores::where('url', $storedata->url)->first();

            if($stores)
            {
                $storeuser = Storeuser::where('user_id', $user_id)->where('store_id', $stores->id)->count();
                if($storeuser > 0)
                {
                    redirect()->route('account.AddStore.index');
                }
                else
                {
                    Storeuser::create([
                        "store_id" => $stores->id,
                        "user_id" => $user_id,
                        "created_at" => now(),
                        "updated_at" => now()
                    ]);

                        $storeStartTracking = array(
                        'status' => 1,
                        );
                        // if no movement in 7 days Stop Update store
                    DB::table('stores')->where('id', $id)->update($storeStartTracking);
                }

            }
            return redirect()->route('account.storesearch.index');


    }
public function exportToCsv($url)
{
    $opts = array('http' => array('header' => "User-Agent:MyAgent/1.0\r\n"));
    $context = stream_context_create($opts);
    $html = file_get_contents($url . '.json', false, $context);
    $productData = json_decode($html, true);
    
    // Define the CSV file path
    $csvFilePath = 'product_' . $productData['product']['handle'] . '.csv';
    
    $csvFile = fopen($csvFilePath, 'w');
    
    // Define the header row
    $headerRow = [
        'Handle',
        'Title',
        'Body (HTML)',
        'Vendor',
        'Product Category',
        'Type',
        'Tags',
        'Published',
        'Option1 Name',
        'Option1 Value',
        'Option2 Name',
        'Option2 Value',
        'Option3 Name',
        'Option3 Value',
        'Variant SKU',
        'Variant Grams',
        'Variant Inventory Tracker',
        'Variant Inventory Qty',
        'Variant Inventory Policy',
        'Variant Fulfillment Service',
        'Variant Price',
        'Variant Compare At Price',
        'Variant Requires Shipping',
        'Variant Taxable',
        'Variant Barcode',
        'Image Src',
        'Image Position',
        'Image Alt Text',
        'Gift Card',
        'SEO Title',
        'SEO Description',
        'Google Shopping / Google Product Category',
        'Google Shopping / Gender',
        'Google Shopping / Age Group',
        'Google Shopping / MPN',
        'Google Shopping / AdWords Grouping',
        'Google Shopping / AdWords Labels',
        'Google Shopping / Condition',
        'Google Shopping / Custom Product',
        'Google Shopping / Custom Label 0',
        'Google Shopping / Custom Label 1',
        'Google Shopping / Custom Label 2',
        'Google Shopping / Custom Label 3',
        'Google Shopping / Custom Label 4',
        'Variant Image',
        'Variant Weight Unit',
        'Variant Tax Code',
        'Cost per item',
        'Price / International',
        'Compare At Price / International',
        'Status',
    ];
    
    // Write the header row to the CSV file
    fputcsv($csvFile, $headerRow);
    
    // Main product data row
    $mainProductRow = [
        $productData['product']['handle'],
        $productData['product']['title'],
        $productData['product']['body_html'],
        $productData['product']['vendor'],
        $productData['product']['product_type'],
        $productData['product']['template_suffix'],
        $productData['product']['tags'],
        $productData['product']['published_at'],
        $productData['product']['options'][0]['name']?? '',
        $productData['product']['variants'][0]['option1']?? '',
        $productData['product']['options'][1]['name'] ?? '',
        $productData['product']['variants'][0]['option2'] ?? '',
        $productData['product']['options'][2]['name'] ?? '',
        $productData['product']['variants'][0]['option3'] ?? '',
        $productData['product']['variants'][0]['sku'],
        $productData['product']['variants'][0]['weight'],
        '',
        '0',
        'deny',
        'manual',
        $productData['product']['variants'][0]['price'],
        $productData['product']['variants'][0]['compare_at_price'],
        $productData['product']['variants'][0]['requires_shipping'],
        '',
        '',
        $productData['product']['images'][0]['src'],
        $productData['product']['images'][0]['position'],
        $productData['product']['images'][0]['alt'],
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        '',
        $productData['product']['images'][0]['src'],
        $productData['product']['variants'][0]['weight_unit'],
        '',
        '',
        '',
        '',
        'active',
    ];
    
    // Write the main product data row to the file
    fputcsv($csvFile, $mainProductRow);
    $positionCounter = 1; // Initialize the position counter to 1

    $variantImageIds = [];

    $firstimage = "";
    
    foreach ($productData['product']['variants'] as $variant) {
        if ($positionCounter > 1) {
            // Find the image associated with the variant based on image_id
            $image = null;
            foreach ($productData['product']['images'] as $img) {
                if ($img['id'] == $variant['image_id']) {
                    $image = $img;

                    if(!empty($img['src'])){
                        $firstimage = $img['src'];
                    }
                    break;
                }
            }
    
            // Get the image source (URL) or set it to an empty string if no image is found
            // $imageSrc = $image ? $image['src'] : '';
    
            $variantRow = [
                $productData['product']['handle'],
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                $variant['option1']?? '',
                '',
                $variant['option2']?? '',
                '',
                $variant['option3']?? '',
                $variant['sku'],
                $variant['grams'],
                '',
                '0',
                'deny',
                'manual',
                $variant['price'],
                $variant['compare_at_price'],
                $variant['requires_shipping'] ? 'TRUE' : 'FALSE',
                '',
                '',
                $image ? $image['src'] : $productData['product']['images'][0]['src'], // Updated with image source (URL)
                $positionCounter, // Use the position counter
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                $image ? $image['src'] : $productData['product']['images'][0]['src'], // Updated with image source (URL)
                $productData['product']['variants'][0]['weight_unit'],
                '',
                '',
                '',
                '',
                'active',
            ];
    
            // Write the variant row to the file
            fputcsv($csvFile, $variantRow);

            if ($image) {
                $variantImageIds[] = $image['id'];
            }

        }
    
        // Increment the position counter for the next variant
        $positionCounter++;
    }

// Create an array to store image IDs associated with variants

    foreach ($productData['product']['images'] as $img) {
      
            // Find the image associated with the variant based on image_id
      
            if (!in_array($img['id'], $variantImageIds)) {
            $imageSrc = $img['src']; // Get the image source for non-associated images
            $imagesRow = [
                $productData['product']['handle'],
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                $imageSrc, // Updated with image source (URL)
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
                '',
            ];
    
            // Write the variant row to the file
            fputcsv($csvFile, $imagesRow);
      
        }
     
    }

    
    // Close the CSV file
    fclose($csvFile);
    $this->alert('success', __('The product Exported successfully !'));
    // Return the path to the generated CSV file
    return response()->download($csvFilePath)->deleteFileAfterSend(true);

}

}
