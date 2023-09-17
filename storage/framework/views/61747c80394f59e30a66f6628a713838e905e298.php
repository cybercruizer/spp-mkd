<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <i class="bi bi-patch-exclamation"></i>
            Kartu SPP <?php echo e(getTahunAjaranFull(request('bulan'), request('tahun'))); ?>

        </h5>
        <table class="<?php echo e(config('app.table_style')); ?>">
            <thead class="<?php echo e(config('app.thead_style')); ?>">
                <tr>
                    <th style="text-align: center" width="1%;">No</th>
                    <th style="text-align: start">Bulan</th>
                    <th style="text-align: end">Jumlah Tagihan</th>
                    <th style="text-align: center">Tanggal Bayar</th>
                    
                </tr>
            </thead>
            <?php $__currentLoopData = $kartuSpp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="item">
                    <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                    <td style="text-align: start"><?php echo e($item['bulan'] . ' ' . $item['tahun']); ?></td>
                    <td style="text-align: end"><?php echo e(formatRupiah($item['total_tagihan'])); ?></td>
                    <td style="text-align: center"><?php echo e($item['tanggal_bayar']); ?></td>
                    
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
        <a href="<?php echo e(route('kartuspp.index', [
            'siswa_id' => $siswa->id,
            'tahun' => request('tahun'),
            'bulan' => request('bulan'),
        ])); ?>"
            class="mt-3" target="_blank">
            <i class="fa fa-print"></i>
            Cetak Kartu SPP
        </a>
    </div>
</div>
<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/components/user/tagihan_show/data_kartuspp.blade.php ENDPATH**/ ?>