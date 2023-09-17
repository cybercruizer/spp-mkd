<?php $__env->startSection('content'); ?>
    <style>
        @media print {
            * {
                color: black !important;
            }

            table,
            thead,
            tbody,
            tfoot,
            th,
            td {
                border: 1px solid black;
            }

            @page {
                size: landscape;
            }

            .table-striped>tbody>tr:nth-of-type(odd)>* {
                --bs-table-accent-bg: #fff;
            }
        }
    </style>
    <div class="row justify-content-center pr-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <?php echo $__env->make('kepala_sekolah.laporan_header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <h4 class="my-0 py-0">LAPORAN PEMBAYARAN</h4>
                    <div class="my-2">Laporan Berdasarkan: <?php echo $subtitle; ?></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="<?php echo e(config('app.thead_style')); ?>">
                                <tr>
                                    <th width="1%">No</th>
                                    <th>Nama</th>
                                    <th>Kelas</th>
                                    <th width="1%">Tanggal Bayar</th>
                                    <th width="1%">Metode Bayar</th>
                                    <th>Status Konfirmasi</th>
                                    <th width="1%">Tanggal Konfirmasi</th>
                                    <th class="text-end">Jumlah Dibayar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $pembayaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->tagihan->siswa->nama); ?> (<?php echo e($item->tagihan->siswa->nisn); ?>)</td>
                                        <td><?php echo e($item->tagihan->siswa->kelas . '-' . $item->tagihan->siswa->jurusan); ?></td>
                                        <td><?php echo e($item->tanggal_bayar->translatedFormat(config('app.format_tanggal'))); ?></td>
                                        <td><?php echo e($item->metode_pembayaran); ?></td>
                                        <td><?php echo e($item->status_konfirmasi); ?></td>
                                        <td><?php echo e(optional($item->tanggal_konfirmasi)->translatedFormat(config('app.format_tanggal'))); ?>

                                        </td>
                                        <td class="text-end"><?php echo e(formatRupiah($item->jumlah_dibayar)); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="10" class="text-center fw-bold">Tidak ada data</td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td colspan="7" class="text-center fw-bold">Total Pembayaran</td>
                                    <td class="text-end fw-bold">
                                        <?php echo e(formatRupiah($totalPembayaran)); ?>

                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin_blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/kepala_sekolah/laporanpembayaran_index.blade.php ENDPATH**/ ?>