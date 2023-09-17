<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header fw-bold fs-5" style="color: #012970;"><?php echo e(strtoupper($title)); ?></h5>
                <div class="card-body">
                    <?php echo Form::model($model, ['route' => $route, 'method' => $method]); ?>

                    <div class="form-group mt-3">
                        <label for="name" class="form-label">Nama</label>
                        <?php echo Form::text('name', null, ['class' => 'form-control', 'autofocus', 'required']); ?>

                        <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="email" class="form-label">Email</label>
                        <?php echo Form::email('email', null, [
                            'class' => 'form-control',
                            'required' => 'required',
                            'placeholder' => 'eg: foo@bar.com',
                        ]); ?>

                        <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
                    </div>
                    <div class="form-group mt-3">
                        <label for="nohp" class="form-label">No HP</label>
                        <?php echo Form::number('nohp', null, ['class' => 'form-control', 'required' => 'required']); ?>

                        <small class="text-danger"><?php echo e($errors->first('nohp')); ?></small>
                    </div>
                    <?php if(\Route::is(auth()->user()->akses . '.user.create')): ?>
                        <?php echo Form::hidden('akses', 'operator', []); ?>

                    <?php endif; ?>
                    <?php if(\Route::is(auth()->user()->akses . '.user.edit')): ?>
                        <?php echo Form::hidden('akses', null, []); ?>

                    <?php endif; ?>
                    <div class="form-group mt-3">
                        <label for="password" class="form-label">Password</label>
                        <?php echo Form::password('password', ['class' => 'form-control']); ?>

                        <small class="text-danger"><?php echo e($errors->first('password')); ?></small>
                    </div>
                    <?php echo Form::submit($button, ['class' => 'btn btn-primary pull-right mt-3']); ?>

                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => $title], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/user_form.blade.php ENDPATH**/ ?>