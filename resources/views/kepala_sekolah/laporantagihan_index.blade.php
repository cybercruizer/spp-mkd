@extends('layouts.app_niceadmin_blank')

@section('content')
    <style>
        @media print {
            * {
                color: black !important;
            }

            table,
            thead,
            tbody,
            tfoot,
            th,
            td {
                border: 1px solid black;
            }

            @page {
                size: landscape;
            }

            .table-striped>tbody>tr:nth-of-type(odd)>* {
                --bs-table-accent-bg: #fff;
            }
        }
    </style>
    <div class="row justify-content-center pr-0">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    @include('kepala_sekolah.laporan_header')
                    <h4 class="my-0 py-0">LAPORAN TAGIHAN</h4>
                    <div class="my-2">Laporan Berdasarkan: {!! $subtitle !!}</div>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="{{ config('app.thead_style') }}">
                                <tr>
                                    <th width="1%">No</th>
                                    <th width="1%;">NIS</th>
                                    <th width="30%;">Nama</th>
                                    <th>Kelas</th>
                                    <th>Tanggal Tagihan</th>
                                    <th>Status</th>
                                    <th>Jenis</th>
                                    <th>Total Tagihan</th>
                                    <th class="text-end">Kekurangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total=0;
                                @endphp
                                @forelse ($tagihan as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->siswa->nisn }}</td>
                                        <td>{{ $item->siswa->nama }}</td>
                                        <td>{{ $item->siswa->kelas }} {{ $item->siswa->rombel }}</td>
                                        <td>{{ $item->tanggal_tagihan->translatedFormat(config('app.format_tanggal')) }}
                                        </td>
                                        <td>{{ $item->status }}</td>
                                        <td>
                                            {{ $item->biaya->nama }}
                                        </td>
                                        <td>{{ formatRupiah($item->total_tagihan) }}
                                        </td>
                                        <td class="text-end">{{ formatRupiah($item->total_tagihan - $item->total_pembayaran) }}
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center fw-bold">Tidak ada data</td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="7" class="text-center fw-bold">Total Tagihan</td>
                                    <td class="text-end fw-bold" colspan="2">
                                        {{ formatRupiah($tagihan->sum('total_tagihan')) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-center fw-bold">Total Kekurangan</td>
                                    <td class="text-end fw-bold"  colspan="2">
                                        {{ formatRupiah($tagihan->sum('total_tagihan') - $tagihan->sum('total_pembayaran')) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7" class="text-center fw-bold">Persentase Pembayaran</td>
                                    <td class="text-end fw-bold"  colspan="2">
                                        @if ($tagihan->sum('total_pembayaran') != 0 &&  $tagihan->sum('total_tagihan') != 0)
                                            {{ number_format((float)$tagihan->sum('total_pembayaran') /  $tagihan->sum('total_tagihan', 2, '.', '')) * 100 }}{{  "%" }}
                                        @endif
                                        
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
