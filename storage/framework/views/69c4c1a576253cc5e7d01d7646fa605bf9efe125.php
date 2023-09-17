<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header fw-bold fs-5" style="color: #012970;"><?php echo e($title); ?></h5>
                <div class="card-body mt-3">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                                <tr>
                                    <td width="15%">ID</td>
                                    <td>: <?php echo e($model->id); ?></td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>: <?php echo e($model->name); ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>: <?php echo e($model->email); ?></td>
                                </tr>
                                <tr>
                                    <td>No HP</td>
                                    <td>: <?php echo e($model->nohp); ?></td>
                                </tr>
                                <tr>
                                    <td>Tgl Dibuat</td>
                                    <td>: <?php echo e($model->created_at->format('d/m/Y H:i')); ?></td>
                                </tr>
                                <tr>
                                    <td>Tgl Diubah</td>
                                    <td>: <?php echo e($model->updated_at->format('d/m/Y H:i')); ?></td>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="bi bi-patch-exclamation"></i>
                        Tambah Data Anak
                    </h4>
                    <?php echo Form::open(['route' => auth()->user()->akses . '.walisiswa.store', 'method' => 'POST']); ?>

                    <?php echo Form::hidden('wali_id', $model->id, []); ?>

                    <div class="form-group">
                        <label for="siswa_id" class="form-label">Pilih Data Siswa</label>
                        <?php echo Form::select('siswa_id', $siswa, null, ['class' => 'form-control select2', 'required' => 'required']); ?>

                    </div>
                    <?php echo Form::submit('SIMPAN', ['class' => 'btn btn-primary btn-sm mt-3']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h4 class="card-title">
                        <i class="bi bi-patch-exclamation"></i>
                        Data Anak
                    </h4>
                    <div class="table-responsive">
                        <table class="<?php echo e(config('app.table_style')); ?>">
                            <thead class="<?php echo e(config('app.thead_style')); ?>">
                                <tr>
                                    <th width="1%;">No</th>
                                    <th>Nisn</th>
                                    <th>Nama</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $model->siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->nisn); ?></td>
                                        <td><?php echo e($item->nama); ?></td>
                                        <td class="text-center">
                                            <?php echo Form::open([
                                                'route' => [auth()->user()->akses . '.walisiswa.update', $item->id],
                                                'method' => 'PUT',
                                                'onsubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                                            ]); ?>

                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash d-md-inline d-none"></i> Hapus
                                            </button>
                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td class="text-center fw-bold" colspan="4">Tidak ada data</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Detail Wali Murid'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/wali_show.blade.php ENDPATH**/ ?>