<div>
<form wire:submit.prevent="fetchProducts">
                                        <?php echo csrf_field(); ?>
                                        <div class="row g-3 align-center">
                                            <div class="col-lg-3">
                                                <div class="form-group">
                                                    <label class="form-label" for="url-store">Store URL</label>
                                                </div>
                                            </div>
                                            <div class="col-lg-5">
                                                <div class="form-group">
                                                    <div class="form-control-wrap">
                                                        <input type="text" id="url-store" wire:model="url" class="form-control" placeholder="Url Store">
                                                        <div><?php $__errorArgs = ['url'];
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


                                    <div>
    <!-- Input for store URL and fetch button -->

    <!-- Display fetched products with checkboxes for selection -->
    <!-- __BLOCK__ --><?php if($products): ?>
        <div>
        <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                   
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"></h3>
                                        </div>
                                        <!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                         
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">

                                                    <li>
                                                    <div class="form-control-wrap">
                                                        <button wire:click="addSelectedProducts" class="btn btn-lg btn-primary" wire:loading.remove>Add Selected Products</button>
                                                       
                                                    </div>                                                   
                                                     </li>
                                                    <li>
                                                    <div class="form-control-wrap">
                                                        <button wire:click="selectAllProducts" class="btn btn-lg btn-primary" wire:loading.remove>Add All Products</button>
                                                      
                                                    </div>                                                   
                                                     </li>
                                                </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
</div>
            <div class="nk-block">
                                    <div class="nk-tb-list is-separate is-medium mb-3">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;">
                                            <input type="checkbox" wire:model="selectedProducts" value="all"> Select All
                                        </div>
                                            <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Name</span></div>
                                            <div class="nk-tb-col tb-col-md" style="font-size: 16px; font-weight: bold;"><span>Price</span></div>        
                                            <!-- <div class="nk-tb-col" style="font-size: 16px; font-weight: bold;"><span>Expand</span></div> -->
                                        </div><!-- .nk-tb-item -->

                                         <!-- __BLOCK__ --><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div class="nk-tb-item">
                                                    <div class="nk-tb-col">
                                                    <input type="checkbox" wire:model="selectedProducts" value="<?php echo e($product->id); ?>"> </div>
                                                    <div class="nk-tb-col">  <!-- __BLOCK__ --><?php if(isset($product->images) && count($product->images) > 0): ?>
                                                        <img src="<?php echo e($product->images[0]->src); ?>" alt="<?php echo e($product->title); ?>" style="width: 50px; height: auto;">
                                                    <?php else: ?>
                                                        <img src="path/to/default-image.jpg" alt="No Image" style="width: 50px; height: auto;">
                                                    <?php endif; ?> <!-- __ENDBLOCK__ -->
                                                    <?php echo e($product->title); ?></div>
                                                    <div class="nk-tb-col tb-col-sm"> <h6 style="font-size: 16px; font-weight: bold;">$ <?php echo e($product->variants[0]->price); ?></h6> 
                                                    </div>
                                                </div><!-- .nk-tb-item -->
                                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
                                            </div><!-- .nk-tb-list -->
                                                    <!-- .pagination Start -->

                  
        </div>

<!-- Buttons  -->

<div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                   
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title"></h3>
                                        </div>
                                        <!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                         
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">

                                                    <li>
                                                    <div class="form-control-wrap">
                                                        <button wire:click="addSelectedProducts" class="btn btn-lg btn-primary" wire:loading.remove>Add Selected Products</button>
                                                        <button class="btn btn-lg btn-primary" type="button" disabled wire:loading.delay>
                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            <span>Loading...</span>
                                                        </button>
                                                    </div>                                                   
                                                     </li>
                                                    <li>
                                                    <div class="form-control-wrap">
                                                        <button wire:click="selectAllProducts" class="btn btn-lg btn-primary" wire:loading.remove>Add All Products</button>
                                                        <button class="btn btn-lg btn-primary" type="button" disabled wire:loading.delay>
                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            <span>Loading...</span>
                                                        </button>
                                                    </div>                                                   
                                                     </li>
                                                </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
</div>

                                          <!-- <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label"></label>
                                                    <div class="form-control-wrap">
                                                        <button wire:click="addSelectedProducts" class="btn btn-lg btn-primary" wire:loading.remove>Add Selected Products</button>
                                                        <button class="btn btn-lg btn-primary" type="button" disabled wire:loading.delay>
                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            <span>Loading...</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="form-label"></label>
                                                    <div class="form-control-wrap">
                                                        <button wire:click="selectAllProducts" class="btn btn-lg btn-primary" wire:loading.remove>Add All Products</button>
                                                        <button class="btn btn-lg btn-primary" type="button" disabled wire:loading.delay>
                                                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                                            <span>Loading...</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div> -->
        <!-- <button wire:click="addSelectedProducts">Add Selected Products to Shopify</button> -->
    <?php endif; ?> <!-- __ENDBLOCK__ -->

    <!-- Display messages -->
    <!-- __BLOCK__ --><?php if(session()->has('message')): ?>
        <div><?php echo e(session('message')); ?></div>
    <?php endif; ?> <!-- __ENDBLOCK__ -->
</div>
</div>
<?php /**PATH /Users/touzani/Desktop/ecopy/ecopy.app/resources/views/livewire/account/shopify/multiple-products.blade.php ENDPATH**/ ?>