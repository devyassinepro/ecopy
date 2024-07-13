<?php $__env->startSection('content'); ?>
<div class="u-body">
    <!-- Doughnut Chart -->
    <div class="row mb-2 ml-2">
        <h1 class="h3 card-header-title"><?php echo e(__('Stripe Dashboard')); ?></h1>
    </div>
    <div class="row">
        <div class="col-sm-6 col-xl-6 mb-4">
            <div class="card">
                <div class="card-body media align-items-center px-xl-3">
                    <div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
                        <canvas class="js-doughnut-chart" width="70" height="70"
                                data-set="[65, 35]"
                                data-colors='[
              "#2972fa",
                                  "#f6f9fc"
                                ]'></canvas>

                        <div class="u-doughnut__label text-info">65</div>
                    </div>

                    <div class="media-body">
                        <h5 class="h6 text-muted text-uppercase mb-2">
                            Total Sales <i class="fa fa-arrow-up text-success ml-1"></i>
                        </h5>
                        <span class="h2 mb-0">$56,400</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-6 mb-4">
            <div class="card">
                <div class="card-body media align-items-center px-xl-3">
                    <div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
                        <canvas class="js-doughnut-chart" width="70" height="70"
                                data-set="[35, 65]"
                                data-colors='[
                                "#fab633",
                                  "#f6f9fc"
                                ]'></canvas>

                        <div class="u-doughnut__label text-warning">35</div>
                    </div>

                    <div class="media-body">
                        <h5 class="h6 text-muted text-uppercase mb-2">
                            Spendings <i class="fa fa-arrow-down text-danger ml-1"></i>
                        </h5>
                        <span class="h2 mb-0">$6,700</span>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
    <!-- End Doughnut Chart -->

    <!-- Overall Income -->
    <div class="card mb-4">
        <!-- Card Header -->
        <header class="card-header d-md-flex align-items-center">
            <h2 class="h3 card-header-title">Overall Income</h2>
        </header>
        <!-- End Card Header -->

        <!-- Card Body -->
        <div class="card-body">

        </div>
        <!-- End Card Body -->
    </div>
    <!-- End Overall Income -->

    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/stripe/index.blade.php ENDPATH**/ ?>