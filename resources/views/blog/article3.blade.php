@extends('layouts.blog')

@section('title', 'Article')

@section('content')<!--page header section start-->
<!--page header section start-->
<section class="page-header position-relative overflow-hidden ptb-120 bg-dark" style="background: url('assets/img/page-header-bg.svg')no-repeat bottom left">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-12">
                <h1 class="fw-bold display-5">How to Import Products from Etsy to Shopify in One Click</h1>
            </div>
        </div>
        <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light right-5"></div>
    </div>
</section>
<!--page header section end-->

<!--blog details section start-->
<section class="blog-details ptb-120">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-8 pe-lg-5">
                <div class="blog-details-wrap">
                <img src="assets/min/etsyimport.png" alt="Ecopy Dashboard" class="img-fluid rounded-custom mb-4">

                    <p>Expanding your e-commerce business has never been easier. With the <a href="https://ecopy.app" target="_blank">eCopy app</a>, you can effortlessly import products from <a href="https://www.etsy.com" target="_blank">Etsy</a> to your <a href="https://www.shopify.com" target="_blank">Shopify</a> store in just one click. No need for complex CSV files or manual data entry. Here's how you can do it.</p>

                    <h3 class="h5 mt-5">Step 1: Copy the Etsy Product URL</h3>
                    <p>The first step is to find the product you want to import from Etsy. Simply navigate to the product page on Etsy and copy the URL from your browser's address bar.</p>
                    <img src="assets/img/etsy_product.png" alt="Copy Etsy Product URL" class="img-fluid mt-4 mb-4 rounded">

                    <h3 class="h5">Step 2: Paste the URL into eCopy</h3>
                    <p>Next, head over to the <a href="https://ecopy.app" target="_blank">eCopy app</a>. In the import section, paste the Etsy product URL into the provided field and click the "Import" button.</p>
                    <img src="assets/img/ecopy_import.png" alt="Paste URL into eCopy" class="img-fluid mt-4 mb-4 rounded">

                    <h3 class="h5">Step 3: Review the Imported Product</h3>
                    <p>eCopy will automatically import the product along with all its details, including the title, description, price, images, and variants. You can review the product within eCopy to make any necessary adjustments before adding it to your Shopify store.</p>

                    <h3 class="h5">Step 4: Publish the Product on Shopify</h3>
                    <p>Once you’re satisfied with the imported product details, you can easily publish it directly to your Shopify store from eCopy. The product will appear on your Shopify store, ready for sale, without any manual data entry required.</p>

                    <h3 class="h5 mt-5">Why Use eCopy?</h3>
                    <p>eCopy simplifies the process of managing your e-commerce store by allowing you to import products from various platforms like Etsy, Amazon, and other Shopify stores with just a few clicks. It saves you time, reduces errors, and helps you scale your business more efficiently.</p>
                    <p><a href="https://ecopy.app" target="_blank">Try eCopy today</a> and enjoy a 2-day free trial to see how it can transform your product management process.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="author-wrap text-center bg-light-subtle p-5 sticky-sidebar rounded-custom mt-5 mt-lg-0">
                    <div class="author-info my-4">
                        <h5 class="mb-0">John Doe</h5>
                        <span class="small">E-commerce Expert</span>
                    </div>
                    <p>John has over a decade of experience in e-commerce, specializing in optimizing online stores for growth and efficiency. He's passionate about helping businesses leverage the latest tools to succeed in the competitive online marketplace.</p>
                    <ul class="list-unstyled author-social-list list-inline mt-3 mb-0">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-github"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--blog details section end-->

@endsection