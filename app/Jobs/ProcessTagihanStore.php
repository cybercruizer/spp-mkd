<?php

namespace App\Jobs;

use App\Models\Siswa;
use App\Models\Tagihan as Model;
use App\Models\TagihanDetail;
use App\Notifications\TagihanNotification;
use Carbon\Carbon;
use DB;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Notification;
use Imtigger\LaravelJobStatus\Trackable;

class ProcessTagihanStore implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, Trackable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    private $requestData;
    public function __construct($requestData)
    {
        $this->prepareStatus();
        $this->requestData = $requestData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $requestData = $this->requestData;
        if ($requestData['kelas']==10) {
            $siswa = Siswa::currentStatus('aktif')->where('kelas',10);
        } elseif ($requestData['kelas']==11) {
            $siswa = Siswa::currentStatus('aktif')->where('kelas',11);
        } elseif ($requestData['kelas']==12) {
            $siswa = Siswa::currentStatus('aktif')->where('kelas',12);
        } else {
            $siswa = Siswa::currentStatus('aktif');
        }
        $requestData['status'] = 'baru';
        $tanggalTagihan = Carbon::parse($requestData['tanggal_tagihan']);
        $bulanTagihan = $tanggalTagihan->format('m');
        $tahunTagihan = $tanggalTagihan->format('Y');
        $jenisTagihan = 'spp';

        if (isset($requestData['siswa_id']) && $requestData['siswa_id'] != null) {
            $siswa = $siswa->where('id', $requestData['siswa_id']);
        }
        $siswa = $siswa->get();
        $this->setProgressMax($siswa->count());
        $i = 1;

        DB::beginTransaction();
        foreach ($siswa as $itemSiswa) {
            $this->setProgressNow($i);
            $i++;
            $requestData['siswa_id'] = $itemSiswa->id;
            $requestData['biaya_id'] = $itemSiswa->biaya_id; //tambahan
            $cekTagihan = $itemSiswa->tagihan->filter(function ($value) use ($bulanTagihan, $tahunTagihan,$jenisTagihan) {
                return $value->tanggal_tagihan->year == $tahunTagihan && $value->tanggal_tagihan->month == $bulanTagihan && $value->jenis == $jenisTagihan;
            })->first();

            if ($cekTagihan == null) {
                $tagihan = Model::create($requestData);
                if ($tagihan->siswa->wali != null) {
                    Notification::send($tagihan->siswa->wali, new TagihanNotification($tagihan));
                }
                $biaya = $itemSiswa->biaya->children;
                foreach ($biaya as $itemBiaya) {
                    switch($itemSiswa->kategori) {
                        case('REG'):
                            $jumlahBiaya=$itemBiaya->jumlah;
                            break;
                        case('AP50'):
                            $jumlahBiaya=$itemBiaya->jumlah*(50/100);
                            //$jumlahBiaya=$jumlah*(50/100);
                            break;
                        case('AP100'):
                            $jumlahBiaya=0;
                            //$jumlahBiaya=$jumlah*(50/100);
                            break;
                    }
                    TagihanDetail::create([
                        'tagihan_id' => $tagihan->id,
                        'nama_biaya' => $itemBiaya->nama,
                        'jumlah_biaya' => $jumlahBiaya,
                    ]);
                }
            }
        }
        DB::commit();
        // sleep(4); // akan delay 1 detik
        $this->setOutput(['message' => 'Tagihan Bulan ' . ubahNamaBulan($bulanTagihan) . ' ' . $tahunTagihan]);
    }
}
