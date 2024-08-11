<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>" data-bs-theme="light">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="author" content="Touzani Yassine" />
    <title><?php echo e(config('app.name')); ?> - Copier des produits vers Shopify | Importateur de produits</title>
    <meta name="description" content="Ecopy.app - Copier des produits de shopify, amazon, etsy vers votre boutique shopify en un clic" />
    <meta name="keywords" content="Ecopy,ecopy.app,poky,Copier des produits vers Shopify,Importateur de produits shopify" />
    <meta property="og:description" content="Ecopy,ecopy.app,poky,Copier des produits vers Shopify,Importateur de produits shopify" />
    <meta property="og:url" content="https://ecopy.app/" />
    <meta property="og:site_name" content="Copier des produits vers Shopify, WooCommerce et Wix stores, Importateur de produits shopify" />

    <!-- Jeton CSRF -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">


    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/favicon.png" title="Favicon" sizes="16x16" />
    <!-- bootstrap 5 -->
    <link rel="stylesheet" href="assets/css/lib/bootstrap.min.css">
    <!-- ====== famille de polices ====== -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <!--build:css-->
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- endbuild -->
    <!-- custom css start-->
    <link rel="stylesheet" href="assets/css/custom.css">
    <?php if(Request::is('email/verify')): ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/css/dashlite.css?ver=3.2.0')); ?>" type="text/css">
    <?php endif; ?>
    <!-- custom css end-->
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

    <!-- Balise Google (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-234R6GX9KR"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'G-234R6GX9KR');
    </script>
    <!-- Balise Google (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-992215432"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-992215432');
    </script>
    <!-- Code de suivi Hotjar pour le site 5058947 (nom manquant) -->
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

    <!-- début du wrapper de contenu principal-->
    <div class="main-wrapper">

        <!-- début de la section d'en-tête-->
        <!-- début de l'en-tête-->
        <script> configObj = {"text":"\nLancez votre boutique sur Shopify pour seulement 1 $!","bannerURL":"https://ecopy.app/shopify","selectedBackgroundColor":"#0037b8","selectedTextColor":"#ffffff","bannerHeight":"48px","fontSize":"16px"};function createBanner(obj, pageSimulator) {        var swBannerLink = obj.bannerURL;        var swBannerTarget = "_blank";        var swBannerText = obj.text;        var body = document.body;        var swBanner = document.createElement('a');        var centerDiv = document.createElement('div');        var text = document.createElement('span');        swBanner.href = swBannerLink;        swBanner.target = swBannerTarget;        swBanner.style.display = "flex";        swBanner.style.justifyContent = "center";        swBanner.style.alignItems = "center";        swBanner.style.width = "100%";        swBanner.style.minHeight = "48px";        swBanner.style.maxHeight = "72px";        swBanner.style.paddingTop = "8px";        swBanner.style.paddingBottom = "8px";        swBanner.style.lineHeight = "18px";        swBanner.style.textAlign = "center";        swBanner.style.textDecoration = "none";        swBanner.style.height = obj.bannerHeight;        swBanner.style.fontSize = obj.fontSize;        text.innerHTML = swBannerText;        swBanner.style.backgroundColor = obj.selectedBackgroundColor;        swBanner.style.color = obj.selectedTextColor;        swBanner.id = 'sw-banner';        swBanner.classList.add('sw-banner');        centerDiv.classList.add('center');        centerDiv.append(text);        swBanner.append(centerDiv);        if(!pageSimulator) {          body.insertBefore(swBanner, body.firstChild);        } else {          pageSimulator.insertBefore(swBanner, pageSimulator.firstChild);        }    };document.addEventListener("DOMContentLoaded", function() { createBanner(configObj, null); });</script>      
        <header class="main-header position-absolute w-100">
            <nav class="navbar navbar-expand-xl navbar-dark z-10">
                <div class="container d-flex align-items-center justify-content-lg-between position-relative">
                <?php if(Request::is('/') || Request::is('fr')): ?>
                    <a href="/" class="navbar-brand d-flex align-items-center mb-md-0 text-decoration-none">
                        <img src="assets/img/logo.png" alt="logo" class="img-fluid logo-white" />
                        <img src="assets/img/logo.png" alt="logo" class="img-fluid logo-color" />
                    </a>
                <?php else: ?> 
                <?php endif; ?>
                    <a class="navbar-toggler position-absolute right-0 border-0" href="#offcanvasWithBackdrop">
                        <i class="flaticon-menu" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"
                     data-bs-toggle="offcanvas" role="button"></i>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse navbar-collapse justify-content-center">
                        <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <?php if(Request::is('/') || Request::is('fr')): ?>
                            <li><a href="/" class="nav-link"><?php echo e(__('Accueil')); ?></a></li>
                            <li><a href="#faq" class="nav-link"><?php echo e(__('FAQ')); ?></a></li>
                            <li><a href="#pricing" class="nav-link"><?php echo e(__('Tarification')); ?></a></li>
                            <li><a href="/contact" class="nav-link"><?php echo e(__('Contact')); ?></a></li>
                        <?php endif; ?>
                </ul>
                </div>
                <?php if(auth()->guard()->guest()): ?>

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
                                                    <?php echo e(__('Tableau de bord')); ?>

                                                </a>
                                                <a class="dropdown-item" href="<?php echo e(route('account.password')); ?>">
                                                    <span class="dropdown-item-icon">
                                                    <i class="fas fa-unlock-alt"></i>
                                                    </span>
                                                    <?php echo e(__('Mot de passe')); ?>

                                                </a>
                                                <?php if(\Spatie\Permission\PermissionServiceProvider::bladeMethodWrapper('hasRole', 'admin')): ?>
                                                <a class="dropdown-item" target="__blank" href="<?php echo e(route('admin.index')); ?>">
                                                    <span class="dropdown-item-icon">
                                                    <i class="fas fa-tachometer-alt"></i>
                                                    </span>
                                                    <?php echo e(__('Panneau d\'administration')); ?>

                                                </a>
                                                <?php endif; ?>
                                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                    <span class="dropdown-item-icon">
                                                    <i class="fas fa-power-off"></i>
                                                    </span>
                                                    <?php echo e(__('Déconnexion')); ?>

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

                <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <li class="nav-item dropdown">
                        <?php if(Request::is('/')): ?>
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">ENGLISH</a>
                            <?php endif; ?>
                            <?php if(Request::is('es')): ?>
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">SPANISH</a>
                            <?php endif; ?>
                            <?php if(Request::is('nl')): ?>
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">DUTCH</a>
                            <?php endif; ?>
                            <?php if(Request::is('fr')): ?>
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">FRENCH</a>
                            <?php endif; ?>
                            <?php if(Request::is('pt')): ?>
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">PORTUGUESE</a>
                            <?php endif; ?>
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
                            <div class="tt-theme-light" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Clair"><i class="flaticon-sun-1 fs-lg"></i></div>
                            <div class="tt-theme-dark" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Sombre"><i class="flaticon-moon-1 fs-lg"></i></div>
                        </a> 
                        <a href="/login" class="btn btn-link text-decoration-none me-2">Connexion</a>
                        <a href="/register" class="btn btn-primary">Commencer</a>
                    </div>
                    <?php endif; ?>

                    
                </div>
            </nav>
            <!-- début du menu offcanvas -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasWithBackdrop">
                <div class="offcanvas-header d-flex align-items-center mt-4">
                    <a href="/" class="d-flex align-items-center mb-md-0 text-decoration-none">
                        <img src="saas/img/logo.png" alt="logo" class="img-fluid ps-2" />
                    </a>
                    <button type="button" class="close-btn text-danger" data-bs-dismiss="offcanvas" aria-label="Fermer">
                        <i class="flaticon-cancel"></i>
                    </button>
                </div>
                <div class="offcanvas-body z-10">

                    <?php if(auth()->guard()->guest()): ?>
                    <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <li class="nav-item dropdown">
                           
                            <li><a href="/" class="nav-link"><?php echo e(__('Accueil')); ?></a></li>
                            <li><a href="#faq" class="nav-link"><?php echo e(__('FAQ')); ?></a></li>
                            <li><a href="#pricing" class="nav-link"><?php echo e(__('Tarification')); ?></a></li>
                            <li><a href="/contact" class="nav-link"><?php echo e(__('Contact')); ?></a></li>
                    </ul>
                    <div class="action-btns mt-4 ps-3">
                        <a href="/login" class="btn btn-outline-primary me-2">Connexion</a>
                        <a href="/register" class="btn btn-primary">Commencer</a>
                    </div>
                    <?php else: ?>

                    <ul class="nav col-12 col-md-auto justify-content-center main-menu">
                        <li class="nav-item dropdown">
                           

                            <li><a href="/dashboard" class="nav-link"><?php echo e(__('Tableau de bord')); ?></a></li>
                            <li><a href="<?php echo e(route('account.password')); ?>" class="nav-link"><?php echo e(__('Mot de passe')); ?></a></li>
                            <li>  
                                <a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                            <span class="dropdown-item-icon">
                            <i class="fas fa-power-off"></i>
                            </span>
                            <?php echo e(__('Déconnexion')); ?>

                        </a>
                        <form method="POST" id="logout-form" action="<?php echo e(route('logout')); ?>">
                            <?php echo csrf_field(); ?>
                        </form>
                            <li><a href="/contact" class="nav-link"><?php echo e(__('Contact')); ?></a></li>
                    </ul>
                    <!-- début -->
                    <?php endif; ?>
                    <!-- fin -->

                </div>
            </div>
            <!-- fin du menu offcanvas -->
        </header>
<!-- début de l'en-tête -->
<!-- fin de l'en-tête -->
<!--section héroïque début-->
<section class="hero-section ptb-120 text-white bg-gradient" style="background: url('assets/img/hero-dot-bg.png')no-repeat center right">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-md-10">
                <div class="hero-content-wrap mt-5 mt-lg-0 mt-xl-0">
                    <h1 class="fw-bold display-5">Importez des produits sur Shopify en un clic</h1>
                    <p class="lead">Économisez du temps et de l'argent avec Ecopy. Importez facilement des produits depuis Amazon, Etsy ou AliExpress en utilisant simplement une URL.</p>
                    <div class="action-btn mt-5 align-items-center d-block d-sm-flex d-lg-flex d-md-flex">
                        <a href="/register" class="btn btn-primary me-3">Commencez l'essai gratuit</a>
                        <a href="https://www.youtube.com/watch?v=7_PLuhJNsto" class="text-decoration-none popup-youtube d-inline-flex align-items-center watch-now-btn mt-3 mt-lg-0 mt-md-0"> <i
                                class="fas fa-play"></i> Regarder la démo </a>
                    </div>
                    <div class="row justify-content-lg-start mt-60">
                        <h6 class="text-white-70 mb-2">S'APPLIQUE À TOUS LES VENDEURS</h6>
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
<!--section héroïque fin-->


<!--début section pourquoi nous choisir-->
<section class="why-choose-us ptb-120">
    <div class="container">
        <div class="row justify-content-lg-between align-items-center">
            <div class="col-lg-5 col-12">
                <div class="why-choose-content">
                    <div class="icon-box rounded-custom bg-primary shadow-sm d-inline-block">
                        <i class="fas fa-bug fa-2x text-white"></i>
                    </div>
                    <h2>Importation de produit unique (Illimité)</h2>
                    <p class="lead">Importez instantanément un produit unique en utilisant son URL depuis Shopify, Amazon, Etsy ou AliExpress.</p>
                    <h5><i class="far fa-check-circle text-primary me-2"></i>Importer des produits</h5><br>
                    <h5><i class="far fa-check-circle text-primary me-2"></i>Améliorer les descriptions</h5><br>
                    <h5><i class="far fa-check-circle text-primary me-2"></i>Facile à utiliser</h5><br>
                    <h5><i class="far fa-check-circle text-primary me-2"></i>Boostez votre productivité</h5><br>
                    <br>
                    <div class="mt-auto">
                        <a href="/register" class="btn btn-primary me-3">Commencez l'essai gratuit</a>
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
<!--section pourquoi nous choisir fin-->

<!--début section caractéristique de l'image-->
<section class="image-feature pt-60 pb-120">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-5 col-12 order-lg-1">
                <div class="feature-img-content">
                    <div class="icon-box rounded-custom bg-dark shadow-sm d-inline-block">
                        <i class="fas fa-fingerprint fa-2x text-white"></i>
                    </div>
                    <h2>Importer des produits en masse (Tous les magasins)</h2>
                    <p>Importez plusieurs produits ou même des magasins entiers facilement en utilisant simplement une URL de magasin. Notre outil avancé vous permet d'économiser des heures de travail manuel et de rationaliser votre processus d'entrée de produits. Que vous vous approvisionniez sur Amazon, Etsy ou AliExpress, automatisez vos opérations de dropshipping et maintenez votre magasin à jour avec les derniers produits. Profitez d'une solution rentable conçue pour les dropshippers Shopify et les utilisateurs de commerce électronique.</p>
                    <div class="mt-auto">
                        <a href="/register" class="btn btn-primary me-3">Commencez l'essai gratuit</a>
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
<!--section caractéristique de l'image fin-->

<section class="why-choose-us ptb-120">
    <div class="container">
        <div class="row justify-content-lg-between align-items-center">
            <div class="col-lg-5 col-12">
                <div class="why-choose-content">
                    <div class="icon-box rounded-custom bg-primary shadow-sm d-inline-block">
                        <i class="fas fa-bug fa-2x text-white"></i>
                    </div>
                    <h2>Comment ça marche</h2>
                    <br><br>
                    <h5><i class="far fa-check-circle text-primary me-2"></i>Étape 1 : Entrez l'URL du produit</h5>
                    <p>Collez simplement l'URL du produit depuis Shopify, Amazon, Etsy ou AliExpress.</p><br>
                    <h5><i class="far fa-check-circle text-primary me-2"></i>Étape 2 : Cliquez sur Importer</h5>
                    <p>Cliquez sur le bouton d'importation pour ajouter automatiquement le produit à votre magasin Shopify.</p>
                    <h5><i class="far fa-check-circle text-primary me-2"></i>Étape 3 : Gérez votre magasin</h5>
                    <p>Gérez les produits importés et continuez à développer votre magasin sans effort.</p>
                    <div class="mt-auto">
                        <a href="/register" class="btn btn-primary me-3">Commencez l'essai gratuit</a>
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

<?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('plan-list', []);

$__html = app('livewire')->mount($__name, $__params, 'fsuWjZL', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
<!--faq section start-->
<section class="hd-faq-section pb-80" id="faq">
    <div class="container">
        <div class="row g-5 justify-content-center">
            <div class="col-xl-7 col-lg-8 align-self-end">
                <div class="hd-faq-wrapper">
                    <div class="hd-title">
                        <h2>Des Questions ? <br> Nous avons <mark class="bg-transparent p-0 position-relative">les Réponses <img src="assets/img/shape/line-shape.png" alt="line shape" class="position-absolute line-shape"></mark></h2>
                    </div>
                    <div class="accordion hd-accordion hd-accordion2 mt-60" id="hd_accordion2">
                        <div class="accordion-item active">
                            <div class="accordion-header">
                                <a href="#hd2_acc1" class="collapsed" data-bs-toggle="collapse">Qu'est-ce qu'Ecopy et comment ça fonctionne ?</a>
                            </div>
                            <div class="accordion-collapse collapse show" id="hd2_acc1" data-bs-parent="#hd_accordion2">
                                <div class="accordion-body pt-0">
                                    <p class="mb-0"><b>Ecopy</b> est une application puissante qui vous permet de copier facilement des produits depuis n'importe quelle boutique Shopify vers la vôtre en un seul clic. Il vous suffit de saisir l'URL du produit, de la collection ou de la boutique souhaitée, et de gagner un temps considérable, car tous les titres, images, descriptions, variantes, prix, prix "comparé à" et informations SEO sont copiés dans votre boutique en quelques secondes. Améliorez votre efficacité en dropshipping et simplifiez vos opérations e-commerce avec les fonctionnalités d'importation de produits fluides d'Ecopy. Parfait pour les utilisateurs de Shopify cherchant à développer rapidement et facilement leur inventaire.</p>
                                </div>
                            </div>
                        </div> 
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <a href="#hd2_acc2" class="" data-bs-toggle="collapse">Combien de temps faut-il pour copier des produits ?</a>
                            </div>
                            <div class="accordion-collapse collapse show" id="hd2_acc2" data-bs-parent="#hd_accordion2">
                                <div class="accordion-body pt-0">
                                    <p class="mb-0">Vous pouvez copier des produits en quelques secondes et également les modifier avant l'importation.</p>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <div class="accordion-header">
                                <a href="#hd2_acc3" class="collapsed" data-bs-toggle="collapse">Comment importer un produit en utilisant son URL ?</a>
                            </div>
                            <div class="accordion-collapse collapse" id="hd2_acc3" data-bs-parent="#hd_accordion2">
                                <div class="accordion-body pt-0">
                                    <p class="mb-0">Il vous suffit de coller l'URL du produit dans notre outil et de cliquer sur le bouton d'importation. Le produit sera ajouté instantanément à votre boutique Shopify.</p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <div class="accordion-header">
                                <a href="#hd2_acc4" class="collapsed" data-bs-toggle="collapse">Puis-je importer plusieurs produits à la fois ?</a>
                            </div>
                            <div class="accordion-collapse collapse" id="hd2_acc4" data-bs-parent="#hd_accordion2">
                                <div class="accordion-body pt-0">
                                    <p class="mb-0">Oui, vous pouvez utiliser la fonction d'importation en masse pour ajouter plusieurs produits ou des boutiques entières en utilisant l'URL de la boutique.</p>
                                </div>
                            </div>
                        </div>
                         <div class="accordion-item">
                            <div class="accordion-header">
                                <a href="#hd2_acc5" class="collapsed" data-bs-toggle="collapse">Puis-je acheter plus qu'un plan ?</a>
                            </div>
                            <div class="accordion-collapse collapse" id="hd2_acc5" data-bs-parent="#hd_accordion2">
                                <div class="accordion-body pt-0">
                                    <p class="mb-0">Oui.</p>
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
                            <h4 class="h5 text-warning">Essayez maintenant !</h4>
                            <h2>Commencez votre essai gratuit de 2 jours</h2>
                            <!-- <p>Nous pouvons vous aider à créer le site de vos rêves pour améliorer les revenus de votre entreprise.</p> -->
                        </div>
                        <div class="form-block-banner mw-60 m-auto mt-5">
                            <a href="/register" class="btn btn-primary">Commencez l'essai gratuit</a>
                            <a href="https://www.youtube.com/watch?v=7_PLuhJNsto" class="text-decoration-none popup-youtube d-inline-flex align-items-center watch-now-btn ms-lg-3 ms-md-3 mt-3 mt-lg-0"> <i
                                    class="fas fa-play"></i> Regarder la démo </a>
                        </div>
                        <ul class="nav justify-content-center subscribe-feature-list mt-4">
                            <li class="nav-item">
                                <span><i class="far fa-check-circle text-primary me-2"></i>Essai gratuit de 7 jours</span>
                            </li>
                            <li class="nav-item">
                                <span><i class="far fa-check-circle text-primary me-2"></i>Aucune carte de crédit requise</span>
                            </li>
                            <li class="nav-item">
                                <span><i class="far fa-check-circle text-primary me-2"></i>Support 24/7</span>
                            </li>
                            <li class="nav-item">
                                <span><i class="far fa-check-circle text-primary me-2"></i>Annulation à tout moment</span>
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
                        <p>Recevez toutes les mises à jour promotionnelles et commerciales.</p>

                        <form class="newsletter-form position-relative d-block d-lg-flex d-md-flex">
                            <input type="text" class="input-newsletter form-control me-2" placeholder="Entrez votre email" name="email" required="" autocomplete="off">
                            <input type="submit" value="S'abonner" data-wait="Veuillez patienter..." class="btn btn-primary mt-3 mt-lg-0 mt-md-0">
                        </form>
                        <div class="ratting-wrap mt-4">
                            <h6 class="mb-0">Note globale 9/10</h6>
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
                                <!-- <h3>Pages Principales</h3> -->
                                <ul class="list-unstyled footer-nav-list mb-lg-0">
                                    <li><a href="/" class="text-decoration-none">Accueil</a></li>
                                    <li><a href="/contact" class="text-decoration-none">Contact</a></li>
                                    <li><a href="/TermsandConditions" class="text-decoration-none">Conditions générales</a></li>
                                    <li><a href="/privacypolicy" class="text-decoration-none">Politique de confidentialité</a></li>
                                    <!-- <li><a href="https://weenify.firstpromoter.com/" class="text-decoration-none">Programme d'affiliation</a></li> -->
                                    <li><a href="/RefundPolicy" class="text-decoration-none">Politique de remboursement</a></li>
                                    <li><a href="/#pricing" class="text-decoration-none">Tarification</a></li>
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
                        <p class="mb-lg-0 mb-md-0">&copy; 2024 Ecopy Tous droits réservés. <a href="https://weenify.io/" class="text-decoration-none">Ecopy</a></p>
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
<?php endif; ?>
<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>


<script src="assets/js/vendors/jquery-3.6.0.min.js"></script>
<script src="<?php echo e(asset('assets/js/app.js')); ?>"></script>
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
<?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/welcomefr.blade.php ENDPATH**/ ?>