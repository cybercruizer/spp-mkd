<div class="bs-stepper-header">
    <div class="step <?php echo e($activeStep1 ?? ''); ?>" data-target="#account-details">
        <a href="<?php echo e(route(auth()->user()->akses . '.tagihanlainstep.create', ['step' => 1])); ?>" class="step-trigger">
            <span class="bs-stepper-circle">1</span>
            <span class="bs-stepper-label mt-1">
                <span class="bs-stepper-title">Pilih Tagihan</span>
                <span class="bs-stepper-subtitle">Pilih Tagihan Untuk</span>
            </span>
        </a>
    </div>
    <div class="line">
        <i class="bx bx-chevron-right"></i>
    </div>
    <div class="step <?php echo e($activeStep2 ?? ''); ?>" data-target="#personal-info">
        <a href="<?php echo e(route(auth()->user()->akses . '.tagihanlainstep.create', ['step' => 2])); ?>" class="step-trigger">
            <span class="bs-stepper-circle">2</span>
            <span class="bs-stepper-label mt-1">
                <span class="bs-stepper-title">Pilih Siswa</span>
                <span class="bs-stepper-subtitle">Pilih Data Siswa</span>
            </span>
        </a>
    </div>
    <div class="line">
        <i class="bx bx-chevron-right"></i>
    </div>
    <div class="step <?php echo e($activeStep3 ?? ''); ?>" data-target="#social-links">
        <a href="<?php echo e(route(auth()->user()->akses . '.tagihanlainstep.create', ['step' => 3])); ?>" class="step-trigger">
            <span class="bs-stepper-circle">3</span>
            <span class="bs-stepper-label mt-1">
                <span class="bs-stepper-title">Pilih Biaya</span>
                <span class="bs-stepper-subtitle">Pilih Biaya Tagihan</span>
            </span>
        </a>
    </div>

    <div class="line">
        <i class="bx bx-chevron-right"></i>
    </div>
    <div class="step <?php echo e($activeStep4 ?? ''); ?>" data-target="#social-links">
        <a href="<?php echo e(route(auth()->user()->akses . '.tagihanlainstep.create', ['step' => 4])); ?>" class="step-trigger">
            <span class="bs-stepper-circle">4</span>
            <span class="bs-stepper-label mt-1">
                <span class="bs-stepper-title">Selesai</span>
                <span class="bs-stepper-subtitle">Simpan Data</span>
            </span>
        </a>
    </div>
</div>
<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/tagihanlain_stepheader.blade.php ENDPATH**/ ?>