Mengetahui,
<?php if(settings('pj_ttd') != null && Storage::exists(settings('pj_ttd'))): ?>
    <?php if(request('output') == 'pdf'): ?>
        <div>
            <img src="<?php echo e(storage_path() . '/app/' . settings()->get('pj_ttd')); ?>" alt="" width="130">
        </div>
    <?php else: ?>
        <div>
            <img src="<?php echo e(Storage::url(settings()->get('pj_ttd'))); ?>" alt="" width="130">
        </div>
    <?php endif; ?>
<?php else: ?>
    <br>
    <br>
    <br>
<?php endif; ?>
<div>
    <?php echo e(settings()->get('pj_jabatan')); ?>

</div>
<div>
    <?php echo e(settings()->get('pj_nama')); ?>

</div>
<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/components/informasi_pj.blade.php ENDPATH**/ ?>