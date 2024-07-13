<?php $__env->startSection('content'); ?>
<div class="u-body">
    <h1 class="h2 font-weight-semibold mb-4"><?php echo e(__('User Administration')); ?></h1>
        <div class="card mb-3">
            <div class="card-body">
                <?php if($tickets->isEmpty()): ?>
                <p><?php echo e(__('There are currently no tickets.')); ?></p>
                <?php else: ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th><?php echo e(__('Category')); ?></th>
                            <th><?php echo e(__('Title')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <th><?php echo e(__('Last Updated')); ?></th>
                            <th style="text-align:center" colspan="2"><?php echo e(__('Actions')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td>
                                <?php echo e($ticket->category->name); ?>

                            </td>
                            <td>
                                <a href="<?php echo e(url('admin/tickets/'. $ticket->ticket_id)); ?>">
                                    #<?php echo e($ticket->ticket_id); ?> - <?php echo e($ticket->title); ?>

                                </a>
                            </td>
                            <td>
                                <?php if($ticket->status === 'Open'): ?>
                                <span class="badge badge-success"> <?php echo e($ticket->status); ?></span>
                                <?php else: ?>
                                <span class="badge badge-danger"> <?php echo e($ticket->status); ?></span>
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($ticket->updated_at->diffForHumans()); ?></td>
                            <td class="float-right">
                                <?php if($ticket->status === 'Open'): ?>
                                <a href="<?php echo e(url('admin/tickets/' . $ticket->ticket_id)); ?>" class="btn btn-info"><i class="fas fa-comment-dots"></i></a>

                                <form action="<?php echo e(url('admin/close_ticket/' . $ticket->ticket_id)); ?>" method="POST" style="display: inline-block;">
                                    <?php echo csrf_field(); ?>

                                    <button type="submit" class="btn btn-danger"><i class="fas fa-times-circle"></i></button>
                                </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                <?php echo e($tickets->render()); ?>

                <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/tickets/index.blade.php ENDPATH**/ ?>