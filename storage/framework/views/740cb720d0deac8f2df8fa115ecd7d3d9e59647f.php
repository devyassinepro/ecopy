<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('beautymail::templates.sunny.heading' , [
        'heading' => 'Support Ticket',
        'level' => 'h2',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('beautymail::templates.sunny.contentStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <p>
        <?php echo e($comment->comment); ?>

    </p>
     
    ---
    <p><?php echo e(__('Replied by')); ?>: <?php echo e($user->name); ?></p>
     
    <p><?php echo e(__('Title')); ?>: <?php echo e($ticket->title); ?></p>
    <p><?php echo e(__('Ticket ID')); ?>: <?php echo e($ticket->ticket_id); ?></p>
    <p><?php echo e(__('Status')); ?>: <?php echo e($ticket->status); ?></p>
    
    <?php echo $__env->make('beautymail::templates.sunny.contentEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('beautymail::templates.sunny.button', [
        	'title' => 'You can view the ticket at any time at',
        	'link' => url('account/tickets/'. $ticket->ticket_id)
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('beautymail::templates.sunny', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/emails/ticket/ticket_comments.blade.php ENDPATH**/ ?>