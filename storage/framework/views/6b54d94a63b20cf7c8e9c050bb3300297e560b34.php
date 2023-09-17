<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>
        <?php echo e(@$title != '' ? "$title |" : ''); ?> <?php echo e(settings()->get('app_name', 'My APP')); ?>

    </title>

    <style>
        * {
            color: black;
        }

        .invoice-box {
            background-color: #ffffff;
            max-width: 700px;
            margin: auto;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #fff;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {}

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .invoice-box.rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .invoice-box.rtl table {
            text-align: right;
        }

        .invoice-box.rtl table tr td:nth-child(2) {
            text-align: left;
        }

        hr {
            margin: 0 0;
            padding: 0 0;
        }

        .btn {
            display: inline-block;
            font-weight: 400;
            line-height: 1.53;
            color: #697a8d;
            text-align: center;
            vertical-align: middle;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            background-color: transparent;
            border: 1px solid transparent;
            padding: 0.4375rem 1.25rem;
            font-size: 0.9375rem;
            border-radius: 0.375rem;
            transition: all 0.2s ease-in-out;
            text-decoration: none;
        }

        .btn-primary {
            color: #fff;
            background-color: #696cff;
            border-color: #696cff;
            box-shadow: 0 0.125rem 0.25rem 0 rgb(105 108 255 / 40%);
        }

        .heading td,
        .item td,
        .total td {
            border: 1px solid black;
        }

        @media print {
            @page {
                size: A4 portrait;
            }

            .tombol {
                display: none;
            }

            .invoice-box {
                background-color: #ffffff !important;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <?php echo $__env->make('components.header_invoice_kartu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <tr class="information">
                <td colspan="3">
                    <table>
                        <tr>
                            <td>
                                Tagihan Untuk : <?php echo e($tagihan->siswa->nama); ?> (<?php echo e($tagihan->siswa->nisn); ?>)<br />
                                Kelas&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo e($tagihan->siswa->kelas); ?> <?php echo e($tagihan->siswa->rombel); ?><br />
                                Jurusan&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo e($tagihan->siswa->jurusan); ?>

                            </td>

                            <td>
                                <div>Nomor Invoice       : #<?php echo e($tagihan->id); ?></div>
                                <div>Tanggal Tagihan     :
                                    <?php echo e($tagihan->tanggal_tagihan->translatedFormat('d F Y')); ?></div>
                                <div>Tanggal Jatuh Tempo :
                                    <?php echo e($tagihan->tanggal_jatuh_tempo->translatedFormat('d F Y')); ?></div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading" style="outline: thin solid;">
                <td style="text-align: center">No</td>
                <td style="text-align: center">Item Tagihan</td>
                <td style="text-align: end">Sub-Total</td>
            </tr>

            <?php $__currentLoopData = $tagihan->tagihanDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="item" style="outline: thin solid">
                    <td style="text-align: center"><?php echo e($loop->iteration); ?></td>
                    <td style="text-align: center"><?php echo e($item->nama_biaya); ?></td>
                    <td style="text-align: end"><?php echo e(formatRupiah($item->jumlah_biaya)); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <tr class="total" style="background: #fff;outline: thin solid">
                <td colspan="2" style="text-align: center; font-weight: bold;">Total : </td>
                <td><?php echo e(formatRupiah($tagihan->total_tagihan)); ?></td>
            </tr>
            <tr>
                <td colspan="3">
                    <div>
                        Terbilang: <i>
                            <?php echo e(ucwords(terbilang($tagihan->total_tagihan))); ?> Rupiah
                        </i>
                    </div>
                    <hr>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    Magelang, <?php echo e($tagihan->tanggal_tagihan->translatedFormat('d F Y')); ?> <br>
                    <?php echo $__env->make('components.informasi_pj', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </td>
            </tr>
        </table>
        <center style="margin-top: 20px;" class="tombol">
            <a class="btn btn-primary" href="<?php echo e(url()->current() . '?output=pdf'); ?>">Download PDF</a>
            <a class="btn btn-primary" href="#" onclick="window.print()">Cetak</a>
        </center>
    </div>
</body>

</html>
<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/invoice.blade.php ENDPATH**/ ?>