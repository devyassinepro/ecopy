<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?> <?php echo $__env->yieldContent('title'); ?></title>

        <!-- Web Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Components Vendor Styles -->
    <link rel="stylesheet" href="<?php echo e(asset('saas/admin/vendor/font-awesome/css/all.min.css')); ?>">

    <!-- Theme Styles -->
	<link rel="stylesheet" href="<?php echo e(asset('saas/admin/css/theme.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('saas/css/toastr.min.css')); ?>">
	<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

	
    <!-- Custom Charts -->
    <style>
        .js-doughnut-chart {
            width: 70px !important;
            height: 70px !important;
        }
		.avatar{
			width:50px;
		}
		.flex-container {
			display: flex;
			flex-wrap: wrap;
		}
		.flex-container a{
			margin-left: auto 
		}
    </style>
	<?php echo $__env->yieldPushContent('styles'); ?>
        <!-- Scripts -->
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
fbq('init', '691407819506168');
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=691407819506168&ev=PageView&noscript=1"
/></noscript>
<!-- End Meta Pixel Code -->
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-M19EWRS3EN"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-M19EWRS3EN');
</script>
    </head>
    <body>
        <!-- Header (Topbar) -->
		<header class="u-header">
			<div class="u-header-left">
				<a class="u-header-logo" href="<?php echo e(route('admin.index')); ?>">
					<img class="u-logo-desktop" src="<?php echo e(asset('saas/img/logo.png')); ?>" width="160" alt="<?php echo e(__('Saasify admin')); ?>">
					<img class="img-fluid u-logo-mobile" src="<?php echo e(asset('saas/img/logo.png')); ?>" width="50" alt="<?php echo e(__('Saasify admin')); ?>">
				</a>
			</div>

			<div class="u-header-middle">
				<a class="js-sidebar-invoker u-sidebar-invoker" href="#!"
				   data-is-close-all-except-this="true"
				   data-target="#sidebar">
					<i class="fa fa-bars u-sidebar-invoker__icon--open"></i>
					<i class="fa fa-times u-sidebar-invoker__icon--close"></i>
				</a>

				<div class="u-header-search"
				     data-search-mobile-invoker="#headerSearchMobileInvoker"
				     data-search-target="#headerSearch">
					<a id="headerSearchMobileInvoker" class="btn btn-link input-group-prepend u-header-search__mobile-invoker" href="#!">
						<i class="fa fa-search"></i>
					</a>

					<div id="headerSearch" class="u-header-search-form">
						<form>
							<div class="input-group">
								<button class="btn-link input-group-prepend u-header-search__btn" type="submit">
									<i class="fa fa-search"></i>
								</button>
								<input class="form-control u-header-search__field" type="search" placeholder="Type to search…">
							</div>
						</form>
					</div>
				</div>
			</div>

			<div class="u-header-right">


		  	<!-- Notifications -->
				<div class="mr-4 dropdown">
				  <a class="link-muted" href="#!" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
				    <span class="h3">
			    		<i class="far fa-bell"></i>
				    </span>
				    <span class="u-indicator u-indicator-top-right u-indicator--xxs bg-info"></span>
				  </a>
				</div>
		  	<!-- End Notifications -->

		  	<!-- User Profile -->
				<div class="ml-2 dropdown">
				  <a class="link-muted d-flex align-items-center" href="#!" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false" data-toggle="dropdown">
				    <img class="mr-2 u-avatar--xs img-fluid rounded-circle" src="<?php echo e(Auth::user()->profile_photo_url); ?>" alt="User Profile">
						<span class="text-dark d-none d-sm-inline-block">
							<?php echo e(split_name(Auth::user()->name)[0]); ?> <small class="ml-1 fa fa-angle-down text-muted"></small>
						</span>
				  </a>

				  <div class="py-0 mt-3 border-0 dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink" style="width: 260px;">
				  	<div class="card">
						<div class="card-body">
							<ul class="mb-0 list-unstyled">
								<li class="mb-4">
									<a class="d-flex align-items-center link-dark" href="<?php echo e(url('user/profile')); ?>">
										<span class="mb-0 h3"><i class="mr-3 far fa-user-circle text-muted"></i></span> <?php echo e(__('Profile')); ?>

									</a>
								</li>
								<li>
									<a class="d-flex align-items-center link-dark" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										<span class="mb-0 h3"><i class="mr-3 far fa-share-square text-muted"></i></span>
											<?php echo e(__('Logout')); ?>

									</a>
										<form method="POST" id="logout-form" action="<?php echo e(route('logout')); ?>">
											<?php echo csrf_field(); ?>
										</form>
								</li>
							</ul>
						</div>
				  	</div>
				  </div>
				</div>
		  	<!-- End User Profile -->
			</div>
		</header>
		<!-- End Header (Topbar) -->

		<main class="u-main" role="main">
			<!-- Sidebar -->
			<?php echo $__env->make('partials.admin.aside', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			<!-- End Sidebar -->

			<div class="u-content">
				<?php echo $__env->make('partials.account.login_as', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<?php echo $__env->yieldContent('content'); ?>

				<!-- Footer -->
				<?php echo $__env->make('partials.admin.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
				<!-- End Footer -->
			</div>
		</main>

		<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-alert::components.scripts','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-alert::scripts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

	<script src="<?php echo e(asset('js/app.js')); ?>"></script>
  <script src="<?php echo e(asset('assets/vendor/js-cookie/js.cookie.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/vendor/lavalamp/js/jquery.lavalamp.min.js')); ?>"></script>
        <!-- Global Vendor -->
		<script src="<?php echo e(asset('saas/admin/vendor/jquery/dist/jquery.min.js')); ?>"></script>
		<script src="<?php echo e(asset('saas/admin/vendor/popper.js/dist/umd/popper.min.js')); ?>"></script>
		<script src="<?php echo e(asset('saas/admin/vendor/bootstrap/bootstrap.min.js')); ?>"></script>

		<!-- Plugins -->
		<script src="<?php echo e(asset('saas/admin/vendor/chart.js/dist/Chart.min.js')); ?>"></script>

		<!-- Initialization  -->
		<script src="<?php echo e(asset('saas/admin/js/sidebar-nav.js')); ?>"></script>
		<script src="<?php echo e(asset('saas/admin/js/main.js')); ?>"></script>

		 <!--End of Tawk.to Script-->
		 <script src="<?php echo e(asset('assets/js/bundle.js?ver=3.2.0')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/scripts.js?ver=3.2.0')); ?>"></script>
		<?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'livewire-alert::components.scripts','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-alert::scripts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
		<?php echo $__env->yieldPushContent('scripts'); ?>
    </body>
</html><?php /**PATH /Users/touzani/Desktop/ecopy/ecopy.app/resources/views/layouts/admin.blade.php ENDPATH**/ ?>