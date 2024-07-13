<?php $__env->startSection('title', '| Plans'); ?>

<?php $__env->startSection('content'); ?>
<div class="u-body">
    <div class="w-100 flex-container">
        <h1 class="h2 font-weight-semibold mb-4"> <i class="fa fa-align-justify"></i> <?php echo e(__('Stripe Subscriptions')); ?></h1>
    </div>
    <div class="card mb-4">
            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th><?php echo e(__('Reason')); ?></th>
                            <th><?php echo e(__('Team')); ?></th>
                            <th><?php echo e(__('Date')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                            <th class="float-right"><?php echo e(__('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <th><?php echo e($subscription->id); ?></th>
                            <td><?php echo e($subscription->name); ?></td>
                            <td><?php echo e(subscription_team($subscription)->name); ?></td>
                            <td><?php echo e($subscription->created_at->toDayDateTimeString()); ?></td>
                            <td>
                                <span class="badge badge-success"><?php echo e(ucfirst($subscription->stripe_status)); ?></span>
                            </td>
                            <td class="float-right">
                                <div class="btn-group" role="group" aria-label="User Actions">
                                    <a href="<?php echo e(URL::to('admin/plans/' . $subscription->id . '/edit')); ?>" data-toggle="tooltip" data-placement="top" title="" class="btn btn-primary mr-2" data-original-title="Edit"><i class="fa fa-edit "></i></a>
                                    <form action="<?php echo e(route('admin.plans.destroy', $subscription->id)); ?>" method="post">
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
        <?php echo e($subscriptions->links()); ?>

</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/subscriptions/index.blade.php ENDPATH**/ ?>