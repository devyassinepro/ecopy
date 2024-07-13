<?php $__env->startSection('title', '| Niches'); ?>

<?php $__env->startSection('content'); ?>
<div class="container-fluid">
  <div class="row">
        <main role="main" class="col-md-9 ml-sm-auto col-lg-12 pt-3 px-4">

          <h2>List Stores</h2>
          <a class="btn btn-success" href="<?php echo e(route('admin.dns.create')); ?>">Add Dns</a>

          <!-- <a class="btn btn-success" href="/exportstores">Export Stores</a> -->

        </br></br>
          <?php if($message = Session::get('success')): ?>
            <div class="alert alert-success">
                <p><?php echo e($message); ?></p>
            </div>
        <?php endif; ?>
        <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>DNS</th>
                    <th>Start Added</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $dnsall; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><a href="<?php echo e(route('admin.product.show',$dns->id)); ?>"><?php echo e($dns->url); ?></a></td>
                        <td><?php echo e($dns->url); ?></td>
                        <td><?php echo e($dns->created_at); ?></td>
                        <td><?php echo e($dns->status); ?></td>
                        <td>
                            <form action="<?php echo e(route('admin.dns.destroy',$dns->id)); ?>" method="Post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            </table>
          </div>

          <div>
        <?php echo e($dnsall->links()); ?>


        </div>
        </main>
      </div>
    </div>
    <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/admin/dns/index.blade.php ENDPATH**/ ?>