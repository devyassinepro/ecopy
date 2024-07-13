<?php $__env->startSection('title', '| Stores'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
      <div class="row">

        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">
        <div><h2>View Products</h2></div>
        <div><h5>Store Name : <?php echo e($storedata->first()->name); ?></h5></div>
   
          <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
        <?php endif; ?>

        <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
      Filtres
      </button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Filtres</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo e(route('admin.product.index')); ?>" method="GET">
          <!-- <h3>Advanced Search</h3><br> -->
          <input type="text" name="title" class="form-control" placeholder="Title"><br>
          <label>Price Range</label>
          <div class="input-group">
          <input type="text" name="min_prix" class="form-control" placeholder="Start price">
          <input type="text" name="max_prix" class="form-control" placeholder="End of Price">
          </div><br>
          <label>Revenue Range</label>
          <div class="input-group">
          <input type="text" name="min_revenue" class="form-control" placeholder="Start revenue">
          <input type="text" name="max_revenue" class="form-control" placeholder="End of revenue">
          </div><br>
          <label>Totalsales Range</label>
          <div class="input-group">
          <input type="text" name="min_sales" class="form-control" placeholder="Start sales">
          <input type="text" name="max_sales" class="form-control" placeholder="End of sales">
          </div><br>
          <label>Ordre By</label>
          <select  class="form-control" name="ordreby" >
          <option value="revenue">Revenue</option>
          <option value="totalsales">Total Sales</option>
          <option value="todaysales">Best Selling Today</option>
          <option value="sales2">Best Selling Yesterday</option>
         </select>         

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" value="Search" class="btn btn-secondary">
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
      </form>
    </div>
  </div>
</div>
        <div>       
        </div>
</br></br>

          <div class="table-responsive">
            <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Prix</th>
                    <th>Today</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                    <th>6</th>
                    <th>Weeklysales</th>
                    <th>Monthlysales</th>
                    <!-- <th>Monthlysales</th> -->
                    <th>Totalsales</th>
                    <th>Revenue</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e($product->url); ?>" target="_blank"><img src="<?php echo e($product->imageproduct); ?>" width="150" height="150"></a></td>
                        <td><a href="<?php echo e(route('admin.product.show',$product->id)); ?>"><?php echo e($product->title); ?></a></td>
                        <td><?php echo e($product->prix); ?> $</td>
                        <td><?php echo e($product->todaysales); ?></td>
                        <td><?php echo e($product->yesterdaysales); ?></td>
                        <td><?php echo e($product->day3sales); ?></td>
                        <td><?php echo e($product->day4sales); ?></td>
                        <td><?php echo e($product->day5sales); ?></td>
                        <td><?php echo e($product->day6sales); ?></td>
                        <td><?php echo e($product->weeklysales); ?></td>
                        <td><?php echo e($product->montlysales); ?></td>
                        <td><?php echo e($product->totalsales); ?></td>
                        <td><?php echo e(number_format($product->revenue, 2, ',', ' ')); ?> $</td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            </table>
          </div>
          <div>
        <?php echo e($products->links()); ?>



        </div>
        </main>
      </div>
    </div>
    
    
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/stores/storeproducts.blade.php ENDPATH**/ ?>