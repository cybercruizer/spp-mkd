<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function() {
            $('#foto').change(function() {
                var input = this;
                var url = $(this).val();
                var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" ||
                        ext == "jpg")) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                } else {
                    $('#img').attr('src', "<?php echo e(\Storage::url($model->foto)); ?>");
                }
            });

            $('#form-ajax').submit(function(e) {
                $.ajax({
                    type: $(this).attr('method'),
                    url: $(this).attr('action'),
                    dataType: 'json',
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    beforeSend: function() {},
                    success: function(response) {
                        $('#alert-message').removeClass('d-none');
                        $('#alert-message').addClass('alert-success');
                        $('#alert-message').html(response.message);
                        if ($("#form-ajax input[name='_method']").val() == 'PUT') {
                            $('#img').attr('src', e.target.result);
                        } else {
                            $('#form-ajax')[0].reset();
                            $('.select2').val(null).trigger('change');
                            $('#img').attr('src', "<?php echo e(\Storage::url($model->foto)); ?>");
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#alert-message').removeClass('d-none');
                        $('#alert-message').addClass('alert-danger');
                        $('#alert-message').html(xhr.responseJSON.message);
                    }
                });
                setTimeout(
                    function() {
                        $('#alert-message').removeClass('alert-success');
                        $('#alert-message').removeClass('alert-danger');
                        $('#alert-message').removeClass('d-none');
                        $('#alert-message').html("");
                    }, 5000);
                e.preventDefault();
                return;
            });
        });
    </script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="position-fixed top-30 w-25" style="right: 5%;">
                    <div class="alert d-none my-1" role="alert" id="alert-message"></div>
                </div>
                <h5 class="card-header fw-bold fs-5" style="color: #012970;"><?php echo e($title); ?></h5>
                <div class="card-body">
                    <?php echo Form::model($model, ['route' => $route, 'method' => $method, 'files' => true, 'id' => 'form-ajax']); ?>

                    <div class="form-group mt-3">
                        <label for="wali_id" class="form-label">Wali Murid (optional)</label>
                        <?php echo Form::select('wali_id', $wali, null, [
                            'class' => 'form-control select2',
                            'placeholder' => 'Pilih Wali Murid',
                        ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('wali_id')); ?></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nama" class="form-label">Nama</label>
                        <?php echo Form::text('nama', null, ['class' => 'form-control', 'autofocus', 'required']); ?>

                        <small class="text-danger"><?php echo e($errors->first('nama')); ?></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="biaya_id" class="form-label">Biaya SPP</label>
                        <?php echo Form::select('biaya_id', $listBiaya, null, [
                            'class' => 'form-control select2',
                            'placeholder' => 'Pilih Biaya',
                        ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('biaya_id')); ?></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="text" class="form-label">NIS</label>
                        <?php echo Form::text('nisn', null, [
                            'class' => 'form-control',
                            'required' => 'required',
                        ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('nisn')); ?></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <?php echo Form::select('jurusan', getNamaJurusan(), null, ['class' => 'form-control', 'required' => 'required']); ?>

                        <small class="text-danger"><?php echo e($errors->first('jurusan')); ?></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="kelas" class="form-label">Kelas</label>
                        <?php echo Form::select('kelas', getNamaKelas(), null, ['class' => 'form-control', 'required' => 'required']); ?>

                        <small class="text-danger"><?php echo e($errors->first('kelas')); ?></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="rombel" class="form-label">Rombel</label>
                        <?php echo Form::select('rombel', getNamaRombel(), null, ['class' => 'form-control', 'required' => 'required']); ?>

                        <small class="text-danger"><?php echo e($errors->first('rombel')); ?></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="angkatan" class="form-label">Angkatan</label>
                        <?php echo Form::selectRange('angkatan', date('Y') - 3, date('Y') + 1, null, [
                            'class' => 'form-control',
                            'required' => 'required',
                        ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('angkatan')); ?></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <?php echo Form::select('kategori', getKategoriSiswa(), null, ['class' => 'form-control', 'required' => 'required']); ?>

                        <small class="text-danger"><?php echo e($errors->first('kategori')); ?></small>
                    </div>
                    <?php if($model->foto != null): ?>
                        <div class="mt-3">
                            <img src="<?php echo e(\Storage::url($model->foto)); ?>" width="200" class="img-thumbnail"
                                id="img">
                        </div>
                    <?php endif; ?>
                    <div class="form-group mt-3">
                        <label for="foto" class="form-label">Foto <u>(Format: jpg, jpeg, png, Ukuran Maks:
                                5MB)</u></label>
                        <?php echo Form::file('foto', ['class' => 'form-control', 'accept' => 'image/*', 'id' => 'foto']); ?>

                        <small class="text-danger"><?php echo e($errors->first('foto')); ?></small>
                    </div>
                    <?php echo Form::submit($button, ['class' => 'btn btn-primary pull-right mt-3']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Form Data Siswa'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/siswa_form.blade.php ENDPATH**/ ?>