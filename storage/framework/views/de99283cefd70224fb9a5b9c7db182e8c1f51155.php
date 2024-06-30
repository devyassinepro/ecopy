<div>
    <form wire:submit.prevent="importsingleproduct">
        <?php echo csrf_field(); ?>
        <div class="row g-3 align-center">
            <div class="col-lg-3">
                <div class="form-group">
                    <h2 class="form-label" for="url-single-product">Product URL</h2>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input type="text" id="url-single-product" wire:model="urlsingle" class="form-control" placeholder="URL Product">
                        <div><?php $__errorArgs = ['urlsingle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <?php echo e($message); ?> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <label class="form-label"></label>
                    <div class="form-control-wrap">
                        <button type="submit" class="btn btn-lg btn-primary" wire:loading.remove>Import</button>
                        <button class="btn btn-lg btn-primary" type="button" disabled wire:loading.delay>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span>Loading...</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>


<?php /**PATH /Users/touzani/Desktop/ecopy/ecopy.app/resources/views/livewire/account/shopify/single-product.blade.php ENDPATH**/ ?>