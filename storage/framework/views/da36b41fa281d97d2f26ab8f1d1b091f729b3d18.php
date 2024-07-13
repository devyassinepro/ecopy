<?php $__env->startSection('title', '| Users'); ?>

<?php $__env->startSection('content'); ?>
<div class="u-body">
    <h1 class="h2 font-weight-semibold mb-4"><?php echo e(__('User Administration')); ?></h1>
    <div class="container-fluid">
        <div class="fade-in">
            <div class="card">
                <div class="card-header">
                    <?php echo e(__('View User')); ?>


                    <div class="card-header-actions float-right">
                        <a href="<?php echo e(route('admin.users.index')); ?>" class="card-header-action"><?php echo e(__('Back')); ?></a>
                    </div>
                    <!--card-header-actions-->
                </div>
                <!--card-header-->

                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th><?php echo e(__('Type')); ?></th>
                                <td><?php echo e(__('Administrator')); ?></td>
                            </tr>

                            <tr>
                                <th><?php echo e(__('Avatar')); ?></th>
                                <td><img width="100" src="<?php echo e($user->profile_photo_url); ?>"
                                        class="user-profile-image"></td>
                            </tr>

                            <tr>
                                <th><?php echo e(__('Name')); ?></th>
                                <td><?php echo e($user->name); ?></td>
                            </tr>

                            <tr>
                                <th><?php echo e(__('E-mail Address')); ?></th>
                                <td><?php echo e($user->email); ?></td>
                            </tr>

                            <tr>
                                <th><?php echo e(__('Status')); ?></th>
                                <td>
                                    <?php echo $user->active ? "<span class='badge badge-success'>Active</span>" : "<span class='badge badge-danger'>Inactive</span> "; ?>

                                </td>
                            </tr>

                            <tr>
                                <th><?php echo e(__('Verified')); ?></th>
                                <td>
                                    <?php if($user->email_verified_at != null): ?>
                                    <span class="badge badge-success" data-toggle="tooltip" title=""
                                        data-original-title="<?php echo e($user->email_verified_at->toDayDateTimeString()); ?>">
                                        <?php echo e(__('Yes')); ?>

                                    </span> 
                                    <?php else: ?>
                                    <span class="badge badge-danger" data-toggle="tooltip" title=""
                                        data-original-title="">
                                        <?php echo e(__('No')); ?>

                                    </span> 
                                    <?php endif; ?>
    
                                    
                                </td>
                            </tr>

                            <tr>
                                <th><?php echo e(__('2FA')); ?></th>
                                <td>
                                    <?php if($user->two_factor_secret != null): ?>
                                    <span class="badge badge-danger">
                                        <?php echo e(__('Yes')); ?>

                                    </span>
                                    <?php else: ?>
                                    <span class="badge badge-danger">
                                        <?php echo e(__('No')); ?>

                                    </span>
                                    <?php endif; ?>
                                </td>
                            </tr>

                            <tr>
                                <th><?php echo e(__('Timezone')); ?></th>
                                <td><?php echo e($user->timezone); ?></td>
                            </tr>

                            <tr>
                                <th><?php echo e(__('Last Login At')); ?></th>
                                <td>
                                    <?php echo e($user->last_login_at->toDayDateTimeString()); ?> </td>
                            </tr>

                            <tr>
                                <th><?php echo e(__('Last Known IP Address')); ?></th>
                                <td><?php echo e($user->last_login_ip); ?></td>
                            </tr>


                            <tr>
                                <th><?php echo e(__('Roles')); ?></th>
                                <td><?php echo e(__('All')); ?></td>
                            </tr>

                            <tr>
                                <th><?php echo e(__('Additional Permissions')); ?></th>
                                <td><?php echo e(__('All')); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!--card-body-->

                <div class="card-footer">
                    <small class="float-right text-muted">
                        <strong><?php echo e(__('Account Created')); ?>:</strong> <?php echo e($user->created_at->toDayDateTimeString()); ?> (<?php echo e($user->created_at->diffForHumans()); ?>),
                        <strong><?php echo e(__('Last Updated')); ?>:</strong> <?php echo e($user->updated_at->toDayDateTimeString()); ?> (<?php echo e($user->updated_at->diffForHumans()); ?>)

                    </small>
                </div>
                <!--card-footer-->
            </div>
            <!--card-->

        </div>
        <!--fade-in-->
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/users/show.blade.php ENDPATH**/ ?>