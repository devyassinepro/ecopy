<?php if (isset($component)) { $__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b = $component; } ?>
<?php $component = App\View\Components\AccountLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('account-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AccountLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>

    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('account.dashboard', []);

$__html = app('livewire')->mount($__name, $__params, '9ax5Nyg', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b)): ?>
<?php $component = $__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b; ?>
<?php unset($__componentOriginal710d8bde111a6e196f50997eea459bbe24fe201b); ?>
<?php endif; ?><?php /**PATH /Users/touzani/Desktop/ecopy/resources/views/dashboard.blade.php ENDPATH**/ ?>