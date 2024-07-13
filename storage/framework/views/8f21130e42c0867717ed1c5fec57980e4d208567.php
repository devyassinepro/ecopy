<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('beautymail::templates.sunny.heading' , [
        'heading' => __('Subscription Plan Changed'),
        'level' => 'h2',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('beautymail::templates.sunny.contentStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <p> <?php echo e(__('Hello ')); ?> <?php echo e(ucfirst($user->name)); ?> <br>
        <?php echo e(__('Your subscription has been changed.')); ?>

    </p>
    <p>
        <?php echo e(__('Some features and services may not be accessible according to the plan your are currently on.
        Login into your account to see the changes.')); ?>

    </p>

    <?php echo $__env->make('beautymail::templates.sunny.contentEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('beautymail::templates.sunny.button', [
        	'title' => __('View my account'),
        	'link' => url('login')
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('beautymail::templates.sunny', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/emails/subscription/swapped.blade.php ENDPATH**/ ?>