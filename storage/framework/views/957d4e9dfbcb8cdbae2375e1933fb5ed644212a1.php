<div class="d-flex flex-wrap">
    <div class="wrapper">
        <?php if(request('output') == 'pdf'): ?>
            <img src="<?php echo e(storage_path() . '/app/' . settings()->get('app_logo')); ?>" alt="" width="70"
                class="mt-3 mb-1">
        <?php else: ?>
            <img src="<?php echo e(\Storage::url(settings()->get('app_logo'))); ?>" alt="" width="70" class="mt-3 mb-1">
        <?php endif; ?>
    </div>
    <div class="wrapper px-3 py-2 flex-fill">
        <div class="fw-bold fs-3"><?php echo e(settings()->get('app_name', 'My App')); ?></div>
        <div><?php echo e(settings()->get('app_address')); ?></div>
    </div>
    <div class="wrapper align-self-end">
        <div class=""> Email: <?php echo e(settings()->get('app_email')); ?></div>
        <div class=""> Telp: <?php echo e(settings()->get('app_phone')); ?></div>
    </div>
</div>
<hr>
<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/kepala_sekolah/laporan_header.blade.php ENDPATH**/ ?>