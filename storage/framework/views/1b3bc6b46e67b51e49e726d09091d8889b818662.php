<div class="nk-content ">
            <div class="container-fluid">
                            <div class="nk-content-inner">
                                <div class="nk-content-body">
                                    <div class="nk-block-head nk-block-head-sm"> 
                                    </div><!-- .nk-block-head -->
                                <div>
                            </div> 

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

                                        <div class="dropdown">
                                         <!-- Button to trigger the dropdown -->
                                            <a href="#" 
                                            class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" 
                                            data-bs-toggle="dropdown">
                                            <?php echo e($changestore ? $changestore : 'Change Store'); ?>

                                            </a>
                                            
                                            <!-- Dropdown menu -->
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <ul class="link-list-opt no-bdr">
                                                    <!-- Loop through each store and create a dropdown item -->
                                                    <!-- __BLOCK__ --><?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <a href="#" 
                                                            wire:click.prevent="changeStore('<?php echo e($store->store_id); ?>')" 
                                                            wire:model.live="changestore" 
                                                            class="<?php echo e($store->store_id == $activeStore ? 'active' : ''); ?>">
                                                            <span><?php echo e($store->name); ?> - <?php echo e($store->myshopify_domain); ?></span>
                                                            </a>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
                                                </ul>
                                            </div>
                                        </div>


                                            <a data-target="addProduct" class="toggle btn btn-primary d-none d-md-inline-flex"><em class="icon ni ni-plus"></em><span>Connect Shopify Store</span></a>

                                              
                                                </li>
                                                    
                                                </ul>
                                                </div>
                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                            </div>
    
<div class="nk-add-product toggle-slide toggle-slide-right" data-content="addProduct" data-toggle-screen="any" data-toggle-overlay="true" data-toggle-body="true" data-simplebar>
                                    <div class="nk-block-head">
                                        <div class="nk-block-head-content">
                                            <h5 class="nk-block-title">Connect Shopify Store</h5>

                                            <div class="center-container">
                                                <img src="assets/img/shopifyconnect.png" alt="Shopify Connect">
                                            </div>   
                                          
                                        </div>
                                    </div><!-- .nk-block-head -->
                                    <div class="nk-block">
                                        <div class="row g-3">
                                        <form wire:submit.prevent="savesecret" class="gy-3">

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="product-title">Your shop name / store URL</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text"  wire:model="urlshopify" class="form-control" id="site-name" placeholder="example.myshopify.com">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="category">Access token</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" wire:model="urltoken" class="form-control" id="site-name" placeholder="shpat_xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx">

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="tags">Api Key</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" wire:model="apikey" id="site-name" placeholder="Api key">

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label" for="tags">Api Secret</label>
                                                    <div class="form-control-wrap">
                                                        <input type="text" class="form-control" wire:model="apisecret" id="site-name" placeholder="Api Secret">
                                                    </div>
                                                </div>
                                            </div>
                                           -->
                                            <div class="col-12">
                                                <!-- <button class="btn btn-primary"><em class="icon ni ni-plus"></em><span>Add New</span></button> -->
                                                <button type="submit" class="btn btn-lg btn-primary">Connect Store</button>

                                            </div>
                                        </div>
                                        <div class="center-video">      
                                    <iframe width="300" height="300" src="https://www.youtube.com/embed/Nn9MEKO2Uek?start=41" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                </div>
                                    </div><!-- .nk-block -->
                                </div>
                       
                                <div wire:loading.delay>
                                <div style="display: flex; justify-content: center; align-items: center; background-color:black; position: fixed; top:0px;left:0px;z-index:9999;width:100% ;height:100%; opacity: .75;">
                                            <div class="la-square-jelly-box la-3x">
                                                <div></div>
                                                <div></div>
                                            </div>
                                </div>
                                
                        </div>  
            <!-- Test Content -->
<!-- content @e -->
<div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Product Importer</h3>
                        </div><!-- .nk-block-head-content -->
        <ul class="nav nav-tabs">
            <li class="nav-item active">
                <a class="nav-link" data-toggle="tab" href="#tabItem9"><em class="icon ni ni-grid-fill"></em><span>Import Product</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabItem6"><em class="icon ni ni-crosshair"></em><span>Import Store</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tabItem7"><em class="icon ni ni-setting"></em><span>Settings</span></a>
            </li>

        </ul>
        <div class="tab-content">
             
            <div class="tab-pane active" id="tabItem9">
            <form> </form>
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('account.shopify.single-product', []);

$__html = app('livewire')->mount($__name, $__params, '5UWXkhf', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
            <div class="tab-pane" id="tabItem6">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('account.shopify.multiple-products', []);

$__html = app('livewire')->mount($__name, $__params, 'TL1gXNv', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
            </div>
            <div class="tab-pane" id="tabItem7">
               
            <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">
                    <i class="fas fa-table"></i>
                    Shopify Stores
                  </h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th style="font-size: 18px; font-weight: bold;">Myshopify</th>
                          <th style="font-size: 18px; font-weight: bold;">Email</th>
                          <th style="font-size: 18px; font-weight: bold;">Name</th>
                          <th style="font-size: 18px; font-weight: bold;">Status</th>
                        </tr>
                      </thead>
                      <tbody>
                      <!-- __BLOCK__ --><?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>

                        <td style="font-size: 18px; font-weight: bold;"><?php echo e($store->myshopify_domain); ?></td>
                        <td style="font-size: 18px; font-weight: bold;"><?php echo e($store->email); ?></td>
                        <td style="font-size: 18px; font-weight: bold;"><?php echo e($store->name); ?></td>
                        <td style="font-size: 18px; font-weight: bold;"><?php echo e($store->status); ?></td>
     
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!-- __ENDBLOCK__ -->
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
            </div>
        </div>


    </div>

</div>

</div>
<?php /**PATH /Users/touzani/Desktop/ecopy/ecopy.app/resources/views/livewire/account/shopify/home.blade.php ENDPATH**/ ?>