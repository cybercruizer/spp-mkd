<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="bs-stepper wizard-numbered mt-2">
            <?php echo $__env->make('user.tagihanlain_stepheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="bs-stepper-content">
                <!-- Account Details -->
                <div id="account-details" class="content active dstepper-block">
                    <?php echo Form::open([
                        'route' => auth()->user()->akses . '.tagihanlainstep4.store',
                        'method' => 'POST',
                    ]); ?>

                    <?php echo Form::hidden('biaya_id', $biaya->id, []); ?>

                    <div class="row g-3 mb-3">
                        Tagihan ini dibuat untuk:
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>Nama</th>
                                    <th>Nisn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $siswa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($item->nama); ?></td>
                                        <td><?php echo e($item->nisn); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </tbody>
                        </table>
                        <hr>
                        Biaya yang ditagihkan adalah: <?php echo e($biaya->nama); ?>, Total: <?php echo e(formatRupiah($biaya->total_tagihan)); ?>

                        <div>
                            <ul>
                                <?php $__currentLoopData = $biaya->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li>
                                        <?php echo e($item->nama . ' ' . formatRupiah($item->jumlah)); ?>

                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                        <hr>
                        <div class="form-group mt-3">
                            <label for="tanggal_tagihan" class="form-label">Tanggal Tagihan</label>
                            <?php echo Form::date('tanggal_tagihan', $model->tanggal_tagihan ?? date('Y-m-') . '01', [
                                'class' => 'form-control',
                                'required' => 'required',
                            ]); ?>

                            <small class="text-danger"><?php echo e($errors->first('tanggal_tagihan')); ?></small>
                        </div>

                        <div class="form-group mt-3">
                            <label for="tanggal_jatuh_tempo" class="form-label">Tanggal Jatuh Tempo</label>
                            <?php echo Form::date('tanggal_jatuh_tempo', $model->tanggal_jatuh_tempo ?? date('Y-m-15', strtotime('+1 month')), [
                                'class' => 'form-control',
                                'required' => 'required',
                            ]); ?>

                            <small class="text-danger"><?php echo e($errors->first('tanggal_jatuh_tempo')); ?></small>
                        </div>

                        <div class="form-group mt-3">
                            <label for="keterangan" class="form-label">Keterangan</label>
                            <?php echo Form::textarea('keterangan', null, [
                                'class' => 'form-control',
                                'rows' => 3,
                            ]); ?>

                            <small class="text-danger"><?php echo e($errors->first('keterangan')); ?></small>
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-between">
                        <a href="<?php echo e(route(auth()->user()->akses . '.tagihanlainstep.create', ['step' => 3])); ?>"
                            class="btn btn-label-secondary btn-prev border" disabled>
                            <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </a>
                        <button class="btn btn-primary btn-next" type="submit">
                            <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Simpan</span>
                            <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                        </button>
                    </div>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script>
        $(document).ready(function() {

            const wizardNumbered = document.querySelector(".wizard-numbered");

            if (typeof wizardNumbered !== undefined && wizardNumbered !== null) {
                const wizardNumberedBtnNextList = [].slice.call(wizardNumbered.querySelectorAll('.btn-next')),
                    wizardNumberedBtnPrevList = [].slice.call(wizardNumbered.querySelectorAll('.btn-prev')),
                    wizardNumberedBtnSubmit = wizardNumbered.querySelector('.btn-submit');

                const numberedStepper = new Stepper(wizardNumbered, {
                    linear: false
                });
                if (wizardNumberedBtnNextList) {
                    wizardNumberedBtnNextList.forEach(wizardNumberedBtnNext => {
                        wizardNumberedBtnNext.addEventListener('click', event => {
                            numberedStepper.next();
                        });
                    });
                }
                if (wizardNumberedBtnPrevList) {
                    wizardNumberedBtnPrevList.forEach(wizardNumberedBtnPrev => {
                        wizardNumberedBtnPrev.addEventListener('click', event => {
                            numberedStepper.previous();
                        });
                    });
                }
                if (wizardNumberedBtnSubmit) {
                    wizardNumberedBtnSubmit.addEventListener('click', event => {
                        alert('Submitted..!!');
                    });
                }
            }

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Form Data Tagihan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/tagihanlain_step4.blade.php ENDPATH**/ ?>