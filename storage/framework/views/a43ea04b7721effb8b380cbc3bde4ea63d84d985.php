<?php if (is_impersonating()) : ?>
    <div class="alert alert-soft-danger media" role="alert">
        <div class="media-body text-center" role="alert">
            <i class="fas fa-info-circle mt-1 mr-1"></i>
            <?php echo app('translator')->get('You are currently logged in as :name.', ['name' => auth()->user()->name]); ?> 
            <a class="btn btn-xs btn-soft-indigo" href="<?php echo e(route('impersonate.leave')); ?>">
                <?php echo e(__('Leave impersonation')); ?>

            </a>
        </div>
      </div>
<?php endif; ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/partials/account/login_as.blade.php ENDPATH**/ ?>