<div class="card">
    <div class="card-header">
            <h4 class="mb-0 text-info"><i class="fas fa-comment-dots" style="font-size: 24px"></i> <?php echo e(__('Add reply')); ?></h4>
    </div>
    <div class="card-body">
        <div class="comment-form">

            <form action="<?php echo e(url('account/comment')); ?>" method="POST" class="form">
                    <?php echo e(method_field('POST')); ?>

                <?php echo csrf_field(); ?>


                <input type="hidden" name="ticket_id" value="<?php echo e($ticket->id); ?>">

                <div class="form-group<?php echo e($errors->has('comment') ? ' has-error' : ''); ?>">
                    <textarea rows="4" id="comment" class="form-control" name="comment"></textarea>

                    <?php if($errors->has('comment')): ?>
                    <span class="help-block">
                        <strong><?php echo e($errors->first('comment')); ?></strong>
                    </span>
                    <?php endif; ?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Submit')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/tickets/reply.blade.php ENDPATH**/ ?>