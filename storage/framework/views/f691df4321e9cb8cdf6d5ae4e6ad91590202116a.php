<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header fw-bold fs-5" style="color: #012970;">DATA TAGIHAN SPP</h5>
                <div class="card-body">
                    <div class="row my-4">
                        <div class="col-md-12">
                            <?php echo Form::open(['route' => 'wali.tagihan.index', 'method' => 'GET']); ?>

                            <div class="row justify-content-end gx-2">
                                <div class="col-md-3 col-sm-12 my-3 my-md-0">
                                    <?php echo Form::text('q', request('q'), ['class' => 'form-control', 'placeholder' => 'Pencarian Data Siswa']); ?>

                                </div>
                                <div class="col-md-2 col-sm-12 mb-3 mb-md-0">
                                    <?php echo Form::select(
                                        'status',
                                        [
                                            'lunas' => 'Lunas',
                                            'baru' => 'Baru',
                                            'angsur' => 'Angsur',
                                        ],
                                        request('status'),
                                        ['class' => 'form-select', 'placeholder' => 'pilih status'],
                                    ); ?>

                                </div>

                                <div class="col-md-2 col-sm-12 mb-3 mb-md-0">
                                    <?php echo Form::select('biaya_id', $biayaList, request('biaya_id'), [
                                        'class' => 'form-select',
                                        'placeholder' => 'Pilih biaya',
                                    ]); ?>

                                </div>
                                <div class="col-md-2 col-sm-12 mb-3 mb-md-0">
                                    <?php echo Form::selectMonth('bulan', request('bulan'), ['class' => 'form-control', 'placeholder' => 'Pilih Bulan']); ?>

                                </div>
                                <div class="col-md-1 col-sm-12 mb-3 mb-md-0">
                                    <?php echo Form::selectRange('tahun', date('Y') - 3, date('Y') + 1, request('tahun') ?? date('Y'), [
                                        'class' => 'form-control',
                                    ]); ?>

                                </div>
                                <div class="col">
                                    <button class="btn btn-primary" type="submit">Tampil</button>
                                </div>
                            </div>
                            <?php echo Form::close(); ?>

                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        <table class="<?php echo e(config('app.table_style')); ?>">
                            <thead class="<?php echo e(config('app.thead_style')); ?>">
                                <tr>
                                    <th width="1%;">No</th>
                                    <th>Nama Siswa</th>
                                    <th>Jurusan</th>
                                    <th>Kelas</th>
                                    <th>Tgl Tagihan</th>
                                    <th>Jenis Tagihan</th>
                                    <th>Status Pembayaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $tagihan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr valign="middle">
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($item->siswa->nama); ?></td>
                                        <td><?php echo e($item->siswa->jurusan); ?></td>
                                        <td><?php echo e($item->siswa->kelas.' '.$item->siswa->relrombel->nama_rombel); ?></td>
                                        <td><?php echo e($item->tanggal_tagihan->translatedFormat('F Y')); ?></td>
                                        <td><?php echo e($item->biaya->nama); ?></td>
                                        <td>
                                            <?php if($item->pembayaran->count() >= 1): ?>
                                                <a href="<?php echo e(route('wali.pembayaran.show', $item->pembayaran->first()->id)); ?>"
                                                    class="btn btn-sm btn-warning">
                                                    <?php echo e($item->pembayaran->first()->tanggal_konfirmasi == null ? 'Belum dikonfirmasi' : 'Sudah dibayar'); ?>

                                                </a>
                                            <?php else: ?>
                                                <?php echo e($item->getStatusTagihanWali()); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($item->status == 'baru' || $item->status == 'angsur'): ?>
                                                <a href="<?php echo e(route('wali.tagihan.show', $item->id)); ?>"
                                                    class="btn btn-sm btn-primary">Lakukan Pembayaran</a>
                                            <?php else: ?>
                                                <a href="" class="btn btn-sm btn-success">Pembayaran sudah lunas</a>
                                            <?php endif; ?>
                                        </td>
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
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Data tagihan'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/wali/tagihan_index.blade.php ENDPATH**/ ?>