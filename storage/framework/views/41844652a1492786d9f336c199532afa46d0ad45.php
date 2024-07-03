
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- Title -->
  <title><?php echo e(config('app.name', 'Ecopy')); ?></title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?php echo e(asset('saas/img/favicon.png')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('assets/vendor/nucleo/css/nucleo.css')); ?>" type="text/css">
  <!-- Font -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600&amp;display=swap" rel="stylesheet">
  <!-- Styles -->
  <link rel="stylesheet" href="<?php echo e(asset('css/weenifyapp.css?v=').time()); ?>">
   <!-- CSS font-awesome Plugins -->
   <link rel="stylesheet" href="<?php echo e(asset('saas/admin/vendor/font-awesome/css/all.min.css')); ?>">
   <link rel="stylesheet" href="<?php echo e(asset('saas/vendor/select2/dist/css/select2.min.css')); ?>">

  <!-- CSS Front Template -->
  <!-- <link rel="stylesheet" href="<?php echo e(asset('assets/css/argon.mine209.css?v=1.0.0')); ?>" type="text/css"> -->
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/theme.css?ver=3.2.0')); ?>" type="text/css">
  <link rel="stylesheet" href="<?php echo e(asset('assets/css/dashlite.css?ver=3.2.0')); ?>" type="text/css">

  <link rel="stylesheet" href="<?php echo e(asset('assets/css/custom.css')); ?>" type="text/css">

  <link rel="stylesheet" href="assets/css/main.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway|Cabin:700" rel="stylesheet">

    <!-- Font Favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('saas/img/favicon.png')); ?>">
    <link rel="icon" href="assets/img/favicon.png" type="image/png" sizes="16x16">


  <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

  <?php echo $__env->yieldPushContent('styles'); ?>

</head>
<body>
    

        <?php echo $__env->yieldContent('content'); ?>


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
    <!-- Optional JS -->
    <!-- Argon JS -->
    <script src="<?php echo e(asset('assets/js/argon.mine209.js?v=1.0.0')); ?>"></script>
    <?php echo $__env->yieldPushContent('scripts'); ?>
    <!--Start of Tawk.to Script-->
  <?php if(config('saas.demo_mode')): ?>
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
    <?php endif; ?>
    <!--End of Tawk.to Script-->
    <script src="<?php echo e(asset('assets/js/bundle.js?ver=3.2.0')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/scripts.js?ver=3.2.0')); ?>"></script>
</body>
</html>



<?php /**PATH /Users/touzani/Desktop/ecopy/ecopy.app/resources/views/layouts/accountsubscribe.blade.php ENDPATH**/ ?>