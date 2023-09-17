<?php if(auth()->user()->akses == 'operator'): ?>
    <?php $__env->startSection('js'); ?>
        <script>
            function checkVerificationCode() {
                // Meminta pengguna untuk memasukkan kode verifikasi
                const verificationCode = prompt("Masukkan kode verifikasi untuk melanjutkan:");

                // Memeriksa apakah kode verifikasi valid
                if (verificationCode === '1234') {
                    // Kode verifikasi benar, mengizinkan aksi standar
                    return true;
                } else {
                    // Kode verifikasi salah, tampilkan pesan error dan membatalkan aksi standar
                    alert('Kode verifikasi salah. Silakan coba lagi!');
                    return false;
                }
            }
        </script>
    <?php $__env->stopSection(); ?>
<?php endif; ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header fw-bold" style="color: #012970;">FORM DATA BIAYA</h5>
                <div class="card-body">
                    <?php echo Form::model($model, ['route' => $route, 'method' => $method, 'files' => true]); ?>

                    <?php if(request()->filled('parent_id')): ?>
                        <h4 class="card-title">
                            <i class="bi bi-patch-exclamation"></i>
                            Informasi <?php echo e($parentData->nama); ?>

                        </h4>
                        <?php echo Form::hidden('parent_id', $parentData->id, []); ?>

                        <div class="row">
                            <div class="col-xxl-6">
                                <table class="<?php echo e(config('app.table_style')); ?>">
                                    <thead class="<?php echo e(config('app.thead_style')); ?>">
                                        <tr>
                                            <th width="1%;">Parent ID</th>
                                            <th>Nama Biaya</th>
                                            <th>Jumlah</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__empty_1 = true; $__currentLoopData = $parentData->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr>
                                                <td><?php echo e($loop->iteration); ?></td>
                                                <td><?php echo e($item->nama); ?></td>
                                                <td><?php echo e(formatRupiah($item->jumlah)); ?></td>
                                                <td class="text-center">
                                                    <a href="<?php echo e(route(auth()->user()->akses . '.biaya.edit', $item->id)); ?>"
                                                        class="btn btn-sm btn-warning my-1 my-md-0"
                                                        <?php if(auth()->user()->akses == 'operator'): ?> onclick="return checkVerificationCode()" <?php endif; ?>>
                                                        <i class="bi bi-pencil-square d-md-inline d-none"></i>
                                                        Edit
                                                    </a>
                                                    <a href="<?php echo e(route(auth()->user()->akses . '.delete-biaya.item', $item->id)); ?>"
                                                        class="btn btn-danger btn-sm"
                                                        <?php if(auth()->user()->akses == 'operator'): ?> onclick="return checkVerificationCode()" <?php else: ?>
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')" <?php endif; ?>>
                                                        <i class="bi bi-trash d-md-inline d-none"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <tr>
                                                <td colspan="5" class="text-center fw-bold">Tidak ada data</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="form-group mt-3">
                        <label for="nama" class="form-label">Nama Biaya</label>
                        <?php echo Form::text('nama', null, ['class' => 'form-control', 'autofocus', 'required']); ?>

                        <small class="text-danger"><?php echo e($errors->first('nama')); ?></small>
                    </div>
                    <?php if(request('parent_id') == null): ?>
                        <?php echo Form::hidden('jumlah', $model->jumlah ?? 0, []); ?>

                    <?php else: ?>
                        <div class="form-group mt-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            <?php echo Form::text('jumlah', null, [
                                'class' => 'form-control rupiah',
                                'required' => 'required',
                            ]); ?>

                            <small class="text-danger"><?php echo e($errors->first('jumlah')); ?></small>
                        </div>
                    <?php endif; ?>
                    <?php if(auth()->user()->akses == 'operator'): ?>
                        <?php echo Form::submit($button, [
                            'class' => 'btn btn-primary pull-right mt-3',
                            'onclick' => 'return checkVerificationCode()',
                        ]); ?>

                    <?php else: ?>
                        <?php echo Form::submit($button, [
                            'class' => 'btn btn-primary pull-right mt-3',
                        ]); ?>

                    <?php endif; ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Form Data Biaya'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/biaya_form.blade.php ENDPATH**/ ?>