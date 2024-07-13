<?php $__env->startSection('title', '| Add Role'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Add Role')); ?></div>
                <div class="card-body">
                    <?php echo e(Form::open(array('route' => 'admin.roles.store'))); ?>


                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Name')); ?>

                        <?php echo e(Form::text('name', null, array('class' => 'form-control'))); ?>

                    </div>

                    <h5><b><?php echo e(__('Assign Permissions')); ?></b></h5>

                    <div class='form-group'>
                        <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e(Form::checkbox('permissions[]',  $permission->id )); ?>

                            <?php echo e(Form::label($permission->name, ucfirst($permission->name))); ?><br>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                    <?php echo e(Form::submit('Add', array('class' => 'btn btn-primary'))); ?>


                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/roles/create.blade.php ENDPATH**/ ?>