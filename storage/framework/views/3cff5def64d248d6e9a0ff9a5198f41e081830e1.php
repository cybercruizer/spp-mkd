<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header fw-bold fs-5" style="color: #012970;"><?php echo e($title); ?></h5>
                <div class="card-body">
                    <div class="row my-3">
                        <div class="col-md-6">
                            <a href="<?php echo e(route($routePrefix . '.create')); ?>" class="btn btn-sm btn-primary">Tambah
                                Data</a>
                        </div>
                        <div class="col-md-6">
                            <?php echo Form::open(['route' => $routePrefix . '.index', 'method' => 'GET']); ?>

                            <div class="input-group">
                                <input name="q" type="text" class="form-control" placeholder="Cari Nama Wali Murid"
                                    aria-label="cari nama" aria-describedby="button-addon2" value="<?php echo e(request('q')); ?>">
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
                                    <th>No. HP</th>
                                    <th>Email</th>
                                    <th>Akses</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->name); ?></td>
                                        <td><?php echo e($item->nohp); ?></td>
                                        <td><?php echo e($item->email); ?></td>
                                        <td><?php echo e($item->akses); ?></td>
                                        <td class="text-center">
                                            <?php echo Form::open([
                                                'route' => [$routePrefix . '.destroy', $item->id],
                                                'method' => 'DELETE',
                                                'onsubmit' => 'return confirm("Jika data ini dihapus maka data pembayaran akan terhapus, yakin ?")',
                                            ]); ?>

                                            <a href="<?php echo e(route($routePrefix . '.edit', $item->id)); ?>"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square d-md-inline d-none"></i>
                                                Edit
                                            </a>
                                            <a href="<?php echo e(route($routePrefix . '.show', $item->id)); ?>"
                                                class="btn btn-sm btn-info mx-2 my-1 my-md-0">
                                                <i class="bi bi-info-circle d-md-inline d-none"></i>
                                                Detail
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash d-md-inline d-none"></i> Hapus
                                            </button>
                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="6" class="text-center fw-bold">Tidak ada data</td>
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

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Data Wali Murid'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/wali_index.blade.php ENDPATH**/ ?>