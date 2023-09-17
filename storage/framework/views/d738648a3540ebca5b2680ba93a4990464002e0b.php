<tr>
    <td class="title" width="80" style="margin-bottom: 0; padding-bottom: 0;">

        <?php if(request('output') == 'pdf'): ?>
            <img src="<?php echo e(storage_path() . '/app/' . settings()->get('app_logo')); ?>" alt="" width="70">
        <?php else: ?>
            <img src="<?php echo e(\Storage::url(settings()->get('app_logo'))); ?>" alt="" width="70">
        <?php endif; ?>

    </td>
    <td style="text-align:left; vertical-align:middle;">
        <div style="font-size:20px; font-weight:bold"><?php echo e(settings()->get('app_name', 'MYAPP')); ?>

        </div>
        <div>
            <?php echo e(settings()->get('app_address', 'MYAPP')); ?>

        </div>
    </td>
</tr>
<tr>
    <td colspan="3">
        <hr>
    </td>
</tr>
<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/components/header_invoice_kartu.blade.php ENDPATH**/ ?>