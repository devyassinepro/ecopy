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
                                            <h4 class="nk-block-title page-title">Browse our tools</h4>
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                    <div class="row g-gs">
                                        <div class="col-xxl-6">
                                            <div class="nk-download">
                                                <div class="data">
                                                    <div class="thumb"><img src="./images/icons/product-pp.svg" alt=""></div>
                                                    <div class="info">
                                                        <h6 class="title"><span class="name">Sales tracking</span></h6>
                                                        <div class="meta">
                                                            <span class="version">
                                                                <span class="text-soft">Version: </span> <span>1.3.1</span>
                                                            </span>
                                                            <span class="release">
                                                                <span class="text-soft">Status: </span> <span>Active</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                </div>
                                            </div><!-- .sp-pdl-item -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-6">
                                            <div class="nk-download">
                                                <div class="data">
                                                    <div class="thumb"><img src="./images/icons/product-ee.svg" alt=""></div>
                                                    <div class="info">
                                                        <h6 class="title"><span class="name">Current Trends (New)</span><span class="badge badge-dim bg-primary rounded-pill">New</span></h6>
                                                        <div class="meta">
                                                            <span class="version">
                                                                <span class="text-soft">Version: </span> <span>1.3.1</span>
                                                            </span>
                                                            <span class="release">
                                                                <span class="text-soft">Status: </span> <span>Active</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                </div>
                                            </div><!-- .sp-pdl-item -->
                                        </div><!-- .col -->
                                        <div class="col-xxl-6">
                                            <div class="nk-download">
                                                <div class="data">
                                                    <div class="thumb"><img src="./images/icons/product-cc.svg" alt=""></div>
                                                    <div class="info">
                                                        <h6 class="title"><span class="name">Competitors Research</span> <span class="badge badge-dim bg-primary rounded-pill">New</span></h6>
                                                        <div class="meta">
                                                            <span class="version">
                                                                <span class="text-soft">Version: </span> <span>1.7.2</span>
                                                            </span>
                                                            <span class="release">
                                                                <span class="text-soft">Status: </span> <span>Active</span>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="actions">
                                                </div>
                                            </div><!-- .sp-pdl-item -->
                                        </div><!-- .col -->

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