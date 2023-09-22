<?php $__env->startSection('content'); ?>
    <div class="container">
        <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                        <img src="<?php echo e(\Storage::url(settings()->get('app_logo'))); ?>" style="height: 100px;">
                        <div class="d-flex justify-content-center py-4">
                            <a href="#" class="logo d-flex align-items-center w-auto">
                                <span class="text-primary h5 m-0 fw-bold text-center"><?php echo e(settings()->get('app_name')); ?></span>
                            </a>
                        </div><!-- End Logo -->

                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="pt-4 pb-2">
                                    <h5 class="card-title text-center pb-0 fs-4">Login</h5>
                                    <p class="text-center small">Masukan email & password anda</p>
                                </div>
                                <form method="POST" action="<?php echo e(route('login')); ?>" class="row g-3 needs-validation"
                                    novalidate>
                                    <?php echo csrf_field(); ?>
                                    <div class="col-12">
                                        <label for="yourEmail" class="form-label">Email</label>
                                        <div class="input-group has-validation">
                                            <input type="email" name="email"
                                                class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="yourEmail"
                                                required>
                                            <div class="invalid-feedback">Ada kesalahan email.</div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <label for="yourPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="yourPassword"
                                            required>
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                        <div class="invalid-feedback">Ada kesalahan password!</div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" value="true"
                                                id="rememberMe" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                                            <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100" type="submit">Login</button>
                                    </div>
                                    <div class="col-12">
                                        <?php if(Route::has('password.request')): ?>
                                            <center>
                                                <a class="btn btn-link" href="<?php echo e(route('password.request')); ?>"
                                                    style="font-size: 14px;">
                                                    <?php echo e(__('Forgot Your Password?')); ?>

                                                </a>
                                            </center>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-12 text-center">
                                        Jika bapak/ Ibu belum memiliki akun, silahkan hubungi bendahara sekolah.
                                        <a href="https://wa.me/+<?php echo e(settings()->get('no_wa_operator')); ?>"
                                            target="_blank">Klik Link
                                            Whatsapp ini</a>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="credits" style="font-size: 12px;">
                            SMK Muh Mungkid 2023
                        </div>

                    </div>
                </div>
            </div>

        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.app_auth_niceadmin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/auth/login_niceadmin.blade.php ENDPATH**/ ?>