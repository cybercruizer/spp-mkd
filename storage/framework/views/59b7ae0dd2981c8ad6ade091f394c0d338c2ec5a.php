<div class="card">
    <div class="card-body">
        <h5 class="card-title">
            <i class="bi bi-patch-exclamation"></i>
            Data Pembayaran
        </h5>
        <table class="<?php echo e(config('app.table_style')); ?>">
            <thead class="<?php echo e(config('app.thead_style')); ?>">
                <tr>
                    <th width="1%">#</th>
                    <th>TANGGAL</th>
                    <th>MET</th>
                    <th class="text-end">JUMLAH</th>
                </tr>
            </thead>
            <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $tagihan->pembayaran; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr>
                        <td class="text-center">
                            <a href="<?php echo e(route('kwitansipembayaran.show', $item->id)); ?>" target="_blank">
                                <i class="fa fa-print"></i>
                            </a>
                            <?php echo Form::open([
                                'route' => [auth()->user()->akses . '.pembayaran.destroy', $item->id],
                                'method' => 'DELETE',
                                'onsubmit' => 'return confirm("Yakin ingin menghapus data ini?")',
                            ]); ?>

                            <button type="submit" class="text-danger border-0 rounded-pill bg-transparent">
                                <i class="bi bi-trash d-md-inline d-none"></i>
                            </button>
                            <?php echo Form::close(); ?>

                        </td>
                        <td><?php echo e($item->tanggal_bayar->translatedFormat('d/m/y')); ?></td>
                        <td><?php echo e($item->metode_pembayaran); ?></td>
                        <td class="text-end"><?php echo e(formatRupiah($item->jumlah_dibayar)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr class="text-center">
                        <td colspan="4">Data Belum Ada</td>
                    </tr>
                <?php endif; ?>
                <tr>
                    <td colspan="3" class="fw-bold text-center">Total Pembayaran</td>
                    <td class="text-end fw-bold"><?php echo e(formatRupiah($tagihan->total_pembayaran)); ?></td>
                    
                </tr>

                <tr>
                    <td colspan="4" class="fw-bold text-center">Status Pembayaran: <?php echo e(strtoupper($tagihan->status)); ?>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php if($tagihan->status != 'lunas'): ?>
        <div class="card-body">
            <h5 class="card-title">
                <i class="bi bi-patch-exclamation"></i>
                Form Pembayaran
            </h5>
            <?php echo Form::model($model, ['route' => auth()->user()->akses . '.pembayaran.store', 'method' => 'POST']); ?>

            <?php echo Form::hidden('tagihan_id', $tagihan->id, []); ?>

            <div class="form-group">
                <label for="tanggal_bayar" class="form-label">Tanggal Pembayaran</label>
                <?php echo Form::date('tanggal_bayar', $model->tanggal_bayar ?? date('Y-m-d'), [
                    'class' => 'form-control',
                ]); ?>

                <span class="text-danger"><?php echo e($errors->first('tanggal_bayar')); ?></span>
            </div>
            <div class="form-group mt-3">
                <label for="jumlah_dibayar" class="form-label">Jumlah Bayar</label>
                <?php echo Form::text('jumlah_dibayar', $tagihan->total_tagihan, [
                    'class' => 'form-control rupiah',
                ]); ?>

                <span class="text-danger"><?php echo e($errors->first('jumlah_dibayar')); ?></span>
            </div>
            <?php echo Form::submit('SIMPAN', ['class' => 'btn btn-primary mt-3']); ?>

            <?php echo Form::close(); ?>

        </div>
    <?php endif; ?>
</div>
<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/components/user/tagihan_show/data_form.blade.php ENDPATH**/ ?>