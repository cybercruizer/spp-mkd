<?php $__env->startSection('content'); ?>
    <div class="card">
        <div class="bs-stepper wizard-numbered mt-2">
            <?php echo $__env->make('user.tagihanlain_stepheader', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <div class="bs-stepper-content">
                <!-- Account Details -->
                <div id="account-details" class="content active dstepper-block">
                    <div class="content-header mb-3">
                        <?php if(session('tagihan_untuk') == 'semua'): ?>
                            <h6 class="mb-0">Tagihan Untuk Semua Siswa</h6>
                        <?php else: ?>
                            <h6 class="mb-0">Tagihan Untuk <?php echo e(Session::get('data_siswa')->count()); ?> Siswa</h6>
                        <?php endif; ?>
                        <small>Pilih biaya yang akan ditagihkan.</small>
                    </div>
                    <?php echo Form::open([
                        'route' => auth()->user()->akses . '.tagihanlainstep.create',
                        'method' => 'GET',
                    ]); ?>

                    <?php echo Form::hidden('step', 4, []); ?>

                    <div class="row g-3 mb-3">
                        <div class="form-group">
                            <label for="biaya_id">Pilih biaya atau
                                <a href="<?php echo e(route(auth()->user()->akses . '.biaya.create')); ?>" target="_blank">buat
                                    baru
                                </a>
                            </label>
                            <?php echo Form::select('biaya_id', $biayaList, null, ['class' => 'form-control select2']); ?>

                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-between">
                        <a href="<?php echo e(route(auth()->user()->akses . '.tagihanlainstep.create', ['step' => 2])); ?>"
                            class="btn btn-label-secondary btn-prev border" disabled>
                            <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                            <span class="align-middle d-sm-inline-block d-none">Previous</span>
                        </a>
                        <button class="btn btn-primary btn-next" type="submit">
                            <span class="align-middle d-sm-inline-block d-none me-sm-1 me-0">Next</span>
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

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Form Data Tagihan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/tagihanlain_step3.blade.php ENDPATH**/ ?>