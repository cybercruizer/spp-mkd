@extends('layouts.app_niceadmin', ['title' => 'Data Siswa'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="alert d-none my-1" role="alert" id="alert-message"></div>
                <h5 class="card-header fw-bold fs-5" style="color: #012970;">{{ $title . ' ' .$kelas .' ' .$rombel }}</h5>
                <div class="card-body">
                    <div class="row my-3">
                        
                        <div class="col-md-6">
                            <p>Ketua Kelas : {{ $ketuakelas }}</p>
                            {!! Form::open(['route' => $routePrefix . '.index', 'method' => 'GET']) !!}
                            <div class="input-group">
                                <input name="q" type="text" class="form-control" placeholder="Cari Nama Siswa"
                                    aria-label="cari nama" aria-describedby="button-addon2" value="{{ request('q') }}">
                                <button class="btn btn-outline-primary" type="submit" id="button-addon2">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    {{-- <div class="row my-3">
                        <div class="col-md-5">

                        </div>
                        <div class="col-md-7">
                            {!! Form::open(['route' => 'siswaimport.store', 'method' => 'POST', 'files' => true]) !!}
                            <div class="input-group">
                                <input name="template" type="file" class="form-control" id="inputGroupFile04"
                                    aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                <button class="btn btn-primary" type="submit" id="inputGroupFileAddon04">Upload
                                    Excel</button>
                                <a href="{{ asset('template_excel.xlsx') }}" class="btn btn-outline-primary"
                                    target="_blank">
                                    Download Template Excel</a>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div> --}}
                    
                    <div class="table-responsive">
                        <table class="{{ config('app.table_style') }}">
                            <thead class="{{ config('app.thead_style') }}">
                                <tr>
                                    <th width="1%;">No</th>
                                    <th>Nama</th>
                                    <th>Wali Murid</th>
                                    <th>Biaya SPP</th>
                                    <th>Ktg</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($models as $model=>$item)
                                    <tr>
                                        <td>{{ $models->firstItem() + $model }}</td>
                                        <td width="20%">{{ $item->nama }}</td>
                                        <td>{{ $item->wali->name ?? '-' }}</td>
                                        <td>
                                            @switch($item->kategori)
                                                @case('AP50')
                                                    {{ formatRupiah($item->biaya->total_tagihan*50/100) }}
                                                    @break
                                                @case('AP100')
                                                    {{ formatRupiah(0) }}
                                                    @break
                                                @default
                                                    {{ formatRupiah($item->biaya->total_tagihan) }}
                                            @endswitch
                                            
                                        </td>
                                        <td>{{ $item->kategori }}</td>
                                        {{-- cara pak aim <td>{{ formatRupiah($item->biaya?->first()->total_tagihan) }}</td> --}}
                                        <td class="text-center">
                                            {!! Form::open([
                                                'route' => [$routePrefix . '.destroy', $item->id],
                                                'method' => 'DELETE',
                                                'onsubmit' => 'return confirm("Jika data ini dihapus maka data tagihan dan pembayaran akan terhapus, yakin ?")',
                                            ]) !!}
                                            <a href="{{ route($routePrefix . '.edit', $item->id) }}"
                                                class="btn btn-sm btn-warning">
                                                <i class="bi bi-pencil-square d-md-inline d-none"></i> E
                                            </a>
                                            <a href="{{ route($routePrefix . '.show', $item->id) }}"
                                                class="btn btn-sm btn-info mx-1">
                                                <i class="bi bi-info-circle d-md-inline d-none"></i> D
                                            </a>
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="bi bi-trash d-md-inline d-none"></i> H
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center fw-bold">Tidak ada data</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {!! $models->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
