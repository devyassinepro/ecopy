<?php $__env->startSection('title', 'Checkout Plans'); ?>
<?php $__env->startSection('content'); ?>
<nav class="navbar navbar-expand-md">
  <div class="container-fluid">
    <a class="navbar-brand d-md-none" href="#">
    <img  src="<?php echo e(asset('images/logo-dark.png')); ?>" >
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <a class="navbar-brand d-none d-md-block" href="#">
        <img  src="<?php echo e(asset('images/logo-dark.png')); ?>" >
        </a>
      </ul>
    </div>

  </div>
</nav>
    <div class="card">
        <div class="card-body">
            <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('plan-list', []);

$__html = app('livewire')->mount($__name, $__params, 'XOb5eYS', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.accountsubscribe', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/ecopy.app/resources/views/subscriptions/plans.blade.php ENDPATH**/ ?>