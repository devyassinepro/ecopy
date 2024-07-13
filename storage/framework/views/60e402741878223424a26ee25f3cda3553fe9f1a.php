<?php $__env->startSection('title', '| Edit Permission'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Edit Permission')); ?>: <?php echo e($permission->name); ?></div>

                <div class="card-body">
                    <?php echo e(Form::model($permission, array('route' => array('admin.permissions.update', $permission->id), 'method' => 'PUT'))); ?>


                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Permission Name')); ?>

                        <?php echo e(Form::text('name', null, array('class' => 'form-control'))); ?>

                    </div>
                    <br>
                    <?php echo e(Form::submit('Edit', array('class' => 'btn btn-primary'))); ?>


                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/permissions/edit.blade.php ENDPATH**/ ?>