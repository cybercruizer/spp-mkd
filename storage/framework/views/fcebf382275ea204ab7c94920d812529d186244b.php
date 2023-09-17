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

                <h5 class="card-header fw-bold fs-5" style="color: #012970;"><?php echo e($title); ?></h5>
                <div class="card-body">
                    <div class="row my-3">
                        <div class="col-md-6">
                            <a href="<?php echo e(route($routePrefix . '.create')); ?>" class="btn btn-sm btn-primary"
                                <?php if(auth()->user()->akses == 'operator'): ?> onclick="return checkVerificationCode()" <?php endif; ?>>Tambah
                                Data</a>
                        </div>
                        <div class="col-md-6">
                            <?php echo Form::open(['route' => $routePrefix . '.index', 'method' => 'GET']); ?>

                            <div class="input-group mr-auto">
                                <input name="q" type="text" class="form-control" placeholder="Cari Data"
                                    aria-label="Cari Data" aria-describedby="button-addon2" value="<?php echo e(request('q')); ?>">
                                <button class="btn btn-outline-primary" type="submit" id="button-addon2">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="<?php echo e(config('app.table_style')); ?>">
                            <thead class="<?php echo e(config('app.thead_style')); ?>">
                                <tr>
                                    <th width="1%;">No</th>
                                    <th>Nama</th>
                                    <th>Total Biaya</th>
                                    <th>Created By</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->nama); ?></td>
                                        <td><?php echo e(formatRupiah($item->total_tagihan)); ?></td>
                                        <td><?php echo e($item->user->name); ?></td>
                                        <td class="text-center">
                                            <?php echo Form::open([
                                                'route' => [$routePrefix . '.destroy', $item->id],
                                                'method' => 'DELETE',
                                                'onsubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                                            ]); ?>

                                            <a href="<?php echo e(route($routePrefix . '.edit', $item->id)); ?>"
                                                class="btn btn-sm btn-warning"
                                                <?php if(auth()->user()->akses == 'operator'): ?> onclick="return checkVerificationCode()" <?php endif; ?>>
                                                <i class="bi bi-pencil-square d-md-inline d-none"></i>
                                                Edit
                                            </a>
                                            <a href="<?php echo e(route($routePrefix . '.create', ['parent_id' => $item->id])); ?>"
                                                class="btn btn-sm btn-info mx-2 my-1 my-md-0">
                                                <i class="bi bi-info-circle d-md-inline d-none"></i>
                                                Items
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                <?php if(auth()->user()->akses == 'operator'): ?> onclick="return checkVerificationCode()" <?php endif; ?>>
                                                <i class="bi bi-trash d-md-inline d-none"></i> Hapus
                                            </button>
                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="8" class="text-center fw-bold">Tidak ada data</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                        <?php echo $models->links(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Data Biaya'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/biaya_index.blade.php ENDPATH**/ ?>