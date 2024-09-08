<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="Touzani Yassine" />
    <title>{{ $pageTitle ?? 'Blog - Ecopy' }}</title>
    <meta name="description" content="{{ $pageDescription ?? 'Blog Ecopy' }}" />
    <meta name="keywords" content="dropshipping blog, blog dropship,dropship" />
    <!-- Other meta tags -->
    <meta name="robots" content="index, follow">
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.png') }}" title="Favicon" sizes="16x16" />
    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="{{ asset('assets/css/lib/bootstrap.min.css') }}">
    <!-- ====== font family ====== -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"rel="stylesheet">
    <!--build:css-->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <!-- endbuild -->
    <!--custom css end-->
    @livewireStyles
    @stack('styles')
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

    <!--main content wrapper start-->
    <div class="main-wrapper">

        <!--header section start-->
        <!--header start-->
        <script> configObj = {"text":"\nLaunch Your Store on Shopify for Only $1 !","bannerURL":"https://ecopy.app/shopify","selectedBackgroundColor":"#0037b8","selectedTextColor":"#ffffff","bannerHeight":"48px","fontSize":"16px"};function createBanner(obj, pageSimulator) {        var swBannerLink = obj.bannerURL;        var swBannerTarget = "_blank";        var swBannerText = obj.text;        var body = document.body;        var swBanner = document.createElement('a');        var centerDiv = document.createElement('div');        var text = document.createElement('span');        swBanner.href = swBannerLink;        swBanner.target = swBannerTarget;        swBanner.style.display = "flex";        swBanner.style.justifyContent = "center";        swBanner.style.alignItems = "center";        swBanner.style.width = "100%";        swBanner.style.minHeight = "48px";        swBanner.style.maxHeight = "72px";        swBanner.style.paddingTop = "8px";        swBanner.style.paddingBottom = "8px";        swBanner.style.lineHeight = "18px";        swBanner.style.textAlign = "center";        swBanner.style.textDecoration = "none";        swBanner.style.height = obj.bannerHeight;        swBanner.style.fontSize = obj.fontSize;        text.innerHTML = swBannerText;        swBanner.style.backgroundColor = obj.selectedBackgroundColor;        swBanner.style.color = obj.selectedTextColor;        swBanner.id = 'sw-banner';        swBanner.classList.add('sw-banner');        centerDiv.classList.add('center');        centerDiv.append(text);        swBanner.append(centerDiv);        if(!pageSimulator) {          body.insertBefore(swBanner, body.firstChild);        } else {          pageSimulator.insertBefore(swBanner, pageSimulator.firstChild);        }    };document.addEventListener("DOMContentLoaded", function() { createBanner(configObj, null); });</script>      
        <header class="main-header position-absolute w-100">
            <nav class="navbar navbar-expand-xl navbar-dark z-10">
                <div class="container d-flex align-items-center justify-content-lg-between position-relative">
                    <a href="/" class="navbar-brand d-flex align-items-center mb-md-0 text-decoration-none">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="img-fluid logo-white" />
                        <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="img-fluid logo-color" />
                    </a>
                    <a class="navbar-toggler position-absolute right-0 border-0" href="#offcanvasWithBackdrop">
                        <i class="flaticon-menu" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"
                     data-bs-toggle="offcanvas" role="button"></i>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse navbar-collapse justify-content-center">
                        <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                       
                            <li><a href="/" class="nav-link">{{ __('Home') }}</a></li>
                            <li><a href="/#faq" class="nav-link">{{ __('FAQ') }}</a></li>
                            <li><a href="/#pricing" class="nav-link">{{ __('Pricing') }}</a></li>
                            <li><a href="/contact" class="nav-link">{{ __('Contact') }}</a></li>
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

                <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <li class="nav-item dropdown">
                        @if(Request::is('/'))
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">ENGLISH</a>
                            @endif
                            @if(Request::is('es'))
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">SPANISH</a>
                            @endif
                            @if(Request::is('nl'))
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">DUTCH</a>
                            @endif
                            @if(Request::is('fr'))
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">FRENCH</a>
                            @endif
                            @if(Request::is('pt'))
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">PORTUGUESE</a>
                            @endif
                            <div class="dropdown-menu border-0 shadow py-0 bg-white">
                                <div class="dropdown-grid">
                                    <div class="dropdown-grid-item bg-white radius-left-side">                    
                                        <a href="/" class="dropdown-link px-0">
                                            <!-- <span class="me-2"><i class="flaticon-shopping-list"></i> </span> -->
                                            <div class="drop-title">ENGLISH</div>
                                        </a>
                                        <a href="/nl" class="dropdown-link px-0">
                                            <!-- <span class="me-2"><i class="flaticon-shopping-list"></i> </span> -->
                                            <div class="drop-title">DUTCH</div>
                                        </a>
                                        <a href="/fr" class="dropdown-link px-0">
                                            <!-- <span class="me-2"><i class="flaticon-shopping-list"></i> </span> -->
                                            <div class="drop-title">FRENCH</div>
                                        </a>
                                        <a href="/pt" class="dropdown-link px-0">
                                            <!-- <span class="me-2"><i class="flaticon-shopping-list"></i> </span> -->
                                            <div class="drop-title">PORTUGUESE</div>
                                        </a>
                                        <a href="/es" class="dropdown-link px-0">
                                            <!-- <span class="me-2"><i class="flaticon-shopping-list"></i> </span> -->
                                            <div class="drop-title">SPANISH</div>
                                        </a>

                                    </div>
                                  
                                </div>
                            </div>
                        </li>
                </ul>
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
        <!--begin header -->
        <!--blog section start-->

        @yield('content')

        <!--blog section end-->

        @unless(Request::is('register') || Request::is('login') || Request::is('email/verify'))
        <footer class="footer-section">
            <!--footer top start-->
            <!--for light footer add .footer-light class and for dark footer add .bg-dark .text-white class-->
            <div class="footer-top  bg-gradient text-white ptb-120" style="background: url('assets/img/page-header-bg.svg')no-repeat bottom right">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-8 col-lg-4 mb-md-4 mb-lg-0">
                            <div class="footer-single-col">
                                <div class="footer-single-col mb-4">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="img-fluid logo-white">
                                    <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="img-fluid logo-color">
                                </div>
                                <p>Get every single promotional & business update.</p>

                                <form class="newsletter-form position-relative d-block d-lg-flex d-md-flex">
                                    <input type="text" class="input-newsletter form-control me-2" placeholder="Enter your email" name="email" required="" autocomplete="off">
                                    <input type="submit" value="Subscribe" data-wait="Please wait..." class="btn btn-primary mt-3 mt-lg-0 mt-md-0">
                                </form>
                                <div class="ratting-wrap mt-4">
                                    <h6 class="mb-0">9/10 Overall rating</h6>
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
                                            <!-- <li><a href="https://weenify.firstpromoter.com/" class="text-decoration-none">Affiliate Program</a></li> -->
                                            <li><a href="/RefundPolicy" class="text-decoration-none">Refund Policy</a></li>
                                            <li><a href="/#pricing" class="text-decoration-none">Pricing</a></li>
                                            <li><a href="/blog-home" class="text-decoration-none">Blog</a></li>


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
                                <li class="list-inline-item"><a href="https://www.facebook.com/ecopyapp" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        <li class="list-inline-item"><a href="https://www.instagram.com/ecopy.app" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        <li class="list-inline-item"><a href="https://www.tiktok.com/@ecopyapp" target="_blank"><i class="fab fa-tiktok"></i></a></li>
                                        <li class="list-inline-item"><a href="https://www.youtube.com/@ecopyapp" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                        <li class="list-inline-item"><a href="https://fr.quora.com/profile/Ecopy-App" target="_blank"><i class="fab fa-quora"></i></a></li>
                                        <li class="list-inline-item"><a href="https://www.reddit.com/user/ecopy-app/" target="_blank"><i class="fab fa-reddit"></i></a></li>
                                        <li class="list-inline-item"><a href="https://x.com/EcopyApp" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        <li class="list-inline-item"><a href="https://www.pinterest.fr/ecopyapp/" target="_blank"><i class="fab fa-pinterest"></i></a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer bottom end-->
        </footer>
        @endunless
    
    <script src="{{ asset('assets/js/vendors/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/parallax.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/aos.js') }}"></script>
    <script src="{{ asset('assets/js/vendors/massonry.min.js') }}"></script>
    <script src="https://codepen.io/steveg3003/pen/zBVakw.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js"></script>

</body>
</html>
