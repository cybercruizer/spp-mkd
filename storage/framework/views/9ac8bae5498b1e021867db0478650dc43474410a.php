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
                <h5 class="card-header fw-bold fs-5" style="color: #012970;">DATA PEMBAYARAN</h5>
                <div class="card-body">
                    <div class="row my-3">
                        <div class="col-md-12">
                            <?php echo Form::open(['route' => auth()->user()->akses . '.pembayaran.index', 'method' => 'GET']); ?>

                            <div class="row justify-content-end">

                                <div class="col-md-2 col-sm-12 mb-3 mb-md-0">
                                    <?php echo Form::select(
                                        'status',
                                        [
                                            '' => 'Pilih Status',
                                            'belum-dikonfirmasi' => 'Belum Dikonfirmasi',
                                            'sudah-dikonfirmasi' => 'Sudah Dikonfirmasi',
                                        ],
                                        request('status'),
                                        ['class' => 'form-select'],
                                    ); ?>

                                </div>
                                <div class="col-md-2 col-sm-12 mb-3 mb-md-0">
                                    <?php echo Form::selectMonth('bulan', request('bulan'), ['class' => 'form-control', 'placeholder' => 'Pilih Bulan']); ?>

                                </div>
                                <div class="col-md-2 col-sm-12 mb-3 mb-md-0">
                                    <?php echo Form::selectRange('tahun', date('Y') - 3, date('Y') + 1, request('tahun') ?? date('Y'), [
                                        'class' => 'form-control',
                                    ]); ?>

                                </div>
                                <div class="col">
                                    <button class="btn btn-primary" type="submit">Tampil</button>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>

                    <div class="table-responsive mt-3">
                        <table class="<?php echo e(config('app.table_style')); ?>">
                            <thead class="<?php echo e(config('app.thead_style')); ?>">
                                <tr>
                                    <th width="1%;">No</th>
                                    <th>Nama</th>
                                    <th width="1%;">Metode Pembayaran</th>
                                    <th width="5%;">Status Konfirmasi</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->tagihan->siswa->nama); ?> (<?php echo e($item->tagihan->siswa->nisn); ?>)</td>
                                        <td><?php echo e($item->metode_pembayaran); ?></td>
                                        <td>
                                            <span class="badge rounded-pill bg-<?php echo e($item->status_style); ?>">
                                                <?php echo e($item->status_konfirmasi); ?>

                                            </span>
                                        </td>
                                        <td class="text-center">
                                            <?php echo Form::open([
                                                'route' => [auth()->user()->akses . '.pembayaran.destroy', $item->id],
                                                'method' => 'DELETE',
                                                'onsubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                                            ]); ?>

                                            <a href="<?php echo e(route(auth()->user()->akses . '.pembayaran.show', $item->id)); ?>"
                                                class="btn btn-sm btn-info">
                                                <i class="bi bi-info-circle d-md-inline d-none"></i>
                                                Detail
                                            </a>
                                            <?php if($item->metode_pembayaran == 'manual' || $item->tanggal_konfirmasi == null): ?>
                                                <button type="submit" class="btn btn-sm btn-danger mx-2 mt-1 mt-md-0"
                                                    <?php if(auth()->user()->akses == 'operator'): ?> onclick="return checkVerificationCode()" <?php endif; ?>>
                                                    <i class="bi bi-trash d-md-inline d-none"></i>
                                                    Hapus
                                                </button>
                                            <?php endif; ?>
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

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Data Pembayaran'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/pembayaran_index.blade.php ENDPATH**/ ?>