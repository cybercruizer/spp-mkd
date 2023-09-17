<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function() {
            let urlString = window.location.href;
            let url = new URL(urlString);

            $('#pilihan_kelas').change(function(e) {
                let kelasAsalId = $(this).find(':selected').val();
                url.searchParams.set('kelas_asal_id', kelasAsalId);
                window.location.href = url.href;
            });
            $('#pilihan_jurusan').change(function(e) {
                let jurusanAsalId = $(this).find(':selected').val();
                url.searchParams.set('jurusan_asal_id', jurusanAsalId);
                window.location.href = url.href;
            });
            $('#pilihan_biaya').change(function(e) {
                let biayaAsalId = $(this).find(':selected').val();
                url.searchParams.set('biaya_asal_id', biayaAsalId);
                window.location.href = url.href;
            });
            $('#pilihan_status').change(function(e) {
                let statusAsalId = $(this).find(':selected').val();
                url.searchParams.set('status_asal_id', statusAsalId);
                window.location.href = url.href;
            });
        });

        $('#gridCheck0').on('change', function() {
            $('.checkboxes').prop('checked', $(this).prop("checked"));
        });
        //deselect "checked all", if one of the listed checkboxes category is unchecked amd select "checked all" if all of the listed checkboxes category is checked
        $('.checkboxes').change(function() { //".checkboxes" change
            if ($('.checkboxes:checked').length == $('.checkboxes').length) {
                $('#gridCheck0').prop('checked', true);
            } else {
                $('#gridCheck0').prop('checked', false);
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php echo Form::model(['route' => $route, 'method' => $method]); ?>

            <div class="card">
                <h5 class="card-header fw-bold fs-5" style="color: #012970;">MUTASI SISWA/I</h5>
                <div class="card-body mt-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group" id="pilihan_kelas">
                                <label for="kelas_asal_id">Kelas Asal</label>
                                <?php echo Form::select('kelas_asal_id', $listKelas, request('kelas_asal_id'), [
                                    'class' => 'form-control select2',
                                    'placeholder' => 'Pilih Kelas Asal',
                                ]); ?>

                                <span class="text-danger"><?php echo e($errors->first('kelas_asal_id')); ?></span>
                            </div>
                            <div class="form-group mt-3" id="pilihan_jurusan">
                                <label for="jurusan_asal_id">Jurusan Asal</label>
                                <?php echo Form::select('jurusan_asal_id', $listJurusan, request('jurusan_asal_id'), [
                                    'class' => 'form-control select2',
                                    'placeholder' => 'Pilih Jurusan Asal',
                                ]); ?>

                                <span class="text-danger"><?php echo e($errors->first('jurusan_asal_id')); ?></span>
                            </div>
                            <div class="form-group mt-3" id="pilihan_biaya">
                                <label for="biaya_asal_id">Biaya Asal</label>
                                <?php echo Form::select('biaya_asal_id', $listBiaya, request('biaya_asal_id'), [
                                    'class' => 'form-control select2',
                                    'placeholder' => 'Pilih Biaya Asal',
                                ]); ?>

                                <span class="text-danger"><?php echo e($errors->first('biaya_asal_id')); ?></span>
                            </div>
                            <div class="form-group mt-3" id="pilihan_status">
                                <label for="status_asal_id">Status Asal</label>
                                <?php echo Form::select('status_asal_id', $listStatus, request('status_asal_id'), [
                                    'class' => 'form-control select2',
                                    'placeholder' => 'Pilih Status Asal',
                                ]); ?>

                                <span class="text-danger"><?php echo e($errors->first('status_asal_id')); ?></span>
                            </div>
                        </div>
                        <div class="d-md-none text-center fw-bold my-3 my-lg-0">
                            PINDAH KE
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group" id="pilihan_kelas">
                                <label for="kelas_tujuan_id">Kelas Tujuan</label>
                                <?php echo Form::select('kelas_tujuan_id', $listKelas, null, [
                                    'class' => 'form-control select2',
                                    'placeholder' => 'Pilih Kelas Tujuan',
                                ]); ?>

                                <span class="text-danger"><?php echo e($errors->first('kelas_tujuan_id')); ?></span>
                            </div>
                            <div class="form-group mt-3" id="pilihan_jurusan">
                                <label for="jurusan_tujuan_id">Jurusan Tujuan</label>
                                <?php echo Form::select('jurusan_tujuan_id', $listJurusan, null, [
                                    'class' => 'form-control select2',
                                    'placeholder' => 'Pilih Jurusan Tujuan',
                                ]); ?>

                                <span class="text-danger"><?php echo e($errors->first('jurusan_tujuan_id')); ?></span>
                            </div>
                            <div class="form-group mt-3" id="pilihan_biaya">
                                <label for="biaya_tujuan_id">Biaya Tujuan</label>
                                <?php echo Form::select('biaya_tujuan_id', $listBiaya, null, [
                                    'class' => 'form-control select2',
                                    'placeholder' => 'Pilih Biaya Tujuan',
                                ]); ?>

                                <span class="text-danger"><?php echo e($errors->first('biaya_tujuan_id')); ?></span>
                            </div>
                            <div class="form-group mt-3" id="pilihan_status">
                                <label for="status_tujuan_id">Status Tujuan</label>
                                <?php echo Form::select('status_tujuan_id', $listStatus, request('status_tujuan_id'), [
                                    'class' => 'form-control select2',
                                    'placeholder' => 'Pilih Status Tujuan',
                                ]); ?>

                                <span class="text-danger"><?php echo e($errors->first('status_tujuan_id')); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php echo Form::submit('Mutasi', ['class' => 'btn btn-primary pull-right mt-3']); ?>

                </div>
            </div>
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">
                        <i class="bi bi-patch-exclamation"></i>
                        Data Siswa
                    </h5>
                    <div class="table-responsive mt-3">
                        <table class="<?php echo e(config('app.table_style')); ?>">
                            <thead class="<?php echo e(config('app.thead_style')); ?>">
                                <tr>
                                    <th>
                                        <?php echo Form::checkbox('', null, null, [
                                            'class' => 'form-check-input',
                                            'id' => 'gridCheck0',
                                        ]); ?></th>
                                    <th>Nama Siswa</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th>Biaya</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td>
                                            <?php echo Form::checkbox('siswa_id[]', $item->id, false, [
                                                'class' => 'form-check-input checkboxes',
                                                'id' => 'gridCheck' . $loop->iteration,
                                            ]); ?>

                                        </td>
                                        <td>
                                            <div><?php echo e($item->nama); ?></div>
                                            <div><?php echo e($item->nisn); ?></div>
                                        </td>
                                        <td><?php echo e($item->jurusan); ?></td>
                                        <td><?php echo e($item->kelas); ?></td>
                                        <td><?php echo e($item->biaya->nama); ?></td>
                                        <td><?php echo e($item->status); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="8" class="fw-bold text-center">Tidak ada data</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Mutasi Siswa/I'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/migrasi_form.blade.php ENDPATH**/ ?>