<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <!--required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--meta-->
    <meta name="description" content="">
    <meta name="author" content="ThemeTags">

    <!--favicon icon-->
    <link rel="icon" href="assets/img/favicon.png" type="image/png" sizes="16x16">

    <!--title-->
    <title>{{ config('app.name') }} - Blog</title>

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:opsz,wght@9..40,400;9..40,500;9..40,600;9..40,700;9..40,800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lily+Script+One&display=swap" rel="stylesheet">
    <!-- Font -->

    <!--build:css-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- endbuild -->

    <!--custom css start-->
    <link rel="stylesheet" href="assets/css/custom.css">
    <!--custom css end-->

</head>

<body>
    <!--main content wrapper start-->
    <div class="main-wrapper">

        <!--header section start-->

        <script> configObj = {"text":"\nLaunch Your Store on Shopify for Only $1 !","bannerURL":"https://weenify.io/shopify","selectedBackgroundColor":"#0037b8","selectedTextColor":"#ffffff","bannerHeight":"48px","fontSize":"16px"};function createBanner(obj, pageSimulator) {        var swBannerLink = obj.bannerURL;        var swBannerTarget = "_blank";        var swBannerText = obj.text;        var body = document.body;        var swBanner = document.createElement('a');        var centerDiv = document.createElement('div');        var text = document.createElement('span');        swBanner.href = swBannerLink;        swBanner.target = swBannerTarget;        swBanner.style.display = "flex";        swBanner.style.justifyContent = "center";        swBanner.style.alignItems = "center";        swBanner.style.width = "100%";        swBanner.style.minHeight = "48px";        swBanner.style.maxHeight = "72px";        swBanner.style.paddingTop = "8px";        swBanner.style.paddingBottom = "8px";        swBanner.style.lineHeight = "18px";        swBanner.style.textAlign = "center";        swBanner.style.textDecoration = "none";        swBanner.style.height = obj.bannerHeight;        swBanner.style.fontSize = obj.fontSize;        text.innerHTML = swBannerText;        swBanner.style.backgroundColor = obj.selectedBackgroundColor;        swBanner.style.color = obj.selectedTextColor;        swBanner.id = 'sw-banner';        swBanner.classList.add('sw-banner');        centerDiv.classList.add('center');        centerDiv.append(text);        swBanner.append(centerDiv);        if(!pageSimulator) {          body.insertBefore(swBanner, body.firstChild);        } else {          pageSimulator.insertBefore(swBanner, pageSimulator.firstChild);        }    };document.addEventListener("DOMContentLoaded", function() { createBanner(configObj, null); });</script>      
        <header class="main-header position-absolute w-100">
            <nav class="navbar navbar-expand-xl navbar-dark z-10">
                <div class="container d-flex align-items-center justify-content-lg-between position-relative">
                    <a href="/" class="navbar-brand d-flex align-items-center mb-md-0 text-decoration-none">
                        <img src="assets/img/logo.png" alt="logo" class="img-fluid logo-white" />
                        <img src="assets/img/logo.png" alt="logo" class="img-fluid logo-color" />
                    </a>
                   
                    <a class="navbar-toggler position-absolute right-0 border-0" href="#offcanvasWithBackdrop">
                        <i class="flaticon-menu" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"
                     data-bs-toggle="offcanvas" role="button"></i>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse navbar-collapse justify-content-center">
                        <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        @if(Request::is('/'))
                            <li><a href="/" class="nav-link">{{ __('Home') }}</a></li>
                            <li><a href="#faq" class="nav-link">{{ __('FAQ') }}</a></li>
                            <li><a href="#pricing" class="nav-link">{{ __('Pricing') }}</a></li>
                            <li><a href="/contact" class="nav-link">{{ __('Contact') }}</a></li>

                        @endif
   
                </ul>
                </div>
                @guest
           @else
            <div class="collapse navbar-collapse justify-content-center">
                        <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                     <span class="avatar rounded-circle">
                                        <img alt="Image placeholder" class="rounded-circle" width="35" src="{{ Auth::user()->profile_photo_url }}">
                                    </span>
                                </a>
                                <div class="dropdown-menu border-0 rounded-custom shadow py-0 bg-white homepage-list-wrapper">
                                    <div class="dropdown-grid rounded-custom">
                                        <div class="dropdown-grid-item bg-white radius-left-side">
                                        <a class="dropdown-item" href="/dashboard">
                                                    <span class="dropdown-item-icon">
                                                    <i class="fas fa-user"></i>
                                                    </span>
                                                    {{ __('Dashboard') }}
                                                </a>
                                                <a class="dropdown-item" href="{{ route('account.password') }}">
                                                    <span class="dropdown-item-icon">
                                                    <i class="fas fa-unlock-alt"></i>
                                                    </span>
                                                    {{ __('Password') }}
                                                </a>
                                                @role('admin')
                                                <a class="dropdown-item" target="__blank" href="{{ route('admin.index') }}">
                                                    <span class="dropdown-item-icon">
                                                    <i class="fas fa-tachometer-alt"></i>
                                                    </span>
                                                    {{ __('Admin panel') }}
                                                </a>
                                                @endrole
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                    <span class="dropdown-item-icon">
                                                    <i class="fas fa-power-off"></i>
                                                    </span>
                                                    {{ __('Logout') }}
                                                </a>
                                                <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                                    @csrf
                                                </form>
                            
                                          
                                        </div>
                                       


                                    </div>
                                </div>
                            </li>
                           
                        </ul>
                    </div>
            @endguest
                <div class="hs-unfold">
                
                          </div>
                    @guest
                    <div class="action-btns text-end me-5 me-lg-0 d-none d-md-block d-lg-block">
                        <a href="javascript:void(0)" class="btn btn-link p-1 tt-theme-toggle">
                            <div class="tt-theme-light" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Light"><i class="flaticon-sun-1 fs-lg"></i></div>
                            <div class="tt-theme-dark" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Dark"><i class="flaticon-moon-1 fs-lg"></i></div>
                        </a> 
                        <a href="/login" class="btn btn-link text-decoration-none me-2">Sign In</a>
                        <a href="/register" class="btn btn-primary">Get Started</a>
                    </div>
                    @endguest

                    
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

                    @guest
                    <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <li class="nav-item dropdown">
                           
                            <li><a href="/" class="nav-link">{{ __('Home') }}</a></li>
                            <li><a href="#faq" class="nav-link">{{ __('FAQ') }}</a></li>
                            <li><a href="#pricing" class="nav-link">{{ __('Pricing') }}</a></li>
                            <li><a href="/contact" class="nav-link">{{ __('Contact') }}</a></li>
                    </ul>
                    <div class="action-btns mt-4 ps-3">
                        <a href="/login" class="btn btn-outline-primary me-2">Sign In</a>
                        <a href="/register" class="btn btn-primary">Get Started</a>
                    </div>
                    @else

                    <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <li class="nav-item dropdown">
                           

                            <li><a href="/dashboard" class="nav-link">{{ __('Dashboard') }}</a></li>
                            <li><a href="{{ route('account.password') }}" class="nav-link">{{ __('Password') }}</a></li>
                            <li>  
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <span class="dropdown-item-icon">
                            <i class="fas fa-power-off"></i>
                            </span>
                            {{ __('Logout') }}
                        </a>
                        <form method="POST" id="logout-form" action="{{ route('logout') }}">
                            @csrf
                        </form>
                            <li><a href="/contact" class="nav-link">{{ __('Contact') }}</a></li>
                    </ul>
                    <!-- start -->
                    @endguest
                    <!-- end -->

                </div>
            </div>
            <!--offcanvas menu end-->
        </header>

        <!--blog section start-->

        @yield('content')

        <!--blog section end-->


        <!--footer section start-->
        <!--footer section start-->
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
            <div class="footer-bottom  bg-gradient text-white py-4">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-md-7 col-lg-7">
                            <div class="copyright-text">
                                <p class="mb-lg-0 mb-md-0">&copy; 2024 Weenify Rights Reserved. <a href="https://weenify.io/" class="text-decoration-none">Weenify</a></p>
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
        <!--footer section end--> <!--footer section end-->

    </div>

    <!--build:js-->
    <script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="assets/js/vendors/swiper-bundle.min.js"></script>
    <script src="assets/js/vendors/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/vendors/parallax.min.js"></script>
    <script src="assets/js/vendors/aos.js"></script>
    <script src="assets/js/vendors/massonry.min.js"></script>
    <script src="assets/js/app.js"></script>
    <!--endbuild-->
</body>

</html>