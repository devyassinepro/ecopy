<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('beautymail::templates.sunny.heading' , [
        'heading' => 'Suppor Ticket Information',
        'level' => 'h2',
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('beautymail::templates.sunny.contentStart', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <p> <?php echo e(__('Thank you')); ?> <?php echo e(ucfirst($user->name)); ?> <?php echo e(__('for contacting our support team. A support ticket has been opened for you.
        You will be notified when a response is made by email. The details of your ticket are shown below:')); ?> </p>
    <p><?php echo e(__('Title')); ?>: <?php echo e($ticket->title); ?></p>
    <p><?php echo e(__('Priority')); ?>: <?php echo e($ticket->priority); ?></p>
    <p><?php echo e(__('Status')); ?>: <?php echo e($ticket->status); ?></p>
    
    <?php echo $__env->make('beautymail::templates.sunny.contentEnd', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('beautymail::templates.sunny.button', [
        	'title' => 'You can view the ticket at any time at',
        	'link' => url('tickets/'. $ticket->ticket_id)
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('beautymail::templates.sunny', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/emails/ticket/ticket_info.blade.php ENDPATH**/ ?>