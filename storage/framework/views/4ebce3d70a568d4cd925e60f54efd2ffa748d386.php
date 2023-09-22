<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header fw-bold fs-5" style="color: #012970;">DATA SISWA</h5>

                <div class="card-body">
                    <div class="table-responsive mt-3">
                        <table class="<?php echo e(config('app.table_style')); ?>">
                            <thead class="<?php echo e(config('app.thead_style')); ?>">
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama Siswa</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th>Angkatan</th>
                                    <th class="text-center">Kartu SPP</th>
                                    <th class="text-end">Biaya SPP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td>
                                            <div><?php echo e($item->nama); ?></div>
                                            <div><?php echo e($item->nisn); ?></div>
                                        </td>
                                        <td><?php echo e($item->jurusan); ?></td>
                                        <td><?php echo e($item->kelas); ?></td>
                                        <td><?php echo e($item->angkatan); ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo e(route('kartuspp.index', [
                                                'siswa_id' => $item->id,
                                                'tahun' => date('Y'),
                                                'bulan' => date('m'),
                                            ])); ?>"
                                                target="_blank">
                                                <i class="bi bi-file-earmark-arrow-down"></i>
                                                <span class="d-md-inline d-none">Download</span>
                                            </a>
                                        </td>
                                        <td class="text-end">
                                            <a href="<?php echo e(route('wali.siswa.show', $item->id)); ?>">
                                                <?php echo e(formatRupiah($item->biaya->total_tagihan)); ?>

                                                <i class="bi bi-arrow-right-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="8" class="fw-bold text-center">Tidak ada data</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Data Siswa'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/wali/siswa_index.blade.php ENDPATH**/ ?>