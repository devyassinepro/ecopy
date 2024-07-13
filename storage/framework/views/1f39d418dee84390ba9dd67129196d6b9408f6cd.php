<div class="comments">
    <?php $__currentLoopData = $ticket->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="card bg-<?php if($ticket->user->id === $comment->user_id): ?><?php echo e("gradient-default"); ?><?php else: ?><?php echo e("gradient-primary"); ?><?php endif; ?>">

        <blockquote class="reply">
            <p style="padding-left:10px;padding:right:10px; padding-top:10px"> <?php echo e($comment->comment); ?></p>
            <footer class="blockquote-footer" style="font-size:14px; color:#c5cfda">
                    <?php echo e($comment->user->name); ?>

                <cite><?php echo e(__('Replied')); ?> : <?php echo e($comment->created_at->diffForHumans()); ?></cite>
            </footer>
        </blockquote>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/tickets/comments.blade.php ENDPATH**/ ?>