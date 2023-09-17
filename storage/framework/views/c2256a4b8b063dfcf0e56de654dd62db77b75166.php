<?php echo Form::open([
    'route' => auth()->user()->akses . '.laporanrekappembayaran.index',
    'method' => 'GET',
    'target' => '_blank',
]); ?>

<div class="row">
    <div class="col-md-2 col-sm-12 mb-1 mb-md-0">
        <label for="kelas" class="form-label">Kelas</label>
        <?php echo Form::select('kelas', getNamaKelas(), request('status'), [
            'class' => 'form-select',
            'placeholder' => 'Pilih Kelas',
        ]); ?>

    </div>
    <div class="col-md-2 col-sm-12 mb-1 mb-md-0">
        <label for="jurusan" class="form-label">Jurusan</label>
        <?php echo Form::select('jurusan', getNamaJurusan(), request('status'), [
            'class' => 'form-select',
            'placeholder' => 'Pilih Jurusan',
        ]); ?>

    </div>
    <div class="col-md-2 col-sm-12 mb-1 mb-md-0">
        <label for="rombel" class="form-label">Rombel</label>
        <?php echo Form::select('rombel', getNamaRombel(), request('status'), [
            'class' => 'form-select',
            'placeholder' => 'Pilih Rombel',
        ]); ?>

    </div>
    <div class="col-md-2 col-sm-12 mb-1 mb-md-0">
        <label for="tahun" class="form-label">Tahun Ajaran</label>
        <?php echo Form::select('tahun', getRangeTahun(), request('tahun') ?? date('Y'), [
            'class' => 'form-select',
        ]); ?>

    </div>
    <div class="col align-self-end mt-1 mt-md-0">
        <button class="btn btn-primary" type="submit">Tampil</button>
    </div>
</div>
<?php echo Form::close(); ?>

<?php /**PATH /Users/anurkholis/Sites/spp-zepi/resources/views/components/laporanform_rekappembayaran.blade.php ENDPATH**/ ?>