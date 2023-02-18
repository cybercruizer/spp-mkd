@extends('layouts.app_niceadmin', ['title' => 'Form Data Biaya'])

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h5 class="card-header fw-bold" style="color: #012970;">FORM DATA BIAYA</h5>
                <div class="card-body">
                    {!! Form::model($model, ['route' => $route, 'method' => $method, 'files' => true]) !!}
                    @if (request()->filled('parent_id'))
                        <h4 class="card-title">
                            <i class="bi bi-patch-exclamation"></i>
                            Informasi {{ $parentData->nama }}
                        </h4>
                        {!! Form::hidden('parent_id', $parentData->id, []) !!}
                        <div class="row">
                            <div class="col-xxl-6">
                                <table class="{{ config('app.table_style') }}">
                                    <thead class="{{ config('app.thead_style') }}">
                                        <tr>
                                            <th width="1%;">Parent ID</th>
                                            <th>Nama Biaya</th>
                                            <th>Jumlah</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($parentData->children as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ formatRupiah($item->jumlah) }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('biaya.edit', $item->id) }}"
                                                        class="btn btn-sm btn-warning my-1 my-md-0">
                                                        <i class="bi bi-pencil-square d-md-inline d-none"></i>
                                                        Edit
                                                    </a>
                                                    <a href="{{ route('delete-biaya.item', $item->id) }}"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                        <i class="bi bi-trash d-md-inline d-none"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center fw-bold">Tidak ada data</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    <div class="form-group mt-3">
                        <label for="nama" class="form-label">Nama Biaya</label>
                        {!! Form::text('nama', null, ['class' => 'form-control', 'autofocus', 'required']) !!}
                        <small class="text-danger">{{ $errors->first('nama') }}</small>
                    </div>
                    @if (request('parent_id') == null)
                        {!! Form::hidden('jumlah', $model->jumlah ?? 0, []) !!}
                    @else
                        <div class="form-group mt-3">
                            <label for="jumlah" class="form-label">Jumlah</label>
                            {!! Form::text('jumlah', null, [
                                'class' => 'form-control rupiah',
                                'required' => 'required',
                            ]) !!}
                            <small class="text-danger">{{ $errors->first('jumlah') }}</small>
                        </div>
                    @endif
                    {!! Form::submit($button, ['class' => 'btn btn-primary pull-right mt-3']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
