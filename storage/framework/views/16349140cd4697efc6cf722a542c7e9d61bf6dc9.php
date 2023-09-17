<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-lg-7">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang, <?php echo e(ucwords(auth()->user()->name)); ?>

                                🎉
                            </h5>
                            <p class="mb-4">
                                Kamu mendapat <span class="fw-bold">
                                    <?php echo e(auth()->user()->unreadNotifications->count()); ?>

                                </span>
                                notifikasi yang belum kamu lihat. Klik
                                tombol
                                dibawah
                                untuk melihat informasi pembayaran.
                            </p>

                            <a href="<?php echo e(route(auth()->user()->akses . '.pembayaran.index')); ?>"
                                class="btn btn-sm btn-outline-primary">Lihat
                                Data
                                Pembayaran</a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-2">
                            <img src="<?php echo e(asset('niceadmin')); ?>/assets/img/man-laptop.png" height="200"
                                alt="View Badge User" class="d-none d-sm-block">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="row">
                <div class="col col-md-6">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="card-icon my-2 rounded d-flex align-items-center justify-content-center"
                                    style="height: 35px; width: 35px;">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="text-secondary fw-bold mx-2">Total Data</div>
                            </div>
                            <div class="mt-1">
                                <h6 class="m-0"><?php echo e($siswa->count()); ?> Siswa</h6>
                                <span class="text-warning small fw-bold">Data Siswa</span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="card-icon my-2 rounded d-flex align-items-center justify-content-center"
                                    style="height: 35px; width: 35px;">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="text-secondary fw-bold mx-2" style="font-size: 15px;">Total Bayar Bulan Ini
                                </div>
                            </div>
                            <div class="mt-3">
                                <h6 class="m-0"><?php echo e($totalSiswaSudahBayar); ?> Siswa</h6>
                                <span class="text-warning small fw-bold"><?php echo e(formatRupiah($totalPembayaran)); ?></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-lg-4 order-2 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <h5 class="card-title">Tagihan <?php echo e($bulanTeks); ?> <?php echo e($tahun); ?></h5>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="d-flex flex-column align-items-center gap-1">
                            <h2 class="mb-2"><?php echo e($tagihanSudahBayar->count()); ?>/<?php echo e($tagihanBelumBayar->count()); ?></h2>
                            <span class="text-center">Total Tagihan: <?php echo e($totalTagihan); ?></span>
                        </div>
                        <?php echo $tagihanChart->container(); ?>

                    </div>

                    <ul class="list-group">
                        <?php $__currentLoopData = $tagihanPerKelas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    <div class="rounded-3 icon-sm me-3 bg-primary bg-gradient shadow text-center px-2 py-1">
                                        <div class="text-white opacity-10 fs-5">
                                            <?php echo e($item->count()); ?>

                                        </div>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">Kelas <?php echo e($key); ?></h6>
                                        <small class="text-secondary" style="font-size: 13px;">Sudah Bayar / Belum</small>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <div class="my-auto" style="font-size: 13px;">
                                        <?php echo e($item->where('status', 'lunas')->count()); ?>

                                        /
                                        <?php echo e($item->where('status', '<>', 'lunas')->count()); ?>

                                    </div>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php if($totalPembayaranBelumKonfirmasi->count() >= 1): ?>
            <div class="col-md-6 col-lg-4 order-2 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Pembayaran Belum Dikonfirmasi</h5>
                        <ul class="list-group">
                            <?php $__currentLoopData = $totalPembayaranBelumKonfirmasi->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="rounded-3 icon-sm me-3 bg-success bg-gradient shadow text-center px-2 py-1">
                                            <i class="bi bi-person text-white opacity-10 fs-5"></i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm"><?php echo e($item->tagihan->siswa->nama); ?></h6>
                                            <small class="text-secondary"
                                                style="font-size: 13px;"><?php echo e($item->tanggal_bayar->diffForHumans()); ?></small>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <a href="<?php echo e(route(auth()->user()->akses . '.pembayaran.show', $item->id)); ?>"
                                            class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                                class="bi bi-arrow-right-circle fs-5 text-success"></i></a>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php if($tagihanBelumBayar->count() >= 1): ?>
            <div class="col-md-6 col-lg-4 order-2 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title">Tagihan Belum Dibayar</h5>
                        <div class="fs-6 fw-semibold">
                            <?php echo e($tagihanBelumBayar->count()); ?> /
                            <?php echo e($totalTagihan); ?>

                        </div>

                        <ul class="list-group">
                            <?php $__currentLoopData = $tagihanBelumBayar->take(5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item border-0 d-flex justify-content-between ps-0 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <div
                                            class="rounded-3 icon-sm me-3 bg-warning bg-gradient shadow text-center px-2 py-1">
                                            <i class="bi bi-person text-white opacity-10 fs-5"></i>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm"><?php echo e($item->siswa->nama); ?></h6>
                                            <small class="text-secondary"
                                                style="font-size: 13px;"><?php echo e($item->tanggal_tagihan->translatedFormat('F Y')); ?></small>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <a href="<?php echo e(route(auth()->user()->akses . '.tagihan.show', [$item->id, 'siswa_id' => $item->siswa_id, 'tahun' => $item->tanggal_tagihan->year])); ?>"
                                            class="btn btn-link btn-icon-only btn-rounded btn-sm text-dark icon-move-right my-auto"><i
                                                class="bi bi-arrow-right-circle fs-5 text-warning"></i></a>
                                    </div>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>


    <script src="<?php echo e($tagihanChart->cdn()); ?>"></script>
    <?php echo e($tagihanChart->script()); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Beranda Operator'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/beranda_index.blade.php ENDPATH**/ ?>