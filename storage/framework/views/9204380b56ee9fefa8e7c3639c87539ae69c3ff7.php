<?php $__env->startComponent('mail::message'); ?>



<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('beautymail::templates.sunny.heading' , [
        'heading' => __('New Contact form email'),
        'level' => 'h2',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('beautymail::templates.sunny.contentStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <p> <?php echo e(__('Hello ')); ?> Admin, <br>
        <?php echo e(__('Contact from enquery from')); ?> : <?php echo e($name); ?>

        <p> <strong><?php echo e(__('Name')); ?>:</strong> <?php echo e($name); ?> </p>
        <p> <strong><?php echo e(__('Subject')); ?>:</strong> <?php echo e($subject); ?> </p>
        <p> <strong><?php echo e(__('Email')); ?>:</strong> <?php echo e($email); ?> </p>
        <p> <strong><?php echo e(__('Phone')); ?>:</strong> <?php echo e($phone); ?> </p>
        <p> <strong><?php echo e(__('Message')); ?>:</strong> <?php echo e($comment); ?> </p>
    </p>
    <p>
        <?php echo e(__('Thanks')); ?>,<br>
        <?php echo e(config('app.name')); ?>

    </p>
    <?php echo $__env->make('beautymail::templates.sunny.contentEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('beautymail::templates.sunny', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/emails/contact_mail.blade.php ENDPATH**/ ?>