<?php if (isset($component)) { $__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b = $component; } ?>
<?php $component = App\View\Components\AccountLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('account-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AccountLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="d-none d-lg-block">
            <h1 class="h2 text-white"><?php echo e(__('Create a new ticket')); ?></h1>
        </div>
     <?php $__env->endSlot(); ?>
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
<div class="card">
        <!-- Card header -->
        <div class="card-header">
            <h2 class="mb-0 text-primary"><i class="fas fa-ticket-alt"></i> <?php echo e(__('Create New Ticket')); ?></h2>
        </div>
        <!-- Card body -->
        <div class="card-body">
                
            <form class="form-horizontal offset-sm-2" role="form" method="POST">
                <?php echo csrf_field(); ?>


                <div class="form-group row <?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                    <label for="title" class="col-md-2 col-form-label form-control-label"><?php echo e(__('Title')); ?></label>
                    <div class="col-md-7">
                        <input id="title" type="text" class="form-control" name="title"
                            value="<?php echo e(old('title')); ?>">

                        <?php if($errors->has('title')): ?>
                            <span class="text-danger"><?php echo e($errors->first('title')); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('category') ? ' has-error' : ''); ?>">
                    <label for="category" class="col-md-2 col-form-label form-control-label"><?php echo e(__('Category')); ?></label>

                    <div class="col-md-7">
                        <select id="category" type="category" class="form-control" name="category">
                            <option value=""><?php echo e(__('Select Category')); ?></option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>

                        <?php if($errors->has('category')): ?>
                        <span class="help-block">
                            <span class="text-danger"><?php echo e($errors->first('category')); ?></sp>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('priority') ? ' has-error' : ''); ?>">
                    <label for="priority" class="col-md-2 col-form-label form-control-label">Priority</label>

                    <div class="col-md-7">
                        <select id="priority" type="" class="form-control" name="priority">
                            <option value=""><?php echo e(__('Select Priority')); ?></option>
                            <option value="low"><?php echo e(__('Low')); ?></option>
                            <option value="medium"><?php echo e(__('Medium')); ?></option>
                            <option value="high"><?php echo e(__('High')); ?></option>
                        </select>

                        <?php if($errors->has('priority')): ?>
                        <span class="help-block">
                            <span class="text-danger"><?php echo e($errors->first('priority')); ?></span>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row <?php echo e($errors->has('message') ? ' has-error' : ''); ?>">
                    <label for="message" class="col-md-2 col-form-label form-control-label"><?php echo e(__('Message')); ?></label>

                    <div class="col-md-7">
                        <textarea rows="5" id="message" class="form-control" name="message"></textarea>

                        <?php if($errors->has('message')): ?>
                        <span class="help-block">
                            <span class="text-danger"><?php echo e($errors->first('message')); ?></span>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-md-6 col-md-offset-6">
                        <button type="submit" class="btn btn-lg btn-primary">
                            <i class="fas fa-ticket-alt"></i> <?php echo e(__('Open Ticket')); ?>

                        </button>
                    </div>
                </div>
            </form>
        </div>
</div>
</div>
    </div>
      </div>    
    </div>    
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b)): ?>
<?php $component = $__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b; ?>
<?php unset($__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b); ?>
<?php endif; ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/tickets/create.blade.php ENDPATH**/ ?>