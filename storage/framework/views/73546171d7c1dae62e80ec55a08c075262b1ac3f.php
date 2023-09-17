<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header fw-bold fs-5" style="color: #012970;">FORM LAPORAN</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title">
                                <i class="bi bi-patch-exclamation"></i>
                                Laporan Tagihan
                            </div>
                            <?php echo $__env->make('components.laporanform_tagihan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title">
                                <i class="bi bi-patch-exclamation"></i>
                                Laporan Pembayaran
                            </div>
                            <?php echo $__env->make('components.laporanform_pembayaran', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-title">
                                <i class="bi bi-patch-exclamation"></i>
                                Laporan Rekap Pembayaran
                            </div>
                            <?php echo $__env->make('components.laporanform_rekappembayaran', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Form Laporan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/kepala_sekolah/laporanform_index.blade.php ENDPATH**/ ?>