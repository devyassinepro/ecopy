<?php $__env->startSection('title', '| Users'); ?>

<?php $__env->startSection('content'); ?>
    <div class="u-body">
        <h1 class="h2 font-weight-semibold mb-4"><?php echo e(__('User Administration')); ?></h1>

        <div class="card mb-4">

            <div class="card-body">
                <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('show-users', []);

$__html = app('livewire')->mount($__name, $__params, 'VBvNT64', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/users/index.blade.php ENDPATH**/ ?>