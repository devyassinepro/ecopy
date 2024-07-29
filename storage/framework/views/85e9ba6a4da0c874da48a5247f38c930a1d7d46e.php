<div class="container space-2 space-lg-3">
    <!-- Title -->
    <div class="mb-5 text-center w-md-80 w-lg-50 mx-md-auto mb-md-9">
        <h2><?php echo e(__('Tell us about yourself or your business')); ?></h2>
        <p><?php echo e(__('Whether you have questions or you would just like to say hello, contact us.')); ?></p>
    </div>
    <!-- End Title -->

    <div class="mx-auto w-lg-80">
        <!-- Contacts Form -->
        <form wire:submit.prevent="contactFormSubmit" action="/contact" method="POST" class="w-full">
            <?php echo csrf_field(); ?>
            <div class="row">
                <!-- Input -->
                <div class="mb-4 col-sm-6">
                    <div class="js-form-message">
                        <label class="input-label"><?php echo e(__('Your name')); ?></label>
                        <input type="text" wire:model.live="name" class="form-control contact-input white-input" name="name" placeholder="Jeff Fisher"
                            aria-label="Jeff Fisher" required="" data-msg="Please enter your name.">
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-1 text-red"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <!-- End Input -->

                <!-- Input -->
                <div class="mb-4 col-sm-6">
                    <div class="js-form-message">
                        <label class="input-label"><?php echo e(__('Your email address')); ?></label>
                        <input type="email" wire:model.live="email" class="form-control contact-input white-input" name="email" placeholder="jackwayley@gmail.com"
                            aria-label="jackwayley@gmail.com" required=""
                            data-msg="Please enter a valid email address.">
                    </div>
                </div>
                <!-- End Input -->

                <div class="w-100"></div>

                <!-- Input -->
                <div class="mb-4 col-sm-6">
                    <div class="js-form-message">
                        <label class="input-label"><?php echo e(__('Subject')); ?></label>
                        <input type="text" wire:model.live="subject" class="form-control contact-input white-input" name="subject" placeholder="Web design"
                            aria-label="Ecopy Subject" required="" data-msg="Please enter a subject.">
                    </div>
                </div>
                <!-- End Input -->

                <!-- Input -->
                <div class="mb-4 col-sm-6">
                    <div class="js-form-message">
                        <label class="input-label"><?php echo e(__('Your phone number')); ?></label>
                        <input type="number" wire:model.live="phone" class="contact-input white-input form-control" name="phone" placeholder="1-800-643-4500"
                            aria-label="1-800-643-4500" required="" data-msg="Please enter a valid phone number.">
                    </div>
                </div>
                <!-- End Input -->
            </div>

            <!-- Input -->
            <div class="mb-6 js-form-message">
                <label class="input-label"><?php echo e(__('How can we help you?')); ?></label>
                <div class="input-group">
                    <textarea class="form-control contact-input white-input" wire:model.live="comment" rows="4" name="text" placeholder="Hi there, I would like to ..."
                        aria-label="Hi there, I would like to ..." required=""
                        data-msg="Please enter a reason."></textarea>
                </div>
            </div>
            <!-- End Input -->

            <div class="text-center">
                <button type="submit" class="mt-2 btn btn-primary contact-submit"><?php echo e(__('Submit')); ?></button>
            </div>
        </form>
        <!-- End Contacts Form -->
    </div>
</div>
<?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/livewire/contact-form.blade.php ENDPATH**/ ?>