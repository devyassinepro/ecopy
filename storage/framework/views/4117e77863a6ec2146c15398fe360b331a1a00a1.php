<?php if (isset($component)) { $__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b = $component; } ?>
<?php $component = App\View\Components\AccountLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('account-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AccountLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <div class="d-none d-lg-block">
            <h1 class="h2 text-white"><?php echo e(__('My tickets')); ?></h1>
        </div>
     <?php $__env->endSlot(); ?>
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
<div class="card">
    <!-- Card header -->
    <div class="card-header">
        <!-- Title -->
        <h5 class="h3 mb-0">
            <?php echo e(__('My tickets')); ?>

        </h5>
        <br>
        <span class="float-right">
            <a href="<?php echo e(route('ticket.create')); ?>" class="btn btn-lg btn-primary">
                <i class="fas fa-plus"></i> <?php echo e(__('Create New Ticket')); ?>

            </a>
        </span>
    </div>
    <div class="card-body">
        <?php if($tickets->isEmpty()): ?>
                <h4 class="text-center"><?php echo e(__('You have not created any tickets.')); ?></h4>
                <?php else: ?>
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th><?php echo e(__('Category')); ?></th>
                                <th><?php echo e(__('Title')); ?></th>
                                
                                <th><?php echo e(__('Status')); ?></th>
                                <th><?php echo e(__('Last Updated')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <h5><?php echo e($ticket->category->name); ?></h5>
                                </td>
                                <td>
                                    <a href="<?php echo e(url('account/tickets/' . $ticket->ticket_id)); ?>">
                                        #<?php echo e($ticket->ticket_id); ?> - <?php echo e($ticket->title); ?>

                                    </a>
                                </td>
                                
                                <td>
                                    <span class="badge badge-dot mr-4">
                                        <?php if($ticket->status == "Open"): ?>
                                        <span class="badge badge-success"> <?php echo e($ticket->status); ?></span>
                                        <?php else: ?>
                                        <span class="badge badge-danger"> <?php echo e($ticket->status); ?></span>
                                        <?php endif; ?>
                                    </span>
                                </td>
                                <td>
                                    <?php echo e(\Carbon\Carbon::parse($ticket->updated_at)->diffForHumans()); ?>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php echo e($tickets->render()); ?>

                <?php endif; ?>
    </div>
</div>
</div>
    </div>
      </div>    
    </div>     

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b)): ?>
<?php $component = $__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b; ?>
<?php unset($__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b); ?>
<?php endif; ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/tickets/user_tickets.blade.php ENDPATH**/ ?>