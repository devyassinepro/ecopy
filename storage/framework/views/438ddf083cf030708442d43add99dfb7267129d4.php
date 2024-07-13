<div class="card-body">
    <form  wire:submit.prevent="store" class="form-horizontal offset-sm-2">
            <?php echo csrf_field(); ?>

        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Select Users')); ?></label>
            <div class="col-md-6" wire:ignore>
                <select id="category-dropdown" class="form-control" multiple wire:model.live="selectusers">
                    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Subject')); ?></label>
            <div class="col-md-6">
                <input type="text" class="form-control" wire:model.live="subject"/>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Message')); ?></label>
            <div class="col-md-6">
                <textarea class="form-control" rows="4" wire:model.live="body"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-md-3 col-form-label" for="hf-name"><?php echo e(__('Link')); ?></label>
            <div class="col-md-6">
                <input type="text" class="form-control" wire:model.live="link"/>
            </div>
        </div>
            <hr>
        <button type="submit" class="btn btn-secondary"><i class="fa fa-dot-circle-o"></i> <?php echo e(__('Send announcement')); ?></button>
    </form>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function () {
            $('#category-dropdown').select2();
            $('#category-dropdown').on('change', function (e) {
                let data = $(this).val();
                 window.Livewire.find('<?php echo e($_instance->getId()); ?>').set('selectusers', data);
            });
            window.livewire.on('productStore', () => {
                $('#category-dropdown').select2();
            });
        });  
    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/livewire/send-notifications.blade.php ENDPATH**/ ?>