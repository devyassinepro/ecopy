<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="Touzani Yassine" />
    <title>{{ config('app.name') }} - Producten kopiëren naar Shopify | Product Importeur</title>
    <meta name="description" content="Ecopy.app - Producten kopiëren van shopify, amazon, etsy naar uw shopify winkel met één klik" />
    <meta name="keywords" content="Ecopy,ecopy.app,poky,Producten kopiëren naar Shopify,Shopify product importeur" />
    <meta property="og:description" content="Ecopy,ecopy.app,poky,Producten kopiëren naar Shopify,Shopify product importeur" />
    <meta property="og:url" content="https://ecopy.app/" />
    <meta property="og:site_name" content="Producten kopiëren naar Shopify, WooCommerce en Wix winkels, Shopify product importeur" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" title="Favicon" sizes="16x16" />
    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="assets/css/lib/bootstrap.min.css">
    <!-- ====== font family ====== -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!--build:css-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- endbuild -->
    <!-- custom css start-->
    <link rel="stylesheet" href="assets/css/custom.css">
    @if(Request::is('email/verify'))
    <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.2.0') }}" type="text/css">
    @endif
    <!-- custom css end-->
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

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-234R6GX9KR"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-234R6GX9KR');
    </script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-992215432"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-992215432');
    </script>
    <!-- Hotjar Tracking Code for 5058947 (missing name) -->
    <script>
        (function(h,o,t,j,a,r){
            h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
            h._hjSettings={hjid:5058947,hjsv:6};
            a=o.getElementsByTagName('head')[0];
            r=o.createElement('script');r.async=1;
            r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
            a.appendChild(r);
        })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

</head>

<body>

    <!-- begin main content wrapper-->
    <div class="main-wrapper">

        <!-- begin header section-->
        <!-- begin header-->
        <script> configObj = {"text":"\nStart uw winkel op Shopify voor slechts $1!","bannerURL":"https://ecopy.app/shopify","selectedBackgroundColor":"#0037b8","selectedTextColor":"#ffffff","bannerHeight":"48px","fontSize":"16px"};function createBanner(obj, pageSimulator) {        var swBannerLink = obj.bannerURL;        var swBannerTarget = "_blank";        var swBannerText = obj.text;        var body = document.body;        var swBanner = document.createElement('a');        var centerDiv = document.createElement('div');        var text = document.createElement('span');        swBanner.href = swBannerLink;        swBanner.target = swBannerTarget;        swBanner.style.display = "flex";        swBanner.style.justifyContent = "center";        swBanner.style.alignItems = "center";        swBanner.style.width = "100%";        swBanner.style.minHeight = "48px";        swBanner.style.maxHeight = "72px";        swBanner.style.paddingTop = "8px";        swBanner.style.paddingBottom = "8px";        swBanner.style.lineHeight = "18px";        swBanner.style.textAlign = "center";        swBanner.style.textDecoration = "none";        swBanner.style.height = obj.bannerHeight;        swBanner.style.fontSize = obj.fontSize;        text.innerHTML = swBannerText;        swBanner.style.backgroundColor = obj.selectedBackgroundColor;        swBanner.style.color = obj.selectedTextColor;        swBanner.id = 'sw-banner';        swBanner.classList.add('sw-banner');        centerDiv.classList.add('center');        centerDiv.append(text);        swBanner.append(centerDiv);        if(!pageSimulator) {          body.insertBefore(swBanner, body.firstChild);        } else {          pageSimulator.insertBefore(swBanner, pageSimulator.firstChild);        }    };document.addEventListener("DOMContentLoaded", function() { createBanner(configObj, null); });</script>      
        <header class="main-header position-absolute w-100">
            <nav class="navbar navbar-expand-xl navbar-dark z-10">
                <div class="container d-flex align-items-center justify-content-lg-between position-relative">
                @if(Request::is('/') || Request::is('nl'))
                    <a href="/" class="navbar-brand d-flex align-items-center mb-md-0 text-decoration-none">
                        <img src="assets/img/logo.png" alt="logo" class="img-fluid logo-white" />
                        <img src="assets/img/logo.png" alt="logo" class="img-fluid logo-color" />
                    </a>
                @else 
                @endif
                    <a class="navbar-toggler position-absolute right-0 border-0" href="#offcanvasWithBackdrop">
                        <i class="flaticon-menu" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"
                     data-bs-toggle="offcanvas" role="button"></i>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse navbar-collapse justify-content-center">
                        <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        @if(Request::is('/') || Request::is('nl'))
                            <li><a href="/" class="nav-link">{{ __('Home') }}</a></li>
                            <li><a href="#faq" class="nav-link">{{ __('FAQ') }}</a></li>
                            <li><a href="#pricing" class="nav-link">{{ __('Prijzen') }}</a></li>
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
                                                    {{ __('Wachtwoord') }}
                                                </a>
                                                @role('admin')
                                                <a class="dropdown-item" target="__blank" href="{{ route('admin.index') }}">
                                                    <span class="dropdown-item-icon">
                                                    <i class="fas fa-tachometer-alt"></i>
                                                    </span>
                                                    {{ __('Admin Paneel') }}
                                                </a>
                                                @endrole
                                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                    <span class="dropdown-item-icon">
                                                    <i class="fas fa-power-off"></i>
                                                    </span>
                                                    {{ __('Uitloggen') }}
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
                            <div class="tt-theme-light" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Licht"><i class="flaticon-sun-1 fs-lg"></i></div>
                            <div class="tt-theme-dark" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Donker"><i class="flaticon-moon-1 fs-lg"></i></div>
                        </a> 
                        <a href="/login" class="btn btn-link text-decoration-none me-2">Inloggen</a>
                        <a href="/register" class="btn btn-primary">Begin</a>
                    </div>
                    @endguest

                    
                </div>
            </nav>
            <!-- begin offcanvas menu -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasWithBackdrop">
                <div class="offcanvas-header d-flex align-items-center mt-4">
                    <a href="/" class="d-flex align-items-center mb-md-0 text-decoration-none">
                        <img src="saas/img/logo.png" alt="logo" class="img-fluid ps-2" />
                    </a>
                    <button type="button" class="close-btn text-danger" data-bs-dismiss="offcanvas" aria-label="Sluiten">
                        <i class="flaticon-cancel"></i>
                    </button>
                </div>
                <div class="offcanvas-body z-10">

                    @guest
                    <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <li class="nav-item dropdown">
                           
                            <li><a href="/" class="nav-link">{{ __('Home') }}</a></li>
                            <li><a href="#faq" class="nav-link">{{ __('FAQ') }}</a></li>
                            <li><a href="#pricing" class="nav-link">{{ __('Prijzen') }}</a></li>
                            <li><a href="/contact" class="nav-link">{{ __('Contact') }}</a></li>
                    </ul>
                    <div class="action-btns mt-4 ps-3">
                        <a href="/login" class="btn btn-outline-primary me-2">Inloggen</a>
                        <a href="/register" class="btn btn-primary">Begin</a>
                    </div>
                    @else

                    <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <li class="nav-item dropdown">
                           

                            <li><a href="/dashboard" class="nav-link">{{ __('Dashboard') }}</a></li>
                            <li><a href="{{ route('account.password') }}" class="nav-link">{{ __('Wachtwoord') }}</a></li>
                            <li>  
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <span class="dropdown-item-icon">
                            <i class="fas fa-power-off"></i>
                            </span>
                            {{ __('Uitloggen') }}
                        </a>
                        <form method="POST" id="logout-form" action="{{ route('logout') }}">
                            @csrf
                        </form>
                            <li><a href="/contact" class="nav-link">{{ __('Contact') }}</a></li>
                    </ul>
                    <!-- begin -->
                    @endguest
                    <!-- einde -->

                </div>
            </div>
            <!-- einde offcanvas menu -->
        </header>

<!-- début de l'en-tête -->
<!-- fin de l'en-tête -->
<!--section héroïque début-->
<!--hero section begin-->
<section class="hero-section ptb-120 text-white bg-gradient" style="background: url('assets/img/hero-dot-bg.png')no-repeat center right">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-10">
                <div class="hero-content-wrap mt-5 mt-lg-0 mt-xl-0">
                    <h1 class="fw-bold display-5">Importeer producten naar Shopify met één klik</h1>
                    <p class="lead">Bespaar tijd en geld met Ecopy. Importeer eenvoudig producten van Amazon, Etsy of AliExpress met slechts een URL.</p>
                    <div class="action-btn mt-5 align-items-center d-block d-sm-flex d-lg-flex d-md-flex">
                        <a href="/register" class="btn btn-primary me-3">Begin gratis proefperiode</a>
                        <a href="https://www.youtube.com/watch?v=7_PLuhJNsto" class="text-decoration-none popup-youtube d-inline-flex align-items-center watch-now-btn mt-3 mt-lg-0 mt-md-0"> <i
                                class="fas fa-play"></i> Bekijk demo </a>
                    </div>
                    <div class="row justify-content-lg-start mt-60">
                        <h6 class="text-white-70 mb-2">VAN TOEPASSING OP ALLE VERKOPERS</h6>
                        <div class="col-4 col-sm-3 my-2 ps-lg-0">
                            <img src="assets/img/clients/shopify.png" alt="shopify" class="img-fluid">
                        </div>
                        <div class="col-4 col-sm-3 my-2 ps-lg-0">
                            <img src="assets/img/clients/woocommerce.png" alt="woocommerce" class="img-fluid">
                        </div>
                        <div class="col-4 col-sm-3 my-2 ps-lg-0">
                            <img src="assets/img/clients/amazon.png" alt="amazon" class="img-fluid">
                        </div>
                        <div class="col-4 col-sm-3 my-2 ps-lg-0">
                            <img src="assets/img/clients/etsy.png" alt="etsy" class="img-fluid">
                        </div>
                        <div class="col-4 col-sm-3 my-2 ps-lg-0">
                            <img src="assets/img/clients/aliexpress.png" alt="aliexpress" class="img-fluid">
                        </div>
                        <div class="col-4 col-sm-3 my-2 ps-lg-0">
                            <img src="assets/img/clients/ebay.png" alt="ebay" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-8 mt-5">
                <div class="hero-img position-relative circle-shape-images">
                    <img src="assets/img/hero-1.png" alt="hero img" class="img-fluid position-relative z-5">
                    <div class="holder">
                        <div id="photo-holder"></div>
                    </div>
                    <div id="preload"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--hero section end-->

<!--begin why choose us section-->
<section class="why-choose-us ptb-120">
    <div class="container">
        <div class="row justify-content-lg-between align-items-center">
            <div class="col-lg-5 col-12">
                <div class="why-choose-content">
                    <div class="icon-box rounded-custom bg-primary shadow-sm d-inline-block">
                        <i class="fas fa-bug fa-2x text-white"></i>
                    </div>
                    <h2>Unieke productimport (Onbeperkt)</h2>
                    <p class="lead">Importeer direct een uniek product met behulp van de URL vanuit Shopify, Amazon, Etsy of AliExpress.</p>
                    <h5><i class="far fa-check-circle text-primary me-2"></i>Producten importeren</h5><br>
                    <h5><i class="far fa-check-circle text-primary me-2"></i>Beschrijvingen verbeteren</h5><br>
                    <h5><i class="far fa-check-circle text-primary me-2"></i>Makkelijk te gebruiken</h5><br>
                    <h5><i class="far fa-check-circle text-primary me-2"></i>Verhoog uw productiviteit</h5><br>
                    <br>
                    <div class="mt-auto">
                        <a href="/register" class="btn btn-primary me-3">Begin gratis proefperiode</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="feature-img-holder mt-4 mt-lg-0 mt-xl-0">
                    <img src="assets/img/screen/widget-11.png" class="img-fluid" alt="feature-image">
                </div>
            </div>
        </div>
    </div>
</section>
<!--why choose us section end-->

<!--begin image feature section-->
<section class="image-feature pt-60 pb-120">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5 col-12 order-lg-1">
                <div class="feature-img-content">
                    <div class="icon-box rounded-custom bg-dark shadow-sm d-inline-block">
                        <i class="fas fa-fingerprint fa-2x text-white"></i>
                    </div>
                    <h2>Massaproductimport (Alle winkels)</h2>
                    <p>Importeer eenvoudig meerdere producten of zelfs volledige winkels met slechts een winkel-URL. Ons geavanceerde hulpmiddel bespaart uren handmatig werk en stroomlijnt uw productinvoerproces. Of u nu inkoopt bij Amazon, Etsy of AliExpress, automatiseer uw dropshipping-operaties en houd uw winkel up-to-date met de nieuwste producten. Profiteer van een kosteneffectieve oplossing die is ontworpen voor Shopify-dropshippers en e-commercegebruikers.</p>
                    <div class="mt-auto">
                        <a href="/register" class="btn btn-primary me-3">Begin gratis proefperiode</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 order-lg-0">
                <div class="feature-img-holder mt-4 mt-lg-0 mt-xl-0">
                    <img src="assets/img/screen/widget-12.png" class="img-fluid" alt="feature-image">
                </div>
            </div>
        </div>
    </div>
</section>
<!--image feature section end-->

<section class="why-choose-us ptb-120">
    <div class="container">
        <div class="row justify-content-lg-between align-items-center">
            <div class="col-lg-5 col-12">
                <div class="why-choose-content">
                    <div class="icon-box rounded-custom bg-primary shadow-sm d-inline-block">
                        <i class="fas fa-bug fa-2x text-white"></i>
                    </div>
                    <h2>Hoe het werkt</h2>
                    <br><br>
                    <h5><i class="far fa-check-circle text-primary me-2"></i>Stap 1: Voer de product-URL in</h5>
                    <p>Plak eenvoudig de product-URL van Shopify, Amazon, Etsy of AliExpress.</p><br>
                    <h5><i class="far fa-check-circle text-primary me-2"></i>Stap 2: Klik op Importeren</h5>
                    <p>Klik op de importknop om het product automatisch aan uw Shopify-winkel toe te voegen.</p>
                    <h5><i class="far fa-check-circle text-primary me-2"></i>Stap 3: Beheer uw winkel</h5>
                    <p>Beheer de geïmporteerde producten en blijf moeiteloos uw winkel uitbreiden.</p>
                    <div class="mt-auto">
                        <a href="/register" class="btn btn-primary me-3">Begin gratis proefperiode</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="feature-img-holder mt-4 mt-lg-0 mt-xl-0">
                    <img src="assets/img/screen/widget-13.png" class="img-fluid" alt="feature-image">
                </div>
            </div>
        </div>
    </div>
</section>

<livewire:plan-list />
<!--faq section start-->
<section class="hd-faq-section pb-80" id="faq">
    <div class="container">
        <div class="row g-5 justify-content-center">
            <div class="col-xl-7 col-lg-8 align-self-end">
                <div class="hd-faq-wrapper">
                    <div class="hd-title">
                        <h2>Vragen? <br> Wij hebben <mark class="bg-transparent p-0 position-relative">de Antwoorden <img src="assets/img/shape/line-shape.png" alt="line shape" class="position-absolute line-shape"></mark></h2>
                    </div>
                    <div class="accordion hd-accordion hd-accordion2 mt-60" id="hd_accordion2">
                        <div class="accordion-item active">
                            <div class="accordion-header">
                                <a href="#hd2_acc1" class="collapsed" data-bs-toggle="collapse">Wat is Ecopy en hoe werkt het?</a>
                            </div>
                            <div class="accordion-collapse collapse show" id="hd2_acc1" data-bs-parent="#hd_accordion2">
                                <div class="accordion-body pt-0">
                                    <p class="mb-0"><b>Ecopy</b> is een krachtige applicatie waarmee je eenvoudig producten van elke Shopify-winkel naar jouw winkel kunt kopiëren met één klik. Je hoeft alleen de URL van het product, de collectie of de winkel in te voeren, en je bespaart een aanzienlijke hoeveelheid tijd, omdat alle titels, afbeeldingen, beschrijvingen, varianten, prijzen, "vergelijk met" prijzen en SEO-informatie in enkele seconden naar jouw winkel worden gekopieerd. Verhoog je efficiëntie in dropshipping en vereenvoudig je e-commerce-operaties met de soepele productimportfuncties van Ecopy. Perfect voor Shopify-gebruikers die snel en eenvoudig hun voorraad willen uitbreiden.</p>
                                </div>
                            </div>
                        </div> 
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <a href="#hd2_acc2" class="" data-bs-toggle="collapse">Hoe lang duurt het om producten te kopiëren?</a>
                            </div>
                            <div class="accordion-collapse collapse show" id="hd2_acc2" data-bs-parent="#hd_accordion2">
                                <div class="accordion-body pt-0">
                                    <p class="mb-0">Je kunt producten in enkele seconden kopiëren en ook aanpassen voordat je ze importeert.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <div class="accordion-header">
                                <a href="#hd2_acc3" class="collapsed" data-bs-toggle="collapse">Hoe importeer ik een product met de URL?</a>
                            </div>
                            <div class="accordion-collapse collapse" id="hd2_acc3" data-bs-parent="#hd_accordion2">
                                <div class="accordion-body pt-0">
                                    <p class="mb-0">Je hoeft alleen de URL van het product in onze tool te plakken en op de importknop te klikken. Het product wordt direct aan je Shopify-winkel toegevoegd.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <a href="#hd2_acc4" class="collapsed" data-bs-toggle="collapse">Kan ik meerdere producten tegelijk importeren?</a>
                            </div>
                            <div class="accordion-collapse collapse" id="hd2_acc4" data-bs-parent="#hd_accordion2">
                                <div class="accordion-body pt-0">
                                    <p class="mb-0">Ja, je kunt de bulkimportfunctie gebruiken om meerdere producten of zelfs hele winkels toe te voegen met de URL van de winkel.</p>
                                </div>
                            </div>
                        </div>
                         <div class="accordion-item">
                            <div class="accordion-header">
                                <a href="#hd2_acc5" class="collapsed" data-bs-toggle="collapse">Kan ik meer dan één plan kopen?</a>
                            </div>
                            <div class="accordion-collapse collapse" id="hd2_acc5" data-bs-parent="#hd_accordion2">
                                <div class="accordion-body pt-0">
                                    <p class="mb-0">Ja.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section> <!--faq section end-->

<!--cat subscribe start-->
<section class="cta-subscribe pt-60 pb-120 ">
    <div class="container">
        <div class="bg-gradient ptb-120 position-relative overflow-hidden rounded-custom">
            <div class="row justify-content-center">
                <div class="col-lg-7 col-md-8">
                    <div class="subscribe-info-wrap text-center position-relative z-2">
                        <div class="section-heading">
                            <h4 class="h5 text-warning">Probeer het nu!</h4>
                            <h2>Begin uw gratis proefperiode van 2 dagen</h2>
                            <!-- <p>Wij kunnen u helpen de website van uw dromen te maken om de inkomsten van uw bedrijf te verhogen.</p> -->
                        </div>
                        <div class="form-block-banner mw-60 m-auto mt-5">
                            <a href="/register" class="btn btn-primary">Begin gratis proefperiode</a>
                            <a href="https://www.youtube.com/watch?v=7_PLuhJNsto" class="text-decoration-none popup-youtube d-inline-flex align-items-center watch-now-btn ms-lg-3 ms-md-3 mt-3 mt-lg-0"> <i
                                    class="fas fa-play"></i> Bekijk de demo </a>
                        </div>
                        <ul class="nav justify-content-center subscribe-feature-list mt-4">
                            <li class="nav-item">
                                <span><i class="far fa-check-circle text-primary me-2"></i>Gratis proefperiode van 2 dagen</span>
                            </li>
                            <li class="nav-item">
                                <span><i class="far fa-check-circle text-primary me-2"></i>Geen creditcard vereist</span>
                            </li>
                            <li class="nav-item">
                                <span><i class="far fa-check-circle text-primary me-2"></i>24/7 ondersteuning</span>
                            </li>
                            <li class="nav-item">
                                <span><i class="far fa-check-circle text-primary me-2"></i>Op elk moment annuleren</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bg-circle rounded-circle circle-shape-3 position-absolute bg-dark-light left-5"></div>
            <div class="bg-circle rounded-circle circle-shape-1 position-absolute bg-warning right-5"></div>
        </div>
    </div>
</section> <!--cat subscribe end-->

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
                            <img src="assets/img/logo.png" alt="logo" class="img-fluid logo-white">
                            <img src="assets/img/logo.png" alt="logo" class="img-fluid logo-color">
                        </div>
                        <p>Ontvang alle promotionele en zakelijke updates.</p>

                        <form class="newsletter-form position-relative d-block d-lg-flex d-md-flex">
                            <input type="text" class="input-newsletter form-control me-2" placeholder="Voer uw e-mail in" name="email" required="" autocomplete="off">
                            <input type="submit" value="Abonneren" data-wait="Even geduld..." class="btn btn-primary mt-3 mt-lg-0 mt-md-0">
                        </form>
                        <div class="ratting-wrap mt-4">
                            <h6 class="mb-0">Algemene beoordeling 9/10</h6>
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
                                <!-- <h3>Hoofdpagina's</h3> -->
                                <ul class="list-unstyled footer-nav-list mb-lg-0">
                                    <li><a href="/" class="text-decoration-none">Home</a></li>
                                    <li><a href="/contact" class="text-decoration-none">Contact</a></li>
                                    <li><a href="/TermsandConditions" class="text-decoration-none">Algemene voorwaarden</a></li>
                                    <li><a href="/privacypolicy" class="text-decoration-none">Privacybeleid</a></li>
                                    <!-- <li><a href="https://weenify.firstpromoter.com/" class="text-decoration-none">Partnerprogramma</a></li> -->
                                    <li><a href="/RefundPolicy" class="text-decoration-none">Terugbetalingsbeleid</a></li>
                                    <li><a href="/#pricing" class="text-decoration-none">Prijzen</a></li>
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
                        <p class="mb-lg-0 mb-md-0">&copy; 2024 Ecopy Alle rechten voorbehouden. <a href="https://weenify.io/" class="text-decoration-none">Ecopy</a></p>
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
@livewireScripts

<script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
<script src="{{ asset('assets/js/app.js') }}"></script>
<script src="assets/js/vendors/bootstrap.bundle.min.js"></script>
<script src="assets/js/vendors/swiper-bundle.min.js"></script>
<script src="assets/js/vendors/parallax.min.js"></script>
<script src="assets/js/vendors/jquery.magnific-popup.min.js"></script>
<script src="assets/js/vendors/aos.js"></script>
<script src="assets/js/vendors/massonry.min.js"></script>
<script src="https://codepen.io/steveg3003/pen/zBVakw.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js"></script>

</body>
</html>
