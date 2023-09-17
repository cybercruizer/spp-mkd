<?php $__env->startSection('content'); ?>
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-9 order-0">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Selamat Datang, <?php echo e(ucwords(auth()->user()->name)); ?> 🎉</h5>
                            <p class="mb-4">
                                Kamu mendapat <span class="fw-bold">10</span> notifikasi yang belum kamu lihat. Klik tombol
                                dibawah
                                untuk melihat informasi pembayaran.
                            </p>

                            <a href="<?php echo e(route('wali.tagihan.index')); ?>" class="btn btn-sm btn-outline-primary">Lihat Data
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
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-3">
            <div class="card info-card revenue-card">
                <div class="card-body">
                    <h5 class="card-title">Total Data</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="ps-3">
                            <h6><?php echo e(auth()->user()->siswa->count()); ?> Anak</h6>
                            <span class="text-success small pt-1 fw-bold">Peserta Didik</span>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- End Right side columns -->
    </div>

    <div class="row m-0 p-0">
        <?php $__currentLoopData = $dataRekap; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-4 order-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-truncate">Kartu SPP <strong><?php echo e($item['siswa']['nama']); ?></strong></h5>
                        <a href="<?php echo e(route('kartuspp.index', [
                            'siswa_id' => $item['siswa']['id'],
                            'tahun' => date('Y'),
                            'bulan' => date('m'),
                        ])); ?>"
                            target="_blank">
                            <i class="bi bi-file-earmark-arrow-down"></i>
                            <span class="d-md-inline d-none">Kartu SPP <?php echo e(getTahunAjaranFUll(date('m'), date('Y'))); ?></span>
                        </a>
                        <div class="list-group">
                            <div
                                class="list-group-item d-flex justify-content-between align-items-center list-group-item-secondary">
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <div class="mb-0 h-6 fw-bold">Bulan</div>
                                    </div>
                                    <span class="fw-bold">Status</span>
                                </div>
                            </div>
                            <?php $__currentLoopData = $item['dataTagihan']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itemTagihan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="list-group-item d-flex justify-content-between align-items-center">
                                    <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                        <div class="me-2">
                                            <div class="mb-0 h-6"><?php echo e($itemTagihan['bulan']); ?></div>
                                        </div>
                                        <?php if($itemTagihan['tagihan'] != null): ?>
                                            <span
                                                class="badge <?php echo e($itemTagihan['status_bayar_teks'] == 'lunas' ? 'bg-primary ' : 'bg-danger'); ?>">
                                                <a class="text-white"
                                                    href="<?php echo e(route('wali.tagihan.show', $itemTagihan['tagihan']->id)); ?>">
                                                    <?php echo e($itemTagihan['status_bayar_teks']); ?>

                                                </a>
                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(auth()->user()->unreadNotifications->count() >= 1): ?>
            <div class="col-md-6 col-lg-4 order-2 mb-4">
                <div class="card info-card revenue-card">
                    <div class="card-body">
                        <h5 class="card-title">Notifikasi</h5>
                        <ul class="list-group list-group-flush">
                            <?php $__currentLoopData = auth()->user()->unreadNotifications->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                    <a href="<?php echo e(url($notification->data['url'] . '?id=' . $notification->id)); ?>">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <div class="mb-1 text-black fw-bold" style="font-size: 16px;">
                                                    <?php echo e($notification->data['title']); ?>

                                                </div>
                                                <p class="mb-0" style="font-size: 13px;">
                                                    <?php echo e(ucwords($notification->data['messages'])); ?></p>
                                                <small class="text-muted"
                                                    style="font-size: 13px;"><?php echo e($notification->created_at->diffForHumans()); ?></small>
                                            </div>
                                            <div class="flex-shrink-0 dropdown-notifications-actions">
                                                <?php echo Form::open([
                                                    'route' => ['wali.notifikasi.update', $notification->id],
                                                    'method' => 'PUT',
                                                ]); ?>

                                                <button type="submit" class="btn dropdown-notifications-archive">
                                                    <i class="bi bi-x-lg text-danger"></i>
                                                </button>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        </div>
                                    </a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Beranda Wali'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/wali/beranda_index.blade.php ENDPATH**/ ?>