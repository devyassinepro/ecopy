<?php $__env->startComponent('mail::message'); ?>
# Team Membership

Hello <?php echo e($user->first_name); ?>,

You have been added as a member of <?php echo e($team->name); ?>.

You can login into your account to find out more.

<?php $__env->startComponent('mail::button', ['url' => route('account.index')]); ?>
    View my account
<?php echo $__env->renderComponent(); ?>

Thanks,<br>
<?php echo e(config('app.name')); ?>

<?php echo $__env->renderComponent(); ?>
<?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/emails/team/member/added.blade.php ENDPATH**/ ?>