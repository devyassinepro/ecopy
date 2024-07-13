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
            <h4 class="mb-0 text-info">#<?php echo e($ticket->ticket_id); ?> - <?php echo e($ticket->title); ?></h4>
        </div>
        <!-- Card body -->
        <div class="card-body">
            <div class="ticket-info">
                <blockquote class="blockquote">
                    <p><?php echo e($ticket->message); ?></p>
                    <footer class="blockquote-footer" style="font-size:14px;">
                        <?php echo e(__('Category')); ?>: <strong><?php echo e($ticket->category->name); ?></strong> |
                        <span>
                            <?php if($ticket->status == "Open"): ?>
                            <?php echo e(__('Status')); ?>: <span class="badge badge-success"> <?php echo e($ticket->status); ?></span>
                            <?php else: ?>
                            <?php echo e(__('Status')); ?>: <span class="badge badge-danger"> <?php echo e($ticket->status); ?></span>
                            <?php endif; ?>
                        </span> |
                        <cite><?php echo e(__('Created')); ?> : <?php echo e($ticket->created_at->diffForHumans()); ?></cite>
                    </footer>
                </blockquote>
            </div>
            <hr>
            <?php echo $__env->make('tickets.comments', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <hr>
            <?php echo $__env->make('tickets.reply', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <form action="<?php echo e(route('ticket.close_by_user')); ?>" method="POST" class="form">
                <?php echo e(method_field('POST')); ?>

                <?php echo csrf_field(); ?>


                <input type="hidden" name="ticket_id" value="<?php echo e($ticket->ticket_id); ?>">
                
                <?php if($ticket->status == 'Open'): ?>
                    <button type="submit" class="btn btn-danger mt-2">Close Ticket <i class="fas fa-times-circle"></i> </button> 
                <?php endif; ?>

            </form>
        </div>
</div>
</div>
    </div>
      </div>    
    </div>    

<?php $__env->startPush('styles'); ?>
    <style>
        .bg-gradient-primary{
            background-color: #22335b61;
            border: 0.0825rem solid #e7eaf3
        }
    </style>
<?php $__env->stopPush(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b)): ?>
<?php $component = $__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b; ?>
<?php unset($__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b); ?>
<?php endif; ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/tickets/show.blade.php ENDPATH**/ ?>