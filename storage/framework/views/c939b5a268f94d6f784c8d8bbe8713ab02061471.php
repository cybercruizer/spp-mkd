<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header fw-bold fs-5" style="color: #012970;"><?php echo e($title); ?></h5>

                <div class="card-body">
                    <div class="table-responsive">
                        <img src="<?php echo e(\Storage::url($model->foto ?? 'images/nouser.png')); ?>" width="150" class="my-3">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <td width="15%">Status Siswa</td>
                                    <td>:
                                        <span class="badge <?php echo e($model->status == 'aktif' ? 'bg-success' : 'bg-danger'); ?>">
                                            <?php echo e($model->status); ?>

                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>: <?php echo e($model->nama); ?></td>
                                </tr>
                                <tr>
                                    <td>NISN</td>
                                    <td>: <?php echo e($model->nisn); ?></td>
                                </tr>
                                <tr>
                                    <td>Jurusan</td>
                                    <td>: <?php echo e($model->jurusan); ?></td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>: <?php echo e($model->kelas); ?></td>
                                </tr>
                                <tr>
                                    <td>Angkatan</td>
                                    <td>: <?php echo e($model->angkatan); ?></td>
                                </tr>
                                <tr>
                                    <td>Dibuat Oleh</td>
                                    <td>: <?php echo e($model->user->name); ?></td>
                                </tr>
                            </thead>
                        </table>
                        <h5 class="card-title">
                            <i class="bi bi-patch-exclamation"></i>
                            Tagihan SPP
                        </h5>
                        <div class="col-xxl-6">
                            <table class="<?php echo e(config('app.table_style')); ?>">
                                <thead class="<?php echo e(config('app.thead_style')); ?>">
                                    <tr>
                                        <th width="1%">No</th>
                                        <th>Item Tagihan</th>
                                        <th class="text-end">Jumlah Tagihan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__empty_1 = true; $__currentLoopData = $model->biaya->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration); ?></td>
                                            <td><?php echo e($item->nama); ?></td>
                                            <td class="text-end"><?php echo e(formatRupiah($item->jumlah)); ?></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <tr>
                                            <td colspan="3" class="text-center fw-bold">Data Tidak Ada</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <td colspan="2" class="text-center fw-bold">Total Tagihan</td>
                                    <td class="text-end fw-bold">
                                        <?php echo e(formatRupiah($model->biaya->children->sum('jumlah'))); ?>

                                    </td>
                                </tfoot>
                            </table>
                        </div>

                        <a href="<?php echo e(route(auth()->user()->akses . '.status.update', ['model' => 'siswa', 'id' => $model->id, 'status' => $model->status == 'aktif' ? 'non-aktif' : 'aktif'])); ?>"
                            class="btn btn-<?php echo e($model->status == 'aktif' ? 'danger' : 'success'); ?> btn-sm mt-3"
                            onclick='return confirm("anda yakin?")'>
                            <?php echo e($model->status == 'aktif' ? 'Non Aktifkan Siswa Ini' : 'Aktifkan Siswa Ini'); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Detail Siswa'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/siswa_show.blade.php ENDPATH**/ ?>