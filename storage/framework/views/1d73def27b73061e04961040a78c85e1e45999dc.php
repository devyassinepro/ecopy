<?php $__env->startSection('title', '| Edit Role'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Edit Role')); ?>: <?php echo e($role->name); ?></div>

                <div class="card-body">
                    <?php echo e(Form::model($role, array('route' => array('admin.roles.update', $role->id), 'method' => 'PUT'))); ?>


                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Role Name')); ?>

                        <?php echo e(Form::text('name', null, array('class' => 'form-control'))); ?>

                    </div>

                    <h5><b><?php echo e(__('Assign Permissions')); ?></b></h5>
                    <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <?php echo e(Form::checkbox('permissions[]',  $permission->id, $role->permissions )); ?>

                        <?php echo e(Form::label($permission->name, ucfirst($permission->name))); ?><br>

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <br>
                    <?php echo e(Form::submit('Edit', array('class' => 'btn btn-primary'))); ?>


                    <?php echo e(Form::close()); ?>    
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/roles/edit.blade.php ENDPATH**/ ?>