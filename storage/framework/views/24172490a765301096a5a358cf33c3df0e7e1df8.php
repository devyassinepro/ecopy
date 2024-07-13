<?php $__env->startSection('title', '| Create Permission'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Add Permission')); ?></div>
                <div class="card-body">
                    <?php echo e(Form::open(array('url' => 'admin/permissions'))); ?>


                    <div class="form-group">
                        <?php echo e(Form::label('name', 'Name')); ?>

                        <?php echo e(Form::text('name', '', array('class' => 'form-control'))); ?>

                    </div><br>
                    <?php if(!$roles->isEmpty()): ?>
                        <h4><?php echo e(__('Assign Permission to Roles')); ?></h4>

                        <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <?php echo e(Form::checkbox('roles[]',  $role->id )); ?>

                            <?php echo e(Form::label($role->name, ucfirst($role->name))); ?><br>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                    <br>
                    <?php echo e(Form::submit('Add', array('class' => 'btn btn-primary'))); ?>


                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/permissions/create.blade.php ENDPATH**/ ?>