<div>

    <!-- <form wire:submit.prevent="importsingleproduct">
        <?php echo csrf_field(); ?>
        <div class="row g-3 align-center">
            <div class="col-lg-4">
                <div class="form-group">
                    <h2 class="form-label" for="url-single-product">Product URL</h2>
                </div>

            </div>

            <div class="col-lg-3">
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
            <div class="col-lg-3">
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
    </form> -->
    <div class="row g-3 align-center">
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
                <div class="form-group">
                <a href="#" class="btn btn-xl btn-primary" data-toggle="modal" data-target="#modalForm"><em class="icon ni ni-tag"></em>Import Single Product</a>
                </div>

            </div>
    </div>

    <!-- Modal Form -->
    <div class="modal fade" id="modalForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                    <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                <form wire:submit.prevent="importsingleproduct">
                  <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <!-- <label class="form-label" for="full-name">Product Url</label> -->
                            <div class="form-control-wrap">
                                <input type="text" id="url-single-product" wire:model="urlsingle" class="form-control" placeholder="Product Url">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <ul class="custom-control-group g-3 align-center">
                                <li>
                                    <div class="custom-control custom-control-sm custom-checkbox">
                                    <input type="checkbox" wire:model="publish" class="custom-control-input" id="com-email">
                                        <label class="custom-control-label" for="com-email">Publish</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                       
                        <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary" wire:loading.remove>Import</button>
                        <button class="btn btn-lg btn-primary" type="button" disabled wire:loading.delay>
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            <span>Loading...</span>
                        </button>
                            <!-- <button type="submit" class="btn btn-lg btn-primary">Import</button> -->
                        </div>
                    </form>
                </div>
      
            </div>
        </div>
    </div>

<?php $__env->startPush('scripts'); ?>
<script>
    console.log('Reloaded');

    document.addEventListener('livewire:load', function () {
        Livewire.on('close-modal', function () {
            $('#modalForm').modal('hide');
        });
    });
</script>
<?php $__env->stopPush(); ?>

</div>


<?php /**PATH /Users/touzani/Desktop/ecopy/ecopy.app/resources/views/livewire/account/shopify/single-product.blade.php ENDPATH**/ ?>