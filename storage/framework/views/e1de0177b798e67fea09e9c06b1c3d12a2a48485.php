<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('beautymail::templates.sunny.heading' , [
        'heading' => __('Subscription Cancelled'),
        'level' => 'h2',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('beautymail::templates.sunny.contentStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <p> <?php echo e(__('Hello ')); ?> 
        <?php echo e(ucfirst($user->name)); ?>, 
        <br><br>
        <?php echo e(__('You have cancelled your subscription.')); ?>

    </p>
    <p>
        <?php echo e(__('Some features and services may not be accessible.
        Login into your account to learn more.')); ?>

    </p>
    <p>
        <?php echo e(__('Thanks')); ?>,<br>
        <?php echo e(config('app.name')); ?>

    </p>
    <?php echo $__env->make('beautymail::templates.sunny.contentEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('beautymail::templates.sunny.button', [
        	'title' => __('Login to your account'),
        	'link' => url('login')
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('beautymail::templates.sunny', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/emails/subscription/cancelled.blade.php ENDPATH**/ ?>