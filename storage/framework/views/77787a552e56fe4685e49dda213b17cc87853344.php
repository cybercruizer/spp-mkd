<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('components.kepala_sekolah.setting.setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="row justify-content-center" style="min-height: 80vh;">
        <div class="col-md-12">
            <?php echo Form::open(['route' => 'kepala_sekolah.settingwhacenter.store', 'method' => 'POST']); ?>

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-patch-exclamation"></i>
                        Pengaturan Whacenter
                    </h5>
                    <div class="form-group mt-3">
                        Device ID : <?php echo e(settings('wha_device_id')); ?>

                    </div>
                    <div class="form-group mt-3">
                        <label for="wha_device_id" class="form-label">Device ID Whacenter: </label>
                        <?php echo Form::text('wha_device_id', null, [
                            'class' => 'form-control',
                            'autocomplete' => 'off',
                            'placeholder' => 'Masukan Device ID WhaCenter',
                        ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('wha_device_id')); ?></small>
                    </div>
                    <div class="form-group mt-3">
                        Status Device : <span class="badge bg-<?php echo e($statusKoneksiWa ? 'primary' : 'danger'); ?>">
                            <?php echo e($statusKoneksiWa ? 'Connected' : 'Not Connected'); ?>

                        </span>
                    </div>
                    <div class="form-group mt-3">
                        <label for="tes_whacenter" class="form-label">Tes Kirim Whatsapp ke Nomor berikut: </label>
                        <?php echo Form::number('tes_whacenter', settings()->get('tes_whacenter'), [
                            'class' => 'form-control',
                            'placeholder' => 'Masukan nomor wa cth: 6282131231',
                        ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('tes_whacenter')); ?></small>
                    </div>
                    <?php echo Form::submit('UPDATE', ['class' => 'btn btn-primary pull-right mt-3']); ?>

                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Pengaturan Wha Center'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/kepala_sekolah/settingwhacenter_form.blade.php ENDPATH**/ ?>