<?php


namespace App\Http\Controllers\KepalaSekolah;

use App\Models\Biaya;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaporanTagihanController extends Controller
{
    public function index(Request $request)
    {
        $title = "Laporan Tagihan";
        $subtitle = "";
        $tagihan = Tagihan::latest();
        if ($request->filled('tahun')) {
            $tagihan->whereYear('tanggal_tagihan', $request->tahun);
            // $subtitle = "Tahun: ".$request->tahun;
            $subtitle = "<span class='badge rounded-pill bg-success'>Tahun: " . $request->tahun . "</span>";
        }
        if ($request->filled('bulan')) {
            $tagihan->whereMonth('tanggal_tagihan', $request->bulan);
            // $subtitle = $subtitle." | Bulan: ".ubahNamaBulan($request->bulan);
            $subtitle = $subtitle . " | <span class='badge rounded-pill bg-primary'>Bulan: " . ubahNamaBulan($request->bulan) . "</span>";
        }
        if ($request->filled('biaya_id')) {
            $tagihan->where('biaya_id', $request->biaya_id);
            // $subtitle = $subtitle." | Jenis: ".$request->biaya_id;
            $biayaNama = Biaya::findOrFail($request->biaya_id);
            $subtitle = $subtitle . " | <span class='badge rounded-pill bg-warning'>Jenis: " . $biayaNama->nama . "</span>";
            $biayaNama = '';
        }
        if ($request->filled('status')) {
            $tagihan->where('status', $request->status);
            // $subtitle = $subtitle." | Status: ".$request->status;
            $subtitle = $subtitle . " | <span class='badge rounded-pill bg-warning'>Status: " . $request->status . "</span>";
        }
        if ($request->filled('jurusan')) {
            $tagihan->whereHas('siswa', function ($q) use ($request) {
                $q->where('jurusan', $request->jurusan);
            });
            // $subtitle = $subtitle." Jurusan: ".$request->jurusan;
            $subtitle = $subtitle . " | <span class='badge rounded-pill bg-warning'>Status: " . $request->status . "</span>";
        }
        if ($request->filled('kelas')) {
            $tagihan->whereHas('siswa', function ($q) use ($request) {
                $q->where('kelas', $request->kelas);
            });
            // $subtitle = $subtitle." Kelas: ".$request->kelas;
            $subtitle = $subtitle . " | <span class='badge rounded-pill bg-danger'>Kelas: " . $request->kelas . "</span>";
        }
        if ($request->filled('rombel')) {
            $tagihan->whereHas('siswa', function ($q) use ($request) {
                $q->where('rombel', $request->rombel);
            });
            // $subtitle = $subtitle." Kelas: ".$request->kelas;
            $subtitle = $subtitle . " | <span class='badge rounded-pill bg-danger'>Rombel: " . $request->rombel . "</span>";
        }
        if ($request->filled('angkatan')) {
            $tagihan->whereHas('siswa', function ($q) use ($request) {
                $q->where('angkatan', $request->angkatan);
            });
            // $subtitle = $subtitle." Angkatan: ".$request->angkatan;
            $subtitle = $subtitle . " | <span class='badge rounded-pill bg-secondary'>Angkatan: " . $request->angkatan . "</span>";
        }

        $tagihan = $tagihan->get();
        return view('kepala_sekolah.laporantagihan_index', compact('tagihan', 'title', 'subtitle'));
    }

    // if($request->status == 'sudah-dikonfirmasi'){
    //     $tagihan->whereNotNull('tanggal_konfirmasi');
    // }
    // if($request->status == 'belum-dikonfirmasi'){
    //     $tagihan->whereNull('tanggal_konfirmasi');
    // }
}
