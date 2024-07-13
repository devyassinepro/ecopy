<?php $__env->startComponent('mail::message'); ?>
# Team Membership Cancelled

Hello <?php echo e($user->first_name); ?>,

You have been removed as a member of <?php echo e($team->name); ?>.

<?php $__env->startComponent('mail::panel'); ?>
    Some features and services may not be accessible.
<?php echo $__env->renderComponent(); ?>

<?php $__env->startComponent('mail::button', ['url' => route('account.index')]); ?>
    View my account
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/emails/team/member/deleted.blade.php ENDPATH**/ ?>