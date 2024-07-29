<?php if (isset($component)) { $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015 = $component; } ?>
<?php $component = App\View\Components\GuestLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('guest-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\GuestLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<br><br>
<section class="all-news section-padding pt-50 blog bg-transparent style-3">
            <div class="container">
                <div class="blog-details-slider mb-100">
                    <div class="section-head text-center mb-60 style-5">
                        <h2 class="mb-20 color-000"> Privacy Policy</h2>
                        <small class="d-block date text">
                        </small>
                    </div>     <h2 class="title">
                    Refund Policy
                                        </h2>
            
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="d-flex small align-items-center justify-content-between mb-70 fs-12px">
                            <div class="l_side d-flex align-items-center">
                               
                        </div>

                        <div class="blog-content-info">
                            <div class="text mb-10 color-666">
               
        <div class="container py-12 py-md-15">



<p>Once you have purchase our digital services you won’t be eligible for a refund. This is because you have had access to our digital content. This service is a virtual digital product that cannot be returned and therefore is non refundable. All sales are final. By becoming a client you certify that you are well aware of this aspect and you cease any right to file for a refund after purchase.

.</p>

        <!-- /.container -->
						  </div>
            </section>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015)): ?>
<?php $component = $__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015; ?>
<?php unset($__componentOriginalc3251b308c33b100480ddc8862d4f9c79f6df015); ?>
<?php endif; ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/pages/RefundPolicy.blade.php ENDPATH**/ ?>