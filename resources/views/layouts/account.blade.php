<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
  <title>{{ config('app.name', 'Ecopy') }} - Copy products for shopify | Product Importer</title>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- Favicon -->
  <link rel="shortcut icon" href="{{ asset('saas/img/favicon.png') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;display=swap" rel="stylesheet">
  <!-- Styles -->
   <!-- CSS font-awesome Plugins -->
   <link rel="stylesheet" href="{{ asset('saas/admin/vendor/font-awesome/css/all.min.css')}}">
   <link rel="stylesheet" href="{{ asset('saas/vendor/select2/dist/css/select2.min.css') }}">

  <!-- CSS Front Template -->
  <link rel="stylesheet" href="{{ asset('assets/css/dashlite.css?ver=3.2.0') }}" type="text/css">

  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

  <style>
  .limited-text {
    max-height: 70px;
    overflow: hidden;
}


.center-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 10vh;
    margin-top: 25px;
    margin-top: 25px;


}

.center-video {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 40vh;
}
.center-container img {
    width: 350px;
    height: auto;
}

.read-more {
    display: none;
    color: #007BFF;
    cursor: pointer;
}

.read-more.show {
    display: block;
}
    .colored-toast.swal2-icon-success {
  background-color: #a5dc86 !important;
}

.colored-toast.swal2-icon-error {
  background-color: #f27474 !important;
}

.colored-toast.swal2-icon-warning {
  background-color: #f8bb86 !important;
}

.colored-toast.swal2-icon-info {
  background-color: #3fc3ee !important;
}

.colored-toast.swal2-icon-question {
  background-color: #87adbd !important;
}

.colored-toast .swal2-title {
  color: white;
}

.colored-toast .swal2-close {
  color: white;
}

.colored-toast .swal2-html-container {
  color: white;
}

</style>
  @vite(['resources/css/app.css','resources/js/app.js'])

<!-- Scripts -->
  @stack('scripts')
  @stack('styles')
  @livewireStyles

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
<!-- Hotjar Tracking Code for Site 5058947 (nom manquant) -->
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
<!-- Meta Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1331014271011060');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1331014271011060&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
</head>

<body>

@if(Route::is('subscriptions'))

<!-- Sidenav -->

<nav class="navbar navbar-expand-md">
<div class="container-fluid">
  <a class="navbar-brand d-md-none" href="#">
  <img  src="{{ asset('images/logo-dark.png') }}" >
  </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mx-auto">
      <a class="navbar-brand d-none d-md-block" href="#">
      <img  src="{{ asset('images/logo-dark.png') }}" >
      
      </a>
    </ul>
  </div>

</div>
</nav>
<div class="nk-app-root">
      <!-- main @s -->
      <div class="nk-main ">

          <!-- wrap @s -->
          <div class="nk-wrap ">

              <!-- main header @s -->
              <!-- main header @e -->
                 <!-- Page content -->
                 {{ $slot }}
              <!-- footer @s -->
              <!-- footer @e -->
          </div>
          <!-- wrap @e -->
      </div>
      <!-- main @e -->

@else 

  <!-- Sidenav -->
  @include('partials.read-only')
  @include('partials.account.login_as')
  
  <div class="nk-app-root">
        <!-- main @s -->
        <div class="nk-main ">
        <livewire:account.navigator />
            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                @include('partials.account.topnav')
                <!-- main header @e -->
                   <!-- Page content -->

                   <br> <br>
                   {{ $slot }}



   <!-- footer @s -->
               
                <!-- footer @e -->
                </div>
            <!-- wrap @e -->
        </div>
        <!-- main @e -->

        @endif
    </div>
    @livewireScripts
          <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
          <x-livewire-alert::scripts />
          <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
            <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
            <script src="{{ asset('assets/vendor/lavalamp/js/jquery.lavalamp.min.js') }}"></script>
            <script src="{{ asset('assets/js/argon.mine209.js?v=1.0.0') }}"></script>
             <!-- Optional JS -->
             <!-- Argon JS -->
             <!--Start of Tawk.to Script-->

              <!--Start of Tawk.to Script-->
            @if (config('saas.demo_mode'))
            <script type="text/javascript">
              var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
              (function(){
              var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
              s1.async=true;
              s1.src='https://embed.tawk.to/5fbb1a42a1d54c18d8ec4a68/default';
              s1.charset='UTF-8';
              s1.setAttribute('crossorigin','*');
              s0.parentNode.insertBefore(s1,s0);
              })();
              </script>
              @endif
             <!--End of Tawk.to Script-->
            <script src="{{ asset('assets/js/bundle.js?ver=3.2.0') }}"></script>
            <script src="{{ asset('assets/js/scripts.js?ver=3.2.0') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
                    <!-- sweet alert  -->
            <script>

            window.addEventListener('show-delete-confirmation', event =>{
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Delete"
                    }).then((result) => {
                    if (result.isConfirmed) {
                      Livewire.emit('deleteConfirmed')
                    }
                    });
            });

            window.addEventListener('NicheDeleted', event =>{
                  Swal.fire({
                      title: "Deleted!",
                      text: "Your Niche has been deleted.",
                      icon: "success"
                    });
            });
        Livewire.on('reload-page', function () {
            location.reload();
        });
          
    
</script>

</body>
</html>
