<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header fw-bold fs-5" style="color: #012970;"><?php echo e($title); ?></h5>
                <div class="card-body">
                    <?php echo Form::model($model, ['route' => $route, 'method' => $method, 'id' => 'form-ajax']); ?>


                    <div class="form-group mt-3">
                        <label for="kelas" class="form-label">Pilih kelas yang akan dikenakan tagihan SPP</label>
                        <?php echo Form::select('kelas', getNamaKelas(), null, [
                            'class' => 'form-control select2',
                            'placeholder' => 'Pilih Kelas',
                        ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('kelas')); ?></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="biaya_id" class="form-label">Pilih nama biaya</label>
                        <?php echo Form::select('biaya_id', $biaya, null, [
                            'class' => 'form-control select2',
                            'placeholder' => 'Pilih biaya',
                        ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('biaya_id')); ?></small>
                    </div>

                     <div class="form-group mt-3">
                        <label for="tanggal_tagihan" class="form-label">Tanggal Tagihan</label>
                        <?php echo Form::date('tanggal_tagihan', $model->tanggal_tagihan ?? date('Y-m-') . '01', [
                            'class' => 'form-control',
                            'required' => 'required',
                        ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('tanggal_tagihan')); ?></small>
                    </div>


                    <div class="form-group mt-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <?php echo Form::textarea('keterangan', null, [
                            'class' => 'form-control',
                            'rows' => 3,
                        ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('keterangan')); ?></small>
                    </div>

                    <?php echo Form::submit($button, ['class' => 'btn btn-primary pull-right mt-3']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Form Data Tagihan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/tagihan_form.blade.php ENDPATH**/ ?>