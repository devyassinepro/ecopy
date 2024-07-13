<?php $__env->startSection('title', '| Plans'); ?>

<?php $__env->startSection('content'); ?>
<div class="u-body">
    <div class="card">
        <div class="card-header">
            <strong><?php echo e(__('Update Plan')); ?></strong>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.plans.update', $plan->id)); ?>" method="POST" class="form-horizontal offset-sm-2">
                    <?php echo csrf_field(); ?>

                    <?php echo method_field('PUT'); ?>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name">Plan name</label>
                    <div class="col-md-6">
                        <input type="text" id="name" name="name" class="form-control" value="<?php echo e($plan->title); ?>"
                            placeholder="Enter Plan name..">

                            <?php if($errors->has('name')): ?>
                                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                            <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Plan Price')); ?></label>
                    <div class="col-md-6">
                        <input type="text" id="price" name="price" class="form-control"
                            value="<?php echo e($plan->price); ?>">

                            <?php if($errors->has('price')): ?>
                                <span class="text-danger"><?php echo e($errors->first('price')); ?></span>
                            <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name">Plan Trial</label>
                    <div class="col-md-6">
                        <input type="text" id="trial" name="trial" class="form-control"
                            value="<?php echo e($plan->trial_period_days); ?>">

                            <?php if($errors->has('trial')): ?>
                                <span class="text-danger"><?php echo e($errors->first('trial')); ?></span>
                            <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Plan interval')); ?></label>
                    <div class="col-md-6">
                        <select id="interval" type="" class="form-control" name="interval">
                            <option value=""><?php echo e(__('Select interval')); ?></option>
                            <option value="day" <?php echo e($plan->interval == 'day' ? 'selected' : ''); ?>>Daily</option>
                            <option value="week" <?php echo e($plan->interval == 'week' ? 'selected' : ''); ?>>Weekly</option>
                            <option value="month" <?php echo e($plan->interval == 'month' ? 'selected' : ''); ?>>Monthly</option>
                            <option value="year" <?php echo e($plan->interval == 'year' ? 'selected' : ''); ?>>Yearly</option>
                        </select>

                        <?php if($errors->has('interval')): ?>
                            <span class="text-danger"><?php echo e($errors->first('interval')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Teams Plan')); ?></label>
                    <div class="col-md-6">
                        <div class="row">
                        <div class="col-md-3">
                            <label class="switch switch-text switch-pill switch-primary">
                                <input type="checkbox" name="checkbox" id="checkbox" class="switch-input" <?php echo e($plan->teams_enabled == 1 ? 'checked' : ''); ?>>
                                <span class="switch-label" data-on="On" data-off="Off"></span>
                                <span class="switch-handle"></span>
                            </label>
                        </div>
                        <div class="col-md-9">
                            <input type="number" id="teams_limit" name="teams_limit" class="form-control"
                            placeholder="Number of member allow for this Plan"
                            value="<?php echo e($plan->teams_limit); ?>">
                            <?php if($errors->has('teams_limit')): ?>
                                <span class="text-danger"><?php echo e($errors->first('teams_limit')); ?></span>
                            <?php endif; ?>
                        </div>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Number of Store Access')); ?></label>
                    <div class="col-md-6">
                        <input type="number" id="store_access_count" name="store_access_count" class="form-control"
                            value="<?php echo e($plan->store_access_count); ?>">

                            <?php if($errors->has('store_access_count')): ?>
                                <span class="text-danger"><?php echo e($errors->first('store_access_count')); ?></span>
                            <?php endif; ?>
                    </div>
                </div>
                
                <hr>
                <button type="submit" class="btn btn-secondary"><i class="fa fa-dot-circle-o"></i> <?php echo e(__('Edit plan')); ?></button>
                <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> <?php echo e(__('Reset')); ?></button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/plans/edit.blade.php ENDPATH**/ ?>