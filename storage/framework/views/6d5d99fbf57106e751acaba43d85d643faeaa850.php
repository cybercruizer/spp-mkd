<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header fw-bold fs-5" style="color: #012970;"><?php echo e($title); ?></h5>

                <div class="card-body">
                    <?php echo Form::model($model, ['route' => $route, 'method' => $method]); ?>

                    <div class="form-group mt-3">
                        <label for="bank_id" class="form-label">Nama Bank</label>
                        <?php echo Form::select('bank_id', $listBank, $model->kode ?? null, [
                            'class' => 'form-control select2',
                        ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('bank_id')); ?></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nomor_rekening" class="form-label">Nomor Rekening</label>
                        <?php echo Form::number('nomor_rekening', null, [
                            'class' => 'form-control',
                            'required' => 'required',
                        ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('nomor_rekening')); ?></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nama_rekening" class="form-label">Pemilik Rekening</label>
                        <?php echo Form::text('nama_rekening', null, [
                            'class' => 'form-control',
                            'required' => 'required',
                        ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('nama_rekening')); ?></small>
                    </div>
                    <?php echo Form::submit($button, ['class' => 'btn btn-primary pull-right mt-3']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Form Rekening'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/banksekolah_form.blade.php ENDPATH**/ ?>