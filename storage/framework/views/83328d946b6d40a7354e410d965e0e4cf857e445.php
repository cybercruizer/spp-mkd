<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function() {
            $('#btn-hapus').hide();
            $('.check-siswa-id').change(function(e) {
                if ($('.check-siswa-id:checked').length == $('.check-siswa-id').length) {
                    $('#checked-all').prop('checked', true);
                }
                if ($(this).prop('checked')) {
                    $('#btn-hapus').show();
                }
                if ($('.check-siswa-id:checked').length == 0) {
                    $('#btn-hapus').hide();
                }
                if ($('.check-siswa-id:checked').length < $('.check-siswa-id').length) {
                    $('#checked-all').prop('checked', false);
                }
            });
            $('#checked-all').click(function(e) {
                if ($(this).is(":checked")) {
                    $('#btn-hapus').show();
                    $('.check-siswa-id').prop('checked', true);
                } else {
                    $('#btn-hapus').hide();
                    $('.check-siswa-id').prop('checked', false);
                }
            });
            $('#btn-hapus').click(function(e) {
                let confirmHapus = confirm('Yakin hapus ?');
                if (confirmHapus) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: "<?php echo e(route(auth()->user()->akses . '.siswadestory.ajax')); ?>",
                        data: $('.check-siswa-id').serialize(),
                        dataType: 'json',
                        beforeSend: function() {},
                        success: function(response) {
                            $('#alert-message').removeClass('d-none');
                            $('#alert-message').addClass('alert-success');
                            $('#alert-message').html(response.message);
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            $('#alert-message').removeClass('d-none');
                            $('#alert-message').addClass('alert-danger');
                            $('#alert-message').html(xhr.responseJSON.message);
                        },
                    });
                    e.preventDefault();
                    return;
                }
            });
        })
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col">
            <div class="card p-3">
                <div class="card-body">
                    <?php echo $siswaKelasChart->container(); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="alert d-none my-1" role="alert" id="alert-message"></div>
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
                                <input name="q" type="text" class="form-control" placeholder="Cari Nama Siswa"
                                    aria-label="cari nama" aria-describedby="button-addon2" value="<?php echo e(request('q')); ?>">
                                <button class="btn btn-outline-primary" type="submit" id="button-addon2">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                    
                    <button type="button" id="btn-hapus" class="btn btn-danger mb-3">Hapus</button>
                    <div class="table-responsive">
                        <table class="<?php echo e(config('app.table_style')); ?>">
                            <thead class="<?php echo e(config('app.thead_style')); ?>">
                                <tr>
                                    <th width="1%;">
                                        <input type="checkbox" id="checked-all">
                                    </th>
                                    <th>Nama</th>
                                    <th>Wali Murid</th>
                                    <th>Kelas</th>
                                    <th>Biaya SPP</th>
                                    <th>Ktg</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo Form::checkbox('siswa_id[]', $item->id, null, ['class' => 'check-siswa-id']); ?></td>
                                        <td width="20%"><?php echo e($item->nama); ?></td>
                                        <td><?php echo e($item->wali->name ?? '-'); ?></td>
                                        <td><?php echo e($item->kelas); ?> <?php echo e($item->rombel); ?></td>
                                        <td>
                                            <?php switch($item->kategori):
                                                case ('AP50'): ?>
                                                    <?php echo e(formatRupiah($item->biaya->total_tagihan*50/100)); ?>

                                                    <?php break; ?>
                                                <?php case ('AP100'): ?>
                                                    <?php echo e(formatRupiah(0)); ?>

                                                    <?php break; ?>
                                                <?php default: ?>
                                                    <?php echo e(formatRupiah($item->biaya->total_tagihan)); ?>

                                            <?php endswitch; ?>
                                            
                                        </td>
                                        <td><?php echo e($item->kategori); ?></td>
                                        
                                        <td class="text-center">
                                            <?php echo Form::open([
                                                'route' => [$routePrefix . '.destroy', $item->id],
                                                'method' => 'DELETE',
                                                'onsubmit' => 'return confirm("Jika data ini dihapus maka data tagihan dan pembayaran akan terhapus, yakin ?")',
                                            ]); ?>

                                            <a href="<?php echo e(route($routePrefix . '.edit', $item->id)); ?>"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square d-md-inline d-none"></i> E
                                            </a>
                                            <a href="<?php echo e(route($routePrefix . '.show', $item->id)); ?>"
                                                class="btn btn-sm btn-info mx-1">
                                                <i class="bi bi-info-circle d-md-inline d-none"></i> D
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash d-md-inline d-none"></i> H
                                            </button>
                                            <?php echo Form::close(); ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="10" class="text-center fw-bold">Tidak ada data</td>
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

    <script src="<?php echo e($siswaKelasChart->cdn()); ?>"></script>
    <?php echo e($siswaKelasChart->script()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Data Siswa'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/siswa_index.blade.php ENDPATH**/ ?>