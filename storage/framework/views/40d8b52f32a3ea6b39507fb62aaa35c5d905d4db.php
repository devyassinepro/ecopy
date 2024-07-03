<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-bs-theme="light">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="keywords" content="Ecopy , store shopify tracking ,store shopify,product spying, keyword research, search engine optimization, search engine marketing" />
    <meta name="description" content="Iteck - Multi-Purpose HTML5 Template" />
    <meta name="author" content="Touzani Yassine" />


        <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name')); ?> - Copy products for shopify | Product Importer</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" title="Favicon" sizes="16x16" />



    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="assets/css/lib/bootstrap.min.css">

    <!-- ====== font family ====== -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"rel="stylesheet">

        <!--build:css-->
        <link rel="stylesheet" href="assets/css/main.css">
    <!-- endbuild -->

    <!--custom css start-->
    <link rel="stylesheet" href="assets/css/custom.css">

    <?php if(Request::is('email/verify')): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/dashlite.css?ver=3.2.0')); ?>" type="text/css">
    <?php endif; ?>

    <!--custom css end-->

    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
    <style>
        .card-body{
            border-top:none;
        }
        .navbar-fixed-top .navbar-nav .current a{
            color: #5f6468 !important;
        }
    </style>
</head>

<body>

    <!-- ======== End Navbar ======== -->
    <!--preloader end-->
    <!--main content wrapper start-->
    <div class="main-wrapper">

        <!--header section start-->
        <!--header start-->
        <script> configObj = {"text":"\nLaunch Your Store on Shopify for Only $1 !","bannerURL":"https://weenify.io/shopify","selectedBackgroundColor":"#0037b8","selectedTextColor":"#ffffff","bannerHeight":"48px","fontSize":"16px"};function createBanner(obj, pageSimulator) {        var swBannerLink = obj.bannerURL;        var swBannerTarget = "_blank";        var swBannerText = obj.text;        var body = document.body;        var swBanner = document.createElement('a');        var centerDiv = document.createElement('div');        var text = document.createElement('span');        swBanner.href = swBannerLink;        swBanner.target = swBannerTarget;        swBanner.style.display = "flex";        swBanner.style.justifyContent = "center";        swBanner.style.alignItems = "center";        swBanner.style.width = "100%";        swBanner.style.minHeight = "48px";        swBanner.style.maxHeight = "72px";        swBanner.style.paddingTop = "8px";        swBanner.style.paddingBottom = "8px";        swBanner.style.lineHeight = "18px";        swBanner.style.textAlign = "center";        swBanner.style.textDecoration = "none";        swBanner.style.height = obj.bannerHeight;        swBanner.style.fontSize = obj.fontSize;        text.innerHTML = swBannerText;        swBanner.style.backgroundColor = obj.selectedBackgroundColor;        swBanner.style.color = obj.selectedTextColor;        swBanner.id = 'sw-banner';        swBanner.classList.add('sw-banner');        centerDiv.classList.add('center');        centerDiv.append(text);        swBanner.append(centerDiv);        if(!pageSimulator) {          body.insertBefore(swBanner, body.firstChild);        } else {          pageSimulator.insertBefore(swBanner, pageSimulator.firstChild);        }    };document.addEventListener("DOMContentLoaded", function() { createBanner(configObj, null); });</script>      
        <header class="main-header position-absolute w-100">
            <nav class="navbar navbar-expand-xl navbar-dark z-10">
                <div class="container d-flex align-items-center justify-content-lg-between position-relative">
                <?php if(Request::is('/')): ?>
                    <a href="/" class="navbar-brand d-flex align-items-center mb-md-0 text-decoration-none">
                        <img src="assets/img/logo.png" alt="logo" class="img-fluid logo-white" />
                        <img src="assets/img/logo.png" alt="logo" class="img-fluid logo-color" />
                    </a>
                <?php else: ?> 
                    <!-- <a class="navbar-brand" href="/">
                    <img src="<?php echo e(asset('assets/img/logo.png')); ?>" class="navbar-brand-img" alt="knine" style="max-height: 3rem;">
                  </a> -->
                <?php endif; ?>
                    <a class="navbar-toggler position-absolute right-0 border-0" href="#offcanvasWithBackdrop">
                        <i class="flaticon-menu" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"
                     data-bs-toggle="offcanvas" role="button"></i>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse navbar-collapse justify-content-center">
                        <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <?php if(Request::is('/')): ?>

                            <li><a href="/" class="nav-link"><?php echo e(__('Home')); ?></a></li>
                            <li><a href="#faq" class="nav-link"><?php echo e(__('FAQ')); ?></a></li>
                            <li><a href="#pricing" class="nav-link"><?php echo e(__('Pricing')); ?></a></li>
                            <li><a href="/contact" class="nav-link"><?php echo e(__('Contact')); ?></a></li>

                        <?php endif; ?>
   
                </ul>
                </div>
                <?php if(auth()->guard()->guest()): ?>
            <!--  -->
            <!-- <li class="discover-link"><a href="/login" class="external"><?php echo e(__('Login')); ?></a></li> -->
            <!-- <li class="discover-link"><a href="/register" class="external discover-btn"><?php echo e(__('Start Free Trial')); ?></a></li> -->
            <?php else: ?>
            <div class="collapse navbar-collapse justify-content-center">
                        <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                     <span class="avatar rounded-circle">
                                        <img alt="Image placeholder" class="rounded-circle" width="35" src="<?php echo e(Auth::user()->profile_photo_url); ?>">
                                    </span>
                                </a>
                                <div class="dropdown-menu border-0 rounded-custom shadow py-0 bg-white homepage-list-wrapper">
                                    <div class="dropdown-grid rounded-custom">
                                        <div class="dropdown-grid-item bg-white radius-left-side">
                                        <a class="dropdown-item" href="/dashboard">
                                                    <span class="dropdown-item-icon">
                                                    <i class="fas fa-user"></i>
                                                    </span>
                                                    <?php echo e(__('Dashboard')); ?>

                                                </a>
                                                <a class="dropdown-item" href="<?php echo e(route('account.password')); ?>">
                                                    <span class="dropdown-item-icon">
                                                    <i class="fas fa-unlock-alt"></i>
                                                    </span>
                                                    <?php echo e(__('Password')); ?>

                                                </a>
                                                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                                                <a class="dropdown-item" target="__blank" href="<?php echo e(route('admin.index')); ?>">
                                                    <span class="dropdown-item-icon">
                                                    <i class="fas fa-tachometer-alt"></i>
                                                    </span>
                                                    <?php echo e(__('Admin panel')); ?>

                                                </a>
                                                <?php endif; ?>
                                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                    <span class="dropdown-item-icon">
                                                    <i class="fas fa-power-off"></i>
                                                    </span>
                                                    <?php echo e(__('Logout')); ?>

                                                </a>
                                                <form method="POST" id="logout-form" action="<?php echo e(route('logout')); ?>">
                                                    <?php echo csrf_field(); ?>
                                                </form>
                            
                                          
                                        </div>
                                       


                                    </div>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
            <?php endif; ?>
                <div class="hs-unfold">
                
                          </div>
                    <?php if(auth()->guard()->guest()): ?>
                    <div class="action-btns text-end me-5 me-lg-0 d-none d-md-block d-lg-block">
                        <a href="javascript:void(0)" class="btn btn-link p-1 tt-theme-toggle">
                            <div class="tt-theme-light" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Light"><i class="flaticon-sun-1 fs-lg"></i></div>
                            <div class="tt-theme-dark" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Dark"><i class="flaticon-moon-1 fs-lg"></i></div>
                        </a> 
                        <a href="/login" class="btn btn-link text-decoration-none me-2">Sign In</a>
                        <a href="/register" class="btn btn-primary">Get Started</a>
                    </div>
                    <?php endif; ?>

                    
                </div>
            </nav>
            <!--offcanvas menu start-->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasWithBackdrop">
                <div class="offcanvas-header d-flex align-items-center mt-4">
                    <a href="/" class="d-flex align-items-center mb-md-0 text-decoration-none">
                        <img src="saas/img/logo.png" alt="logo" class="img-fluid ps-2" />
                    </a>
                    <button type="button" class="close-btn text-danger" data-bs-dismiss="offcanvas" aria-label="Close">
                        <i class="flaticon-cancel"></i>
                    </button>
                </div>
                <div class="offcanvas-body z-10">

                    <?php if(auth()->guard()->guest()): ?>
                    <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <li class="nav-item dropdown">
                           
                            <li><a href="/" class="nav-link"><?php echo e(__('Home')); ?></a></li>
                            <li><a href="#faq" class="nav-link"><?php echo e(__('FAQ')); ?></a></li>
                            <li><a href="#pricing" class="nav-link"><?php echo e(__('Pricing')); ?></a></li>
                            <li><a href="/contact" class="nav-link"><?php echo e(__('Contact')); ?></a></li>
                    </ul>
                    <div class="action-btns mt-4 ps-3">
                        <a href="/login" class="btn btn-outline-primary me-2">Sign In</a>
                        <a href="/register" class="btn btn-primary">Get Started</a>
                    </div>
                    <?php else: ?>

                    <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <li class="nav-item dropdown">
                           

                            <li><a href="/dashboard" class="nav-link"><?php echo e(__('Dashboard')); ?></a></li>
                            <li><a href="<?php echo e(route('account.password')); ?>" class="nav-link"><?php echo e(__('Password')); ?></a></li>
                            <li>  
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <span class="dropdown-item-icon">
                            <i class="fas fa-power-off"></i>
                            </span>
                            <?php echo e(__('Logout')); ?>

                        </a>
                        <form method="POST" id="logout-form" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                        </form>
                            <li><a href="/contact" class="nav-link"><?php echo e(__('Contact')); ?></a></li>
                    </ul>
                    <!-- start -->
                    <?php endif; ?>
                    <!-- end -->

                </div>
            </div>
            <!--offcanvas menu end-->
        </header>
<!--begin header -->
<!--end header -->

        <?php echo e($slot); ?>

        <?php if (! (Request::is('register') || Request::is('login') || Request::is('email/verify'))): ?>
        <footer class="footer-section">
            <!--footer top start-->
            <!--for light footer add .footer-light class and for dark footer add .bg-dark .text-white class-->
            <div class="footer-top  bg-gradient text-white ptb-120" style="background: url('assets/img/page-header-bg.svg')no-repeat bottom right">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-8 col-lg-4 mb-md-4 mb-lg-0">
                            <div class="footer-single-col">
                                <div class="footer-single-col mb-4">
                                    <img src="assets/img/logo.png" alt="logo" class="img-fluid logo-white">
                                    <img src="assets/img/logo.png" alt="logo" class="img-fluid logo-color">
                                </div>
                                <p>Get every single promotional & business update.</p>

                                <form class="newsletter-form position-relative d-block d-lg-flex d-md-flex">
                                    <input type="text" class="input-newsletter form-control me-2" placeholder="Enter your email" name="email" required="" autocomplete="off">
                                    <input type="submit" value="Subscribe" data-wait="Please wait..." class="btn btn-primary mt-3 mt-lg-0 mt-md-0">
                                </form>
                                <div class="ratting-wrap mt-4">
                                    <h6 class="mb-0">10/10 Overall rating</h6>
                                    <ul class="list-unstyled rating-list list-inline mb-0">
                                        <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                        <li class="list-inline-item"><i class="fas fa-star text-warning"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-7 mt-4 mt-md-0 mt-lg-0">
                            <div class="row">
                                <div class="col-md-4 col-lg-4 mt-4 mt-md-0 mt-lg-0">
                                    <div class="footer-single-col">
                                        <!-- <h3>Primary Pages</h3> -->
                                        <ul class="list-unstyled footer-nav-list mb-lg-0">
                                            <li><a href="/" class="text-decoration-none">Home</a></li>
                                            <li><a href="/contact" class="text-decoration-none">Contact</a></li>
                                            <li><a href="/TermsandConditions" class="text-decoration-none">Terms and Conditions</a></li>
                                            <li><a href="/privacypolicy" class="text-decoration-none">Privacy Policy</a></li>
                                            <li><a href="https://weenify.firstpromoter.com/" class="text-decoration-none">Affiliate Program</a></li>
                                            <li><a href="/RefundPolicy" class="text-decoration-none">Refund Policy</a></li>
                                            <li><a href="/#pricing" class="text-decoration-none">Pricing</a></li>

                                            </li>
                                            <li>
                                        </ul>
                                    </div>
                                </div>
                            
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--footer top end-->

            <!--footer bottom start-->
            <div class="footer-bottom  bg-gradient text-white py-4">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-7 col-lg-7">
                            <div class="copyright-text">
                                <p class="mb-lg-0 mb-md-0">&copy; 2024 Ecopy Rights Reserved. <a href="https://weenify.io/" class="text-decoration-none">Ecopy</a></p>
                            </div>
                        </div>
                        <div class="col-md-4 col-lg-4">
                            <div class="footer-single-col text-start text-lg-end text-md-end">
                                <ul class="list-unstyled list-inline footer-social-list mb-0">
                                    <li class="list-inline-item"><a href="" target=”_blank”><i class="fab fa-facebook-f"></i></a></li>
                                    <li class="list-inline-item"><a href="https://www.instagram.com/weenifyio" target=”_blank”><i class="fab fa-instagram"></i></a></li>
                                    <li class="list-inline-item"><a href="https://www.tiktok.com/@weenify" target=”_blank”><i class="fab fa-tiktok"></i></a></li>
                                    <li class="list-inline-item"><a href="https://www.youtube.com/channel/UCBuzUBYeBY1NemZE5DFXuaw" target=”_blank”><i class="fab fa-youtube"></i></a></li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer bottom end-->
        </footer>
        <?php endif; ?>
        <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>


    <script src="assets/js/app.js"></script>
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/swiper-bundle.min.js"></script>
    <script src="assets/js/vendors/parallax.min.js"></script>
    <script src="assets/js/vendors/aos.js"></script>
    <script src="assets/js/vendors/massonry.min.js"></script>


</body>
</html>
<?php /**PATH /Users/touzani/Desktop/ecopy/ecopy.app/resources/views/layouts/guest.blade.php ENDPATH**/ ?>