<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('beautymail::templates.widgets.articleStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<h4 class="secondary"><strong>Hello,</strong></h4>
		<p>You have been invited to join team <?php echo e($team->name); ?>.<br>
            Click here to join: <a href="<?php echo e(route('teams.accept_invite', $invite->accept_token)); ?>"><?php echo e(route('teams.accept_invite', $invite->accept_token)); ?></a></p>

	<?php echo $__env->make('beautymail::templates.widgets.articleEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('beautymail::templates.widgets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/emails/team/invite.blade.php ENDPATH**/ ?>