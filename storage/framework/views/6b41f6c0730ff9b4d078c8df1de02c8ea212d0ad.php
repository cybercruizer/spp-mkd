<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <i class="bi bi-patch-exclamation"></i>
            Data Tagihan <?php echo e($periode); ?>

        </h5>
        <table class="<?php echo e(config('app.table_style')); ?> mt-2">
            <thead class="<?php echo e(config('app.thead_style')); ?>">
                <tr>
                    <th width="1%;">No</th>
                    <th>Nama Tagihan</th>
                    <th class="text-end">Jumlah Tagihan</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tagihan->tagihanDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($item->nama_biaya); ?></td>
                        <td class="text-end"><?php echo e(formatRupiah($item->jumlah_biaya)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td colspan="2" class="fw-bold text-center">Total Tagihan</td>
                    <td class="fw-bold text-end"><?php echo e(formatRupiah($tagihan->total_tagihan)); ?></td>
                </tr>
            </tbody>
        </table>
        <a href="<?php echo e(route('invoice.show', $tagihan->id)); ?>" target="_blank">
            <i class="bi bi-file-earmark-arrow-down"></i> Download invoice
        </a>
    </div>
</div>
<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/components/user/tagihan_show/data_tagihan.blade.php ENDPATH**/ ?>