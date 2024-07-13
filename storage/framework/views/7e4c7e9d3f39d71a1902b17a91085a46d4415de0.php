<?php $__env->startSection('content'); ?>

	<?php echo $__env->make('beautymail::templates.widgets.articleStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

		<h4 class="secondary"><strong><?php echo e(__('Hello')); ?>,</strong></h4>
		<p><?php echo e(__('This is an email to tell you that your trial will expire soon')); ?></p>

	<?php echo $__env->make('beautymail::templates.widgets.articleEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


	<?php echo $__env->make('beautymail::templates.widgets.newfeatureStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<p><?php echo e(__('Please login to your account to subscribe to a plan.')); ?></p>

	<?php echo $__env->make('beautymail::templates.widgets.newfeatureEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('beautymail::templates.widgets', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/emails/trial_expiring.blade.php ENDPATH**/ ?>