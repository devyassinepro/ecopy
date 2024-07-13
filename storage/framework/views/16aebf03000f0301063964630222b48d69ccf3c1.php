<?php $__env->startSection('title', '| Plans'); ?>

<?php $__env->startSection('content'); ?>
<div class="u-body">
    <div class="w-100 flex-container">
        <h1 class="h2 font-weight-semibold mb-4"> <i class="fa fa-align-justify"></i> <?php echo e(__('Create new plan')); ?></h1>
    </div>
    <div class="card">
        <div class="card-header">
            <strong><?php echo e(__('Create a Plan')); ?></strong> 
            <span class="center"> <?php echo e(__('Plan will automaticaly create on the fly to the stripe dashboard')); ?> </span>
        </div>
        <div class="card-body">
            <form action="<?php echo e(route('admin.plans.store')); ?>" method="POST" class="form-horizontal offset-sm-2">
                    <?php echo csrf_field(); ?>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Plan name')); ?></label>
                    <div class="col-md-6">
                        <input type="text" id="name" name="name" class="form-control"
                            placeholder="<?php echo e(__('Enter Plan name..')); ?>"
                            value="<?php echo e(old('name')); ?>">

                            <?php if($errors->has('name')): ?>
                                <span class="text-danger"><?php echo e($errors->first('name')); ?></span>
                            <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Plan Price')); ?></label>
                    <div class="col-md-6">
                        <input type="text" id="price" name="price" class="form-control"
                            placeholder="Enter Plan price.."
                            value="<?php echo e(old('name')); ?>">

                            <?php if($errors->has('price')): ?>
                                <span class="text-danger"><?php echo e($errors->first('price')); ?></span>
                            <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Plan Trial')); ?></label>
                    <div class="col-md-6">
                        <input type="text" id="trial" name="trial" class="form-control"
                            placeholder="Enter Plan name.."
                            value="<?php echo e(old('trial')); ?>">

                            <?php if($errors->has('trial')): ?>
                                <span class="text-danger"><?php echo e($errors->first('trial')); ?></span>
                            <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Plan interval')); ?></label>
                    <div class="col-md-6">
                            <select id="interval" type="" class="form-control" name="interval">
                                <option value=""><?php echo e(__('Select Interval')); ?></option>
                                <option value="day"><?php echo e(__('Daily')); ?></option>
                                <option value="week"><?php echo e(__('Weekly')); ?></option>
                                <option value="month"><?php echo e(__('Monthly')); ?></option>
                                <option value="year"><?php echo e(__('Yearly')); ?></option>
                            </select>

                            <?php if($errors->has('interval')): ?>
                                <span class="text-danger"><?php echo e($errors->first('interval')); ?></span>
                            <?php endif; ?>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Max team member')); ?></label>
                    <div class="col-md-9">
                        <input type="number" id="teams_limit" name="teams_limit" class="form-control"
                        placeholder="Number of member allow for this Plan"
                        value="<?php echo e(old('teams_limit')); ?>">
                        <?php if($errors->has('teams_limit')): ?>
                            <span class="text-danger"><?php echo e($errors->first('teams_limit')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Number of Store Access')); ?></label>
                    <div class="col-md-9">
                        <input type="number" id="store_access_count" name="store_access_count" class="form-control"
                        placeholder="Number of Store Access for this Plan"
                        value="<?php echo e(old('store_access_count')); ?>">
                        <?php if($errors->has('store_access_count')): ?>
                            <span class="text-danger"><?php echo e($errors->first('store_access_count')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>
                
                <hr>
                <button type="submit" class="btn btn-secondary"><i class="fa fa-dot-circle-o"></i> <?php echo e(__('Create plan')); ?></button>
                <button type="reset" class="btn btn-danger"><i class="fa fa-ban"></i> Reset</button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/plans/create.blade.php ENDPATH**/ ?>