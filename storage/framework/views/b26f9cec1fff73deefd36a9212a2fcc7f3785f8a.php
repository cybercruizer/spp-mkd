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

            th,
            td {
                padding: 0px !important;
                margin: 0px !important;
            }

            @page {
                size: A4 landscape;
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
                    <h4 class="my-0 py-0">LAPORAN REKAP PEMBAYARAN</h4>
                    <div class="my-2"><?php echo $subtitle; ?></div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="<?php echo e(config('app.thead_style')); ?>">
                                <tr>
                                    <th width="1%;">No</th>
                                    <th width="1%;">NIS</th>
                                    <th>Nama</th>
                                    <?php $__currentLoopData = $header; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bulan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <th>
                                            <?php echo e(ubahNamaBulan($bulan)); ?>

                                        </th>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $dataRekap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item['siswa']['nisn']); ?></td>
                                        <td><?php echo e($item['siswa']['nama']); ?></td>
                                        <?php $__currentLoopData = $item['dataTagihan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemTagihan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <td class="text-center">
                                                <?php if($item['siswa']['kategori']==='AP100'): ?>
                                                    <?php echo e('AP100'); ?>

                                                <?php elseif($itemTagihan['tanggal_lunas'] != '-'): ?>
                                                    <?php echo e(optional($itemTagihan['tanggal_lunas'])->format(config('app.format_tanggal'))); ?>

                                                <?php else: ?>
                                                    -
                                                <?php endif; ?>
                                            </td>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="15" class="text-center fw-bold">
                                            Tidak ada data
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin_blank', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/kepala_sekolah/laporanrekappembayaran_index.blade.php ENDPATH**/ ?>