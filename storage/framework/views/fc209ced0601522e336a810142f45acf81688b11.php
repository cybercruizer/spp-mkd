<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header fw-bold fs-5" style="color: #012970;">DETAIL DATA PEMBAYARAN</h5>


                <div class="card-body">
                    <div class="table-responsive mt-3">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <td colspan="2" class="bg-secondary text-white fw-bold shadow-sm">
                                        INFORMASI SISWA
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nama Siswa</td>
                                    <td>: <?php echo e($model->tagihan->siswa->nama); ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Wali</td>
                                    <td>: <?php echo e($model->wali->name); ?></td>
                                </tr>
                                <tr>
                                    <td colspan="2" class="bg-secondary text-white fw-bold shadow-sm">
                                        INFORMASI TAGIHAN
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%">Nomor Tagihan</td>
                                    <td>: <?php echo e($model->tagihan->id); ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Tagihan</td>
                                    <td>: <?php echo e($model->tagihan->biaya->nama); ?></td>
                                </tr>
                                <tr>
                                    <td>Invoice Tagihan</td>
                                    <td>:
                                        <a href="<?php echo e(route('invoice.show', $model->tagihan_id)); ?>" target="_blank">
                                            <i class="fa fa-print"></i>
                                            Cetak
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total Tagihan</td>
                                    <td>: <?php echo e(formatRupiah($model->tagihan->total_tagihan)); ?></td>
                                </tr>
                                <?php if($model->metode_pembayaran != 'manual'): ?>
                                    <tr>
                                        <td colspan="2" class="bg-secondary text-white fw-bold shadow-sm">
                                            INFORMASI BANK PENGIRIM
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bank Pengirim</td>
                                        <td>: <?php echo e($model->waliBank->nama_bank); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Rekening</td>
                                        <td>: <?php echo e($model->waliBank->nomor_rekening); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pemilik Rekening</td>
                                        <td>: <?php echo e($model->waliBank->nama_rekening); ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="bg-secondary text-white fw-bold shadow-sm">
                                            INFORMASI BANK TUJUAN
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bank Tujuan</td>
                                        <td>: <?php echo e($model->bankSekolah->nama_bank); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Rekening</td>
                                        <td>: <?php echo e($model->bankSekolah->nomor_rekening); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Pemilik Rekening</td>
                                        <td>: <?php echo e($model->bankSekolah->nama_rekening); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td colspan="2" class="bg-secondary text-white fw-bold shadow-sm">
                                        INFORMASI PEMBAYARAN
                                    </td>
                                </tr>
                                <tr>
                                    <td>Metode Pembayaran</td>
                                    <td>: <?php echo e($model->metode_pembayaran); ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pembayaran</td>
                                    <td>: <?php echo e(optional($model->tanggal_bayar)->translatedFormat('d F Y H:i')); ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Total Tagihan</td>
                                    <td>: <?php echo e(formatRupiah($model->tagihan->tagihanDetails->sum('jumlah_biaya'))); ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Yang Dibayar</td>
                                    <td>: <?php echo e(formatRupiah($model->jumlah_dibayar)); ?></td>
                                </tr>
                                <?php if($model->bukti_bayar != null && \Storage::exists($model->bukti_bayar)): ?>
                                    <tr>
                                        <td>Bukti Pembayaran</td>
                                        <td>:
                                            <a href="javascript:void[0]"
                                                onclick="popupCenter({url: '<?php echo e(\Storage::url($model->bukti_bayar)); ?>', title: 'Bukti Pembayaran', w: 900, h: 700}); ">
                                                Lihat Bukti Bayar
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <tr>
                                    <td>Status Konfirmasi</td>
                                    <td>: <?php echo e($model->status_konfirmasi); ?></td>
                                </tr>
                                <tr>
                                    <td>Status Pembayaran</td>
                                    <td>: <?php echo e($model->tagihan->getStatusTagihanWali()); ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Konfirmasi</td>
                                    <td>: <?php echo e(optional($model->tanggal_konfirmasi)->translatedFormat('d F Y H:i')); ?></td>
                                </tr>
                            </thead>
                        </table>
                        <?php if($model->tanggal_konfirmasi == null): ?>
                            <?php echo Form::open([
                                'route' => ['wali.pembayaran.destroy', $model->id],
                                'method' => 'DELETE',
                                'onsubmit' => 'return confirm("Yakin ingin membatalkan data ini?")',
                            ]); ?>

                            <button type="submit" class="btn btn-sm btn-danger my-3">
                                <i class="fa fa-trash"></i> Batalkan Konfirmasi Pembayaran
                            </button>
                            <?php echo Form::close(); ?>


                            <div class="alert alert-primary" role="alert">
                                <h3>Pembayaran sedang dikonfirmasi</h3>
                            </div>
                        <?php else: ?>
                            <div class="alert alert-primary" role="alert">
                                <h3>Pembayaran telah dikonfirmasi</h3>
                            </div>
                            <a href="<?php echo e(route('kwitansipembayaran.show', $model->id)); ?>" target="_blank">
                                <i class="bi bi-file-earmark-arrow-down"></i> Download kwitansi
                            </a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app_niceadmin', ['title' => 'Detail Pembayaran'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/wali/pembayaran_show.blade.php ENDPATH**/ ?>