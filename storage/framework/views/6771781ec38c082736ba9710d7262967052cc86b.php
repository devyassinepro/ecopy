<?php $__env->startSection('title', '| Roles'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h3><i class="fa fa-users float-left"></i><?php echo e(__('Roles')); ?></h3> 
        </div>
        <div class="col">
            <a href="<?php echo e(route('admin.users.index')); ?>" class="btn btn-outline-primary btn-sm float-right">Users</a>
            <a href="<?php echo e(route('admin.permissions.index')); ?>" class="btn btn-outline-primary btn-sm float-right">Permissions</a>
        </div>
    </div>

    <hr>
    <div class="card" style="margin-bottom: 10px; ">
    <div class="table-responsive">
        <table class="table table-bordered table-striped" style="margin-bottom: 0px;">
            <thead>
                <tr>
                    <th><?php echo e(__('Role')); ?></th>
                    <th><?php echo e(__('Permissions')); ?></th>
                    <th><?php echo e(__('Operation')); ?></th>
                </tr>
            </thead>

            <tbody>
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>

                    <td><?php echo e($role->name); ?></td>

                    <td><?php echo e(str_replace(array('[',']','"'),'', $role->permissions()->pluck('name'))); ?></td>
                    <td>
                    <a href="<?php echo e(URL::to('admin/roles/'.$role->id.'/edit')); ?>" class="btn btn-info btn-sm float-left" style="margin-right: 3px;">Edit</a>

                    <?php echo Form::open(['method' => 'DELETE', 'route' => ['admin.roles.destroy', $role->id] ]); ?>

                    <?php echo Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']); ?>

                    <?php echo Form::close(); ?>


                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>

        </table>
    </div>
    </div>

    <a href="<?php echo e(URL::to('admin/roles/create')); ?>" class="btn btn-success"><?php echo e(__('Add Role')); ?></a>

</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/roles/index.blade.php ENDPATH**/ ?>