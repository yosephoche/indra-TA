@extends('layouts.siswa')
@section('main-content')
<div class="row">
    <!-- @isset($message_header)
        <div class="col-md-12">
            <div class="callout callout-info text-center">
                <h4>{{ $message_header }}</h4>
                <p>{{ $message_content }}</p>
            </div>
        </div>
    @endisset -->
    <!-- @isset($calonsiswa) -->
        @if($calonsiswa->status_penerimaan == "diterima")
        <div class="col-md-12">
            <div class="callout callout-success text-center">
                <h4>Selamat Anda Diterima !!!</h4>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <div class="box-title">
                        Informasi!!!
                    </div>
                </div>
                <div class="box-body">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Pilihan Jurusan</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-capitalize">{{ $calonsiswa->nm_cln_siswa }}</td>
                                <td class="text-uppercase">{{ $calonsiswa->jurusan->nm_jurusan }}</td>
                                <td class="text-uppercase">{{ $calonsiswa->kelas->kd_kelas }} - {{ $calonsiswa->kelas->nm_kelas }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <hr>
                <div class="box-body text-center">
                    <h3>Bagi calon mahasiswa yang sudah dinyatakan "LULUS" dan "DITERIMA"<br>Silahkan datang ke Kampus untuk melakukan pendaftaran ulang dan verifikasi berkas <br>dan membawa dokumen-dokumen asli.</h3>
                </div>
                <div class="box-footer"></div>
            </div>
        </div>
        @else
        <div class="col-md-12">
            <div class="callout callout-default text-center">
                <h4>Belum ada pengumuman penerimaan.</h4>
            </div>
        </div>
        @endif
    <!-- @endisset -->
</div>
@endsection

@push('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/datepicker/datepicker3.css') }}">
@endpush

@push('script')
    <script type="text/javascript" src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    {{-- Setting DatePicker3 --}}
    <script type="text/javascript">
        $(".datepicker3").datepicker({
            autoclose : true,
            format: 'dd-mm-yyyy',
        });
    </script>
    <script type="text/javascript">
        $('body').on('click','#btnubah', function(){
            $('.edit').attr('readonly',false);
            $('#btnubah').replaceWith('<button type="submit" class="btn btn-default btn-flat"><i class="fa fa-save"></i>   Simpan</button>');
        });
    </script>
@endpush
