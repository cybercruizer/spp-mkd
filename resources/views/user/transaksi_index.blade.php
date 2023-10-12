@extends('layouts.app_niceadmin', ['title' => 'Data Tagihan'])

@section('js')
    <script>
        $(document).ready(function() {
            $('#btn-lunas').hide();
            $('#btn-hapus').hide();
            $('.check-tagihan-id').change(function(e) {
                if ($(this).prop('checked')) {
                    $('#btn-lunas').show();
                    $('#btn-hapus').show();
                }
                if ($('.check-tagihan-id:checked').length == 0) {
                    $('#btn-lunas').hide();
                    $('#btn-hapus').hide();
                }
            });
            $('#checked-all').click(function(e) {
                if ($(this).is(":checked")) {
                    $('#btn-lunas').show();
                    $('#btn-hapus').show();
                    $('.check-tagihan-id').prop('checked', true);
                } else {
                    $('#btn-lunas').hide();
                    $('#btn-hapus').hide();
                    $('.check-tagihan-id').prop('checked', false);
                }
            });
            $('#btn-lunas').click(function(e) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    type: 'POST',
                    url: "{{ route(auth()->user()->akses . '.tagihanupdate.lunas') }}",
                    data: $('.check-tagihan-id').serialize(),
                    dataType: 'json',
                    beforeSend: function() {},
                    success: function(response) {
                        $('#alert-message').removeClass('d-none');
                        $('#alert-message').addClass('alert-success');
                        $('#alert-message').html(response.message);
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        $('#alert-message').removeClass('d-none');
                        $('#alert-message').addClass('alert-danger');
                        $('#alert-message').html(xhr.responseJSON.message);
                    },
                });
                e.preventDefault();
                return;
            });
            $('#btn-hapus').click(function(e) {
                let confirmHapus = confirm('Yakin hapus ?');
                if (confirmHapus) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: 'POST',
                        url: "{{ route(auth()->user()->akses . '.tagihandestory.ajax') }}",
                        data: $('.check-tagihan-id').serialize(),
                        dataType: 'json',
                        beforeSend: function() {},
                        success: function(response) {
                            $('#alert-message').removeClass('d-none');
                            $('#alert-message').addClass('alert-success');
                            $('#alert-message').html(response.message);
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            $('#alert-message').removeClass('d-none');
                            $('#alert-message').addClass('alert-danger');
                            $('#alert-message').html(xhr.responseJSON.message);
                        },
                    });
                    e.preventDefault();
                    return;
                }
            });
        })
    </script>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="alert d-none my-1" role="alert" id="alert-message"></div>
                <h5 class="card-header fw-bold fs-5" style="color: #012970;">Transaksi Pembayaran</h5>
                <div class="card-body">
                    {!! Form::open(['route' => 'user.transaksi.show', 'method' => 'GET']) !!}
                    <div class="row my-4">                  
                        <div class="col-md-12">
                            {!! Form::select('siswa_id', $siswa->pluck('nama', 'id'), null, ['class' => 'form-select select2']) !!}
                        </div>
                    </div>
                    <div class="row my-4">
                        <div class="col-md-12">
                            {!! Form::submit('cari', ['class' => 'btn btn-primary btn-block']) !!}
                        </div>
                    </div>
                    b:{!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
