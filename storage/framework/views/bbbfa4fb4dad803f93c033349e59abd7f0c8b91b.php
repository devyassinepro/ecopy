<?php $__env->startSection('title', '| Permissions'); ?>

<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col float-left">
        <h3><i class="fa fa-key"></i><?php echo e(__('Available Permissions')); ?></h3>
        </div>
        <div class="col float-right">
        <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-outline-primary btn-sm float-right">Users</a>
        <a href="<?php echo e(route('admin.roles.index')); ?>" class="btn btn-outline-primary btn-sm float-right">Roles</a>
        </div>
    </div>
    <hr>
    <div class="card" style="margin-bottom: 10px; ">
    <div class="table-responsive">
        <table class="table table-bordered table-striped" style="margin-bottom: 0px;">

            <thead>
                <tr>
                    <th><?php echo e(__('Permissions')); ?></th>
                    <th><?php echo e(__('Operation')); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($permission->name); ?></td> 
                    <td>
                    <a href="<?php echo e(URL::to('admin/permissions/'.$permission->id.'/edit')); ?>" class="btn btn-info btn-sm float-left" style="margin-right: 3px;">Edit</a>

                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.permissions.destroy', $permission->id] ]); ?>

                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']); ?>

                    <?php echo Form::close(); ?>


                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    </div>
    <a href="<?php echo e(URL::to('admin/permissions/create')); ?>" class="btn btn-success btn-md">Add Permission</a>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/permissions/index.blade.php ENDPATH**/ ?>