<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('beautymail::templates.sunny.heading' , [
        'heading' => 'Suppor Ticket Status',
        'level' => 'h2',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('beautymail::templates.sunny.contentStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <p>
        <?php echo e(__('Hello')); ?> <?php echo e(ucfirst($ticketOwner->name)); ?>,
    </p>
    <p>
        <?php echo e(__('Your support ticket with ID')); ?> #<?php echo e($ticket->ticket_id); ?> <?php echo e(__('has been marked has resolved and closed')); ?>.
    </p>
    
    <?php echo $__env->make('beautymail::templates.sunny.contentEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('beautymail::templates.sunny.button', [
        	'title' => 'You can view the ticket at any time at',
        	'link' => url('tickets/'. $ticket->ticket_id)
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('beautymail::templates.sunny', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/emails/ticket/ticket_status.blade.php ENDPATH**/ ?>