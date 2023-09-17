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
                    <h4 class="my-0 py-0">LAPORAN TAGIHAN</h4>
                    <div class="my-2">Laporan Berdasarkan: <?php echo $subtitle; ?></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="<?php echo e(config('app.thead_style')); ?>">
                                <tr>
                                    <th width="1%">No</th>
                                    <th width="1%;">NIS</th>
                                    <th width="30%;">Nama</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Tagihan</th>
                                    <th>Status</th>
                                    <th>Jenis</th>
                                    <th>Total Tagihan</th>
                                    <th class="text-end">Kekurangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $total=0;
                                ?>
                                <?php $__empty_1 = true; $__currentLoopData = $tagihan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->siswa->nisn); ?></td>
                                        <td><?php echo e($item->siswa->nama); ?></td>
                                        <td><?php echo e($item->siswa->kelas); ?> <?php echo e($item->siswa->rombel); ?></td>
                                        <td><?php echo e($item->tanggal_tagihan->translatedFormat(config('app.format_tanggal'))); ?>

                                        </td>
                                        <td><?php echo e($item->status); ?></td>
                                        <td>
                                            <?php echo e($item->biaya->nama); ?>

                                        </td>
                                        <td><?php echo e(formatRupiah($item->total_tagihan)); ?>

                                        </td>
                                        <td class="text-end"><?php echo e(formatRupiah($item->total_tagihan - $item->total_pembayaran)); ?>

                                        </td>

                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="9" class="text-center fw-bold">Tidak ada data</td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td colspan="7" class="text-center fw-bold">Total Tagihan</td>
                                    <td class="text-end fw-bold" colspan="2">
                                        <?php echo e(formatRupiah($tagihan->sum('total_tagihan'))); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-center fw-bold">Total Kekurangan</td>
                                    <td class="text-end fw-bold"  colspan="2">
                                        <?php echo e(formatRupiah($tagihan->sum('total_tagihan') - $tagihan->sum('total_pembayaran'))); ?>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-center fw-bold">Persentase Pembayaran</td>
                                    <td class="text-end fw-bold"  colspan="2">
                                        <?php if($tagihan->sum('total_pembayaran') != 0 &&  $tagihan->sum('total_tagihan') != 0): ?>
                                            <?php echo e(number_format((float)$tagihan->sum('total_pembayaran') /  $tagihan->sum('total_tagihan', 2, '.', '')) * 100); ?><?php echo e("%"); ?>

                                        <?php endif; ?>
                                        
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

<?php echo $__env->make('layouts.app_niceadmin_blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/kepala_sekolah/laporantagihan_index.blade.php ENDPATH**/ ?>