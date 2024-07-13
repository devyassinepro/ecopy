<?php $__env->startSection('content'); ?>
<div class="u-body">
    <h1 class="h2 font-weight-semibold mb-4">#<?php echo e($ticket->ticket_id); ?> - <?php echo e($ticket->title); ?></h1>
    <div class="card">
        <!-- Card body -->
        <div class="card-body">
                    <div class="ticket-info">
                        <blockquote class="blockquote">
                        <h5><?php echo e($ticket->message); ?></h5>
                        <footer class="blockquote-footer" style="font-size:14px; display:flex">
                            <?php echo e(__('Category')); ?>: <strong><?php echo e($ticket->category->name); ?></strong> | 
                                <span>
                                    <?php if($ticket->status == "Open"): ?>
                                    <?php echo e(__('Status')); ?>: <i class="bg-success" style="width: 0.5rem; height: 0.5rem;"></i> <span class="status bg-success px-1"> <?php echo e($ticket->status); ?></span>
                                    <?php else: ?>
                                    <?php echo e(__('Status')); ?>: <i class="bg-danger" style="height: 0.5rem; width: 0.5rem"></i> <span class="status bg-danger px-1"><?php echo e($ticket->status); ?></span>
                                    <?php endif; ?>
                                </span>  |
                                
                                <cite>Created : <?php echo e($ticket->created_at->diffForHumans()); ?></cite>
                                <a href="<?php echo e(route('impersonate', $ticket->user->id)); ?>" title="<?php echo e(__('Impersonate user')); ?>" style="padding: 3px; margin-left:8px" class="btn btn-default float-left"><i class="fa fa-user-secret" style="color: black" aria-hidden="true"></i> <?php echo e(__('impersonate user')); ?></a>
                        </footer>
                        </blockquote>
                    </div>
                    <hr>
                    <?php echo $__env->make('tickets.comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <hr>
                    <?php echo $__env->make('tickets.reply', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/tickets/show.blade.php ENDPATH**/ ?>