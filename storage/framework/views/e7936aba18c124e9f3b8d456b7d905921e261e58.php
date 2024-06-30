<div>
    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-bell" aria-hidden="true"></i>
        <!-- __BLOCK__ --><?php if($notifications->count()>0): ?>
            <span class="badge badge-md badge-circle badge-floating badge-danger border-white"><?php echo e($notifications->count()); ?></span>
        <?php endif; ?> <!-- __ENDBLOCK__ -->
    </a>
    <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right py-0 overflow-hidden" style="max-width: 80px;">
        <!-- Dropdown header -->
        <div class="list-group list-group-flush">
            <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <a href="<?php echo e($notification->data['link']); ?>" class="list-group-item list-group-item-action">
                    <div class="row align-items-center">
                    <div class="col-auto">
                        <!-- Avatar -->
                        <i class="far fa-bell" style="font-size:20px"></i>
                    </div>
                    <div class="col ml--2">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h4 class="mb-0 text-sm"><?php echo e($notification->data['subject']); ?></h4>
                            </div>
                            <div class="text-right text-muted">
                                <small><?php echo e($notification->created_at->diffForHumans()); ?></small>
                            </div>
                        </div>
                        <p class="text-sm mb-0"><?php echo e($notification->data['body']); ?></p>
                    </div>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="px-3 py-3 text-center">
                    <h6 class="text-sm text-muted m-0">You don't have any notification</h6>
                </div>
            <?php endif; ?>
          </div>
        <!-- View all -->
        <!-- __BLOCK__ --><?php if($notifications->count()>0): ?>
        <a href="#!" wire:click="markAllAsRead" class="dropdown-item text-center text-primary font-weight-bold py-3">
            <?php echo e(__('Mark all as read')); ?>

        </a>
        <?php endif; ?> <!-- __ENDBLOCK__ -->
    </div>
</div>
<?php /**PATH /Users/touzani/Desktop/ecopy/ecopy.app/resources/views/livewire/notifications.blade.php ENDPATH**/ ?>