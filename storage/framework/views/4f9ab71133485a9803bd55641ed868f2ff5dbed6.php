<?php $__env->startComponent('mail::message'); ?>
# Team Deleted

This team no longer exists.

<?php $__env->startComponent('mail::panel'); ?>
    Some features and services may not be accessible if your subscription was based on the team plan.
    Login to your account to see the changes.
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::button', ['url' => route('account.index')]); ?>
View my account
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/emails/team/deleted.blade.php ENDPATH**/ ?>