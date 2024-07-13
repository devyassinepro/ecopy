<?php $__env->startSection('title', '| Stores'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
      <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
       
        <div><h5>Store Name : <?php echo e($storedata->first()->name); ?></h5></div>
        <div><h6><?php echo e($storedata->first()->shopifydomain); ?></h6></div>
          <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
        <?php endif; ?>
        </main>
<!-- Dashboard Affiche Store Data -->
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-2 px-3">

  <div class="row my-4">

 <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card">
          <h5 class="card-header">Revenue</h5>
          <div class="card-body">
            <h5 class="card-title">$ <?php echo e(number_format($storesrevenue->first()->revenue, 2, ',', ' ')); ?></h5>
          </div>
        </div>
  </div>

  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card">
          <h5 class="card-header">Sales</h5>
          <div class="card-body">
            <h5 class="card-title"><?php echo e($storesrevenue->first()->sales); ?></h5>
          </div>
        </div>
  </div>
<?php if($storesrevenue->first()->products_sum_revenue != 0 ): ?>
  <div class="col-12 col-md-6 mb-4 mb-lg-0 col-lg-3">
      <div class="card">
          <h5 class="card-header">AOV</h5>
          <div class="card-body">
            <h5 class="card-title">$ <?php echo e(number_format($storesrevenue->first()->revenue / $storesrevenue->first()->sales, 2, ',', ' ')); ?></h5>
          </div>
        </div>
  </div>
<?php endif; ?>
  <div class="col-12 col-md-6 col-lg-3 mb-4 mb-lg-0">
      <div class="card">
          <h5 class="card-header">Products</h5>
          <div class="card-body">
            <h5 class="card-title"><?php echo e($storedata->first()->allproducts); ?></h5>
          </div>
        </div>
  </div>

  </div>
<!-- ENd Dashboard  -->
      <td><a  class="btn btn-success" href="<?php echo e(route('admin.stores.storeproducts',$storedata->first()->id)); ?>">All products</a></td>


</br></br>
<!-- Table >Top Products  -->
<h5 class="card-header">Top 10 Products</h5>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Start Traking</th>
                    <th>Title</th>
                    <th>Prix</th>
                    <th>Today</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>Weeklysales</th>
                    <th>Totalsales</th>
                    <th>Revenue</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e($product->url); ?>" target="_blank"><img src="<?php echo e($product->imageproduct); ?>" width="100" height="100"></a></td>
                        <td><?php echo e($product->created_at); ?></td>
                        <td><a href="<?php echo e(route('admin.product.show',$product->id)); ?>"><?php echo e($product->title); ?></a></td>
                        <td><?php echo e($product->prix); ?> $</td>
                        <td><?php echo e($product->todaysales); ?></td>
                        <td><?php echo e($product->yesterdaysales); ?></td>
                        <td><?php echo e($product->day3sales); ?></td>
                        <td><?php echo e($product->day4sales); ?></td>
                        <td><?php echo e($product->day5sales); ?></td>
                        <td><?php echo e($product->day6sales); ?></td>
                        <td><?php echo e($product->weeksales); ?></td>
                        <td><?php echo e($product->monthsales); ?></td>
                        <td>$ <?php echo e(number_format($product->revenue, 2, ',', ' ')); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            </table>
          </div>
          <div>
 
     </main>
        </div>
      
      </div>
    </div>
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/stores/show.blade.php ENDPATH**/ ?>