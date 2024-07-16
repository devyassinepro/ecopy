<?php if(session()->has('livewire-alert')): ?>
    <script type="module">
        flashAlert(<?php echo json_encode(session('livewire-alert'), 15, 512) ?>)
    </script>
<?php endif; ?><?php /**PATH /Users/touzani/Desktop/ecopy/vendor/jantinnerezo/livewire-alert/src/../resources/views/components/flash.blade.php ENDPATH**/ ?>