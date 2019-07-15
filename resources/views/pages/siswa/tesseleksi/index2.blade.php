@extends('layouts.siswa')
@section('main-content')
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-body">
                @isset($message_pembayaran)
                <h4 class="text-center text-red text-muted"><u><b>{{ $message_pembayaran }}</b></u></h4>
                @endisset
            </div>
            <div class="box-body">
                <div class="text-center">
                    <h3>Jadwal Tes Seleksi</h3>
                    <h4>{{ date_format(date_create($jadwal_tes->tgl_mulai_tes), 'd M Y') }} s.d {{ date_format(date_create($jadwal_tes->tgl_akhir_tes), 'd M Y') }}</h4>
                    <h5>Silahkah datang ke kampus untuk melakukan Tes Seleksi, dengan membawa bukti pembayaran registrasi anda. Terimakasih</h5>
                </div>
                <br>
                <div class="col-md-4" style="margin-left:330px;">
                    <a href="/siswa/pembayaran" class="btn btn-primary btn-flat btn-lg btn-block"> <b>Cetak Bukti Pembayaran</b></a>
                </div>
            </div>
            <div class="box-footer"></div>
        </div>
    </div>
</div>
@endsection

