<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <?php echo $__env->make('components.user.tagihan_show.data_siswa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>

    
    <div class="row">
        <div class="col-md-<?php echo e($tagihan->jenis == 'spp' ? '5' : '12'); ?>">
            <?php echo $__env->make('components.user.tagihan_show.data_tagihan', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->make('components.user.tagihan_show.data_form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <?php if($tagihan->jenis == 'spp'): ?>
            <div class="col-md-7">
                <?php echo $__env->make('components.user.tagihan_show.data_kartuspp', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Detail Tagihan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/user/tagihan_show.blade.php ENDPATH**/ ?>