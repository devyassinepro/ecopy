<?php $__env->startSection('title', '| Coupons'); ?>

<?php $__env->startSection('content'); ?>
<div class="u-body">
    <div class="w-100 flex-container">
        <h1 class="h2 font-weight-semibold mb-4"> <i class="fa fa-align-justify"></i> <?php echo e(__('Coupons')); ?></h1>
        <a href="<?php echo e(route('admin.coupons.create')); ?>" class="btn btn-secondary mb-3"><?php echo e(__('New coupon')); ?></a>
    </div>
        <div class="card mb-4">
            <div class="card-body">
                <table class="table table-responsive-sm table-striped">
                    <thead>
                        <tr>
                            <th><?php echo e(__('Name')); ?></th>
                            <th><?php echo e(__('Percent off')); ?></th>
                            <th><?php echo e(__('Coupon Code')); ?></th>
                            <th><?php echo e(__('Duration')); ?></th>
                            <th><?php echo e(__('Date')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($coupon->name); ?></td>
                            <td><span class="badge badge-info" style="font-size:15px"><?php echo e($coupon->percent_off); ?> %</span> </td>
                            <td><span class="badge badge-success" style="font-size:15px"><?php echo e($coupon->gateway_id); ?></span> </td>
                            <td><?php echo e($coupon->duration); ?></td>
                            <td><?php echo e($coupon->created_at->diffForHumans()); ?></td>
                            <td class="float-right">
                                <div class="btn-group" role="group" aria-label="User Actions">
                                    <a href="<?php echo e(URL::to('admin/coupons/' . $coupon->id . '/edit')); ?>" data-toggle="tooltip" data-placement="top" title="" class="btn btn-primary mr-2" data-original-title="Edit"><i class="fa fa-edit "></i></a>
                                    <form action="<?php echo e(route('admin.coupons.destroy', $coupon->id)); ?>" method="post">
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
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/coupons/index.blade.php ENDPATH**/ ?>