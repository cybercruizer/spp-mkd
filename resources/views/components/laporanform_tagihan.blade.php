{!! Form::open([
    'route' => auth()->user()->akses . '.laporantagihan.index',
    'method' => 'GET',
    'target' => 'blank',
]) !!}
<div class="row">
    <div class="col-md-2 col-sm-12 mb-1 mb-md-0">
        <label for="biaya_id" class="form-label">Jenis Tagihan</label>
        {!! Form::select('biaya_id', $biayaList, request('biaya_id'), [
            'class' => 'form-select',
            'placeholder' => 'Pilih Jenis Tagihan',
        ]) !!}
    </div>
    <div class="col-md-2 col-sm-12 mb-1 mb-md-0">
        <label for="kelas" class="form-label">Kelas</label>
        {!! Form::select('kelas', getNamaKelas(), request('kelas'), [
            'class' => 'form-select',
            'placeholder' => 'Pilih Kelas',
        ]) !!}
    </div>
    <div class="col-md-2 col-sm-12 mb-1 mb-md-0">
        <label for="rombel" class="form-label">Rombel</label>
        {!! Form::select('rombel', getNamaRombel(), request('rombel'), [
            'class' => 'form-select',
            'placeholder' => 'Pilih Rombel',
        ]) !!}
    </div>
    <div class="col-md-2 col-sm-12 mb-1 mb-md-0">
        <label for="angkatan" class="form-label">Angkatan</label>
        {!! Form::selectRange('angkatan', 2021, date('Y') + 1, null, [
            'class' => 'form-control',
            'placeholder' => 'Pilih Angkatan',
        ]) !!}
        <small class="text-danger">{{ $errors->first('angkatan') }}</small>
    </div>
    <div class="col-md-2 col-sm-12 mb-1 mb-md-0">
        <label for="status" class="form-label">Status Tagihan</label>
        {!! Form::select(
            'status',
            [
                '' => 'Pilih Status',
                'lunas' => 'Lunas',
                'baru' => 'Baru',
                'angsur' => 'Angsur',
            ],
            request('status'),
            ['class' => 'form-select'],
        ) !!}
    </div>
    <div class="col-md-1 col-sm-12 mb-1 mb-md-0">
        <label for="bulan" class="form-label">Bulan</label>
        {!! Form::selectMonth('bulan', request('bulan'), ['class' => 'form-control', 'placeholder' => 'Pilih Bulan']) !!}
    </div>
    <div class="col-md-1 col-sm-12 mb-1 mb-md-0">
        <label for="tahun" class="form-label">Tahun</label>
        {!! Form::selectRange('tahun', date('Y') - 3, date('Y'), request('tahun') ?? date('Y'), [
            'class' => 'form-control',
        ]) !!}
    </div>
    <div class="col align-self-end mt-1 mt-md-0">
        <button class="btn btn-primary" type="submit">Tampil</button>
    </div>
</div>
{!! Form::close() !!}
