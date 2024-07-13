<?php $__env->startSection('title', '| Plans'); ?>

<?php $__env->startSection('content'); ?>
<div class="u-body">
    <div class="w-100 flex-container">
        <h1 class="h2 font-weight-semibold mb-4"> <i class="fa fa-align-justify"></i> <?php echo e(__('Plans')); ?></h1>
        <a href="<?php echo e(route('admin.plans.create')); ?>" class="btn btn-secondary mb-3"><?php echo e(__('New plan')); ?></a>
    </div>
    <div class="card mb-4">
            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead>
                        <tr>
                            <th><?php echo e(__('Name')); ?></th>
                            <th><?php echo e(__('Interval')); ?></th>
                            <th><?php echo e(__('Price')); ?></th>
                            <th><?php echo e(__('Team Limit')); ?></th>
                            <th><?php echo e(__('Date')); ?></th>
                            <th><?php echo e(__('Number of Store Access')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <th class="float-right"><?php echo e(__('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $plans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($plan->title); ?></td>
                            <td><?php echo e($plan->interval); ?></td>
                            <td><?php echo e($plan->price); ?></td>
                            <td><?php echo e($plan->teams_limit); ?></td>
                            <td><?php echo e($plan->created_at->diffForHumans()); ?></td>
                            <td><?php echo e($plan->store_access_count); ?></td>
                            
                            <td>
                                <?php if($plan->active === 1): ?>
                                <span class="badge badge-success"> <?php echo e(__('Active')); ?></span>
                                <?php else: ?>
                                <span class="badge badge-danger"> <?php echo e(__('Inactive')); ?></span>
                                <?php endif; ?>
                            </td>
                            <td class="float-right">
                                <div class="btn-group" role="group" aria-label="User Actions">
                                    <!-- <a href="<?php echo e(URL::to('admin/plans/' . $plan->id . '/edit')); ?>" data-toggle="tooltip" data-placement="top" title="" class="btn btn-primary mr-2" data-original-title="Edit"><i class="fa fa-edit "></i></a> -->
                                    <a href="<?php echo e(route('admin.plans.edit', $plan->id)); ?>" data-toggle="tooltip" data-placement="top" title="" class="btn btn-primary mr-2" data-original-title="Edit"><i class="fa fa-edit "></i></a>

                                    <form action="<?php echo e(route('admin.plans.destroy', $plan->id)); ?>" method="post">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i></b>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/plans/index.blade.php ENDPATH**/ ?>