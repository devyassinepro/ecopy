<?php $__env->startSection('content'); ?>
<div class="u-body">
    <!-- Doughnut Chart -->
    <div class="row">
        <div class="col-sm-6 col-xl-3 mb-4">
            <div class="card">
                <div class="card-body media align-items-center px-xl-3">
                    <div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
                        <i class="fa fa-user icon"></i>
                    </div>

                    <div class="media-body">
                        <h5 class="h6 text-muted text-uppercase mb-2">
                            <?php echo e(__('Total Users')); ?> <i class="fa fa-arrow-up text-success ml-1"></i>
                        </h5>
                        <span class="h1 mb-0"><?php echo e($user_count); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4">
            <div class="card">
                <div class="card-body media align-items-center px-xl-3">
                    <div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
                        <i class="fas fa-ticket-alt icon"></i>
                    </div>
                    <div class="media-body">
                        <h5 class="h6 text-muted text-uppercase mb-2">
                            <?php echo e(__('New Tickets')); ?> <i class="fa fa-arrow-down text-danger ml-1"></i>
                        </h5>
                        <span class="h2 mb-0"><?php echo e($newTicket); ?></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3 mb-4">
            <div class="card">
                <div class="card-body media align-items-center px-xl-3">
                    <div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
                        <i class="fas fa-receipt icon"></i>
                    </div>

                    <div class="media-body">
                        <h5 class="h6 text-muted text-uppercase mb-2">
                            <?php echo e(__('Total subscribers')); ?> <i class="fa fa-arrow-up text-success ml-1"></i>
                        </h5>
                        <span class="h2 mb-0"><?php echo e($total_subscription); ?></span>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-3 mb-4">
            <div class="card">
                <div class="card-body media align-items-center px-xl-3">
                    <div class="u-doughnut u-doughnut--70 mr-3 mr-xl-2">
                        <i class="fa fa-users icon"></i>
                    </div>

                    <div class="media-body">
                        <h5 class="h6 text-muted text-uppercase mb-2">
                            <?php echo e(__('Teams')); ?> <i class="fa fa-arrow-up text-danger ml-1"></i>
                        </h5>
                        <span class="h2 mb-0"><?php echo e($team_count); ?></span>
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
            <h2 class="h3 card-header-title"><?php echo e(__('Statistics')); ?></h2>
        </header>
        <!-- End Card Header -->

        <!-- Card Body -->
        <div class="card-body">
            <div id="chart">
                <h1><?php echo e($chart1->options['chart_title']); ?></h1>
                <?php echo $chart1->renderHtml(); ?>

            </div>
        </div>
        <!-- End Card Body -->
    </div>
    <!-- End Overall Income -->


</div>
<?php $__env->stopSection(); ?>
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
   
    <?php echo $chart1->renderChartJsLibrary(); ?>

    <?php echo $chart1->renderJs(); ?>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/ecopy.app/resources/views/admin/index.blade.php ENDPATH**/ ?>