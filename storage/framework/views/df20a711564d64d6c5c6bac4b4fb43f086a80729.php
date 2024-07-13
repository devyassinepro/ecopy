<?php $__env->startSection('title', '| Edit coupons'); ?>
<?php $__env->startSection('content'); ?>
<div class="u-body">
    <h1 class="h2 font-weight-semibold mb-4"> <i class="fa fa-align-justify"></i> <?php echo e(__('Coupons / Discount')); ?></h1>
    <div class="card">
        <div class="card-header">
            <strong><?php echo e(__('Update Coupon')); ?></strong>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.coupons.update', $coupon->id)); ?>" method="POST" class="form-horizontal offset-sm-2">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('PUT'); ?>
                    <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Coupon name')); ?></label>
                            <div class="col-md-6">
                                <input type="text" id="name" name="name" class="form-control"
                                    placeholder="Coupon name.."
                                    value="<?php echo e($coupon->name); ?>" required>
        
                                    <?php if($errors->has('name')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                                    <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Coupon Code')); ?></label>
                                <div class="col-md-6">
                                    <input type="text" id="code_id" name="gateway_id" class="form-control"
                                        placeholder="Exp: 25OFF"
                                        value="<?php echo e($coupon->gateway_id); ?>" required>
            
                                        <?php if($errors->has('gateway_id')): ?>
                                            <span class="text-danger"><?php echo e($errors->first('gateway_id')); ?></span>
                                        <?php endif; ?>
                                </div>
                            </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Percentage Off')); ?></label>
                            <div class="col-md-6">
                                <input type="text" id="price" name="percent_off" class="form-control"
                                    placeholder="Enter Plan price.."
                                    value="<?php echo e($coupon->percent_off); ?>" required>
        
                                    <?php if($errors->has('percent_off')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('percent_off')); ?></span>
                                    <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Duration')); ?></label>
                            <div class="col-md-6">
                                    <select id="duration" type="" class="form-control" name="duration" required>
                                        <option value=""><?php echo e(__('Select Duration')); ?></option>
                                        <option value="once" <?php echo e($coupon->duration == 'once' ? 'selected' : ''); ?>><?php echo e(__('Once')); ?></option>
                                        <option value="repeating" <?php echo e($coupon->duration == 'repeating' ? 'selected' : ''); ?>><?php echo e(__('Repeating')); ?></option>
                                        <option value="forever" <?php echo e($coupon->duration == 'forever' ? 'selected' : ''); ?>><?php echo e(__('Forever')); ?></option>
                                    </select>
        
                                    <?php if($errors->has('duration')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('duration')); ?></span>
                                    <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Duration in months')); ?></label>
                            <div class="col-md-6">
                                <input type="text" id="duration_in_months" name="duration_in_months" class="form-control"
                                    placeholder="Duration in month"
                                    value="<?php echo e($coupon->duration_in_months); ?>">
                                    <span class="text-danger" style="font-size:11px;"><i class="fa fa-question-circle"></i> 
                                        <?php echo e(__('Required only if duration is repeating, in which case it must be a positive integer that specifies the number of months the discount will be in effect.')); ?></span>
                                    <?php if($errors->has('duration_in_months')): ?>
                                        <span class="text-danger"><?php echo e($errors->first('duration_in_months')); ?></span>
                                    <?php endif; ?>
                            </div>
                        </div>
                        <hr>
                    <button type="submit" class="btn btn-success"><i class="fa fa-dot-circle-o"></i> <?php echo e(__('Create')); ?></button>
                    <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
                </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/coupons/edit.blade.php ENDPATH**/ ?>