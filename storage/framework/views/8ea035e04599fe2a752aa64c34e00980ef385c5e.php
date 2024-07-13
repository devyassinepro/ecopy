<?php $__env->startComponent('mail::message'); ?>
# Team Updated

Team details have been updated.

You can login to see changes.

<?php $__env->startComponent('mail::button', ['url' => route('account.index')]); ?>
View my account
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/emails/team/updated.blade.php ENDPATH**/ ?>