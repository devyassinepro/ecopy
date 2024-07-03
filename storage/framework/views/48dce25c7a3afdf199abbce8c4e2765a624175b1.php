<div class="nk-content">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
<br>
                    <div class="nk-block">
                        <!-- __BLOCK__ --><?php if(!currentTeam()->subscribed()): ?>                  
                        <div class="alert alert-icon alert-warning" role="alert">
                            <em class="icon ni ni-alert-circle"></em> 
                            <strong>Welcome to Weenify.</strong> Visit the <a href="<?php echo e(route('subscription.plans')); ?>">billing page</a> to activate a Trial plan.
                        </div>
                        <?php endif; ?> <!-- __ENDBLOCK__ -->

                    </div>                              
                            <div class="alert alert-pro alert-primary">

                                    <div class="user-toggle">
                                            <div class="user-avatar lg">
                                            <img alt="Image placeholder" src="<?php echo e(Auth::user()->profile_photo_url); ?>">
                                          </div>
                                    
                                    <div class="user-info">
                                    <h3 class="nk-block-title page-title">Welcome Back, <?php echo e(Auth::user()->name); ?>!</h3>
                                        <h6>Here’s an overview of your account </h6>
                                    </div>
                             </div>
                             </div>

                                <div class="nk-block">

                                </div><!-- .nk-block -->

                            <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h4 class="nk-block-title page-title">Stores : <?php echo e($totalstores); ?> / <?php echo e($storelimit); ?></h4>
                                        </div><!-- .nk-block-head-content -->

                                        <a href="<?php echo e(route('account.wizard.index')); ?>" wire:navigate class="toggle btn btn-primary"><em class="icon ni ni-plus"></em><span>Connect Shopify Store</span></a>

                                    </div><!-- .nk-block-between -->
                                    <br> </br>
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                             
                                                        <div class="row">
                                                    <div class="col-md-12 grid-margin stretch-card">
                                                    <div class="card">
                                                        <div class="card-body">
                                                        
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                            <thead>
                                                                <tr>
                                                                <th style="font-size: 18px; font-weight: bold;">Myshopify</th>
                                                                <th style="font-size: 18px; font-weight: bold;">Email</th>
                                                                <th style="font-size: 18px; font-weight: bold;">Name</th>
                                                                <th style="font-size: 18px; font-weight: bold;">Status</th>
                                                                <th style="font-size: 18px; font-weight: bold;">Connected</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <!-- __BLOCK__ --><?php $__currentLoopData = $stores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $store): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>

                                                                <td style="font-size: 18px; font-weight: bold;"><?php echo e($store->myshopify_domain); ?></td>
                                                                <td style="font-size: 18px; font-weight: bold;"><?php echo e($store->email); ?></td>
                                                                <td style="font-size: 18px; font-weight: bold;"><?php echo e($store->name); ?></td>
                                                                <td style="font-size: 18px; font-weight: bold;"><?php echo e($store->status); ?></td>
                                                                <td style="font-size: 18px; font-weight: bold;">Connected</td>

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
        <!-- Table >Top Products  -->
        <!-- Affiche //// -->


            </div>
                </div>
            </div>    
</div>     

<?php $__env->startPush('styles'); ?>
    <style>
        .icon{
            font-size:26px;
            color:slategrey;
        }
        .u-doughnut--70 {
            width: 40px;
            height: 50px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('scripts'); ?>
 <!-- Charting library -->
   <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
   <!-- Chartisan -->
   <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
<?php $__env->stopPush(); ?>

<?php /**PATH /Users/touzani/Desktop/ecopy/ecopy.app/resources/views/livewire/account/dashboard.blade.php ENDPATH**/ ?>