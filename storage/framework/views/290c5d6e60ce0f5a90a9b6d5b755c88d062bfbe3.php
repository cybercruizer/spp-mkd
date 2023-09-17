<div class="card">
    <h5 class="card-header fw-bold fs-5" style="color: #012970;">DATA TAGIHAN <?php echo e(strtoupper($tagihan->jenis)); ?> SISWA
        <?php echo e(strtoupper($periode)); ?>

    </h5>
    <div class="card-body">
        <table class="table">
            <tr>
                <td rowspan="8" width="100">
                    <img src="<?php echo e(\Storage::url($siswa->foto ?? 'images/no-image.png')); ?>" alt="<?php echo e($siswa->nama); ?>"
                        width="120" class="my-3">
                </td>
            </tr>
            <tr>
                <td width="120">NIS</td>
                <td>: <?php echo e($siswa->nisn); ?></td>
            </tr>
            <tr>
                <td>NAMA</td>
                <td>: <?php echo e($siswa->nama); ?></td>
            </tr>
            <tr>
                <td>Kelas</td>
                <td>: <?php echo e($siswa->kelas); ?> <?php echo e($siswa->rombel); ?></td>
            </tr>
            <tr>
                <td>KATEGORI</td>
                <td>: <span class="badge bg-warning fw-bold"><?php echo e($siswa->kategori); ?></span></td>
            </tr>
            <tr>
                <td>TAGIHAN</td>
                <td>: <?php echo e($tagihan->biaya->nama); ?></td>
            </tr>
        </table>
    </div>
</div>
<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/components/user/tagihan_show/data_siswa.blade.php ENDPATH**/ ?>