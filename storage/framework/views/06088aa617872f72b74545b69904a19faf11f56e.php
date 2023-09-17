<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header fw-bold fs-5" style="color: #012970;"><?php echo e($title); ?></h5>
                <div class="card-body">
                    <?php if(auth()->user()->akses == 'kepala_sekolah'): ?>
                        <a href="<?php echo e(route($routePrefix . '.create')); ?>" class="btn btn-sm btn-primary mt-3">Tambah Data</a>
                    <?php endif; ?>
                    <div class="table-responsive mt-3">
                        <table class="<?php echo e(config('app.table_style')); ?>">
                            <thead class="<?php echo e(config('app.thead_style')); ?>">
                                <tr>
                                    <th width="1%;">No</th>
                                    <th>Nama Bank</th>
                                    <th>Kode Transfer</th>
                                    <th>Pemilik Rekening</th>
                                    <th>Nomor Rekening</th>
                                    <?php if(auth()->user()->akses == 'kepala_sekolah'): ?>
                                        <th class="text-center">Aksi</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->nama_bank); ?></td>
                                        <td><?php echo e($item->kode); ?></td>
                                        <td><?php echo e($item->nama_rekening); ?></td>
                                        <td><?php echo e($item->nomor_rekening); ?></td>
                                        <?php if(auth()->user()->akses == 'kepala_sekolah'): ?>
                                            <td class="text-center">
                                                <?php echo Form::open([
                                                    'route' => [$routePrefix . '.destroy', $item->id],
                                                    'method' => 'DELETE',
                                                    'onsubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                                                ]); ?>

                                                <a href="<?php echo e(route($routePrefix . '.edit', $item->id)); ?>"
                                                    class="btn btn-sm btn-warning mx-2 mb-1 mb-md-0">
                                                    <i class="bi bi-pencil-square d-md-inline d-none"></i>
                                                    Edit
                                                </a>
                                                <button type="submit" class="btn btn-sm btn-danger">
                                                    <i class="bi bi-trash d-md-inline d-none"></i> Hapus
                                                </button>
                                                <?php echo Form::close(); ?>

                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="8" class="text-center fw-bold">Data tidak ada</td>
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

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Data Rekening'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/banksekolah_index.blade.php ENDPATH**/ ?>