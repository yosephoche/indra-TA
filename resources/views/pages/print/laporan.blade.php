@extends('layouts.print')
@section('htmlheader_title')
    {{-- {{ $no_qr }} --}}
@endsection
@section('main-content')
	<div class="row">
		<div class="box">
			<div class="box-body">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-12">
							<img src="{{ asset('img/header.jpg') }}" class="img-responsive">
						</div>
					</div>
					<hr>
					<div class="row">
						
						<div class="col-md-12 text-center">
							<h3>Laporan Data Calon Mahasiswa</h3>
							{{-- <h4 class="text-capitalize">Tahun Ajaran : {{ $pembayaran->calonsiswa->jadwal->tahunAjaran->th_ajaran }} - {{ $pembayaran->calonsiswa->jadwal->nm_jadwal }}</h4> --}}
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-3">
							{{-- <img src="{{ $img_qr }}" class="img-thumbnail img-responsive"> --}}
						</div>
						<div class="col-md-12">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
                                        <th>No</th>
                                        <th class="text-capitalize">No Pendaftaran</th>
                                        <th class="text-center">Nama Lengkap</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Pilihan<br>Jurusan</th>
                                        <th class="text-center">Status<br>Kelulusan</th>
                                        <th class="text-center">Kelas</th>
                                        <th class="text-center">Jadwal Pendaftaran</th>
                                        {{-- <th class="text-center">Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                @if($calon_siswa->isEmpty())
                                    <tr>
                                        <td colspan="8"><h4 class="text-center">Maaf, Data Masih Kosong</h4></td>
                                    </tr>
                                @else
                                @foreach($calon_siswa as $key => $siswa)
                                @php
                                    // dd($siswa)
                                @endphp
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td class="text-capitalize">{{ $siswa->no_pendf }}</td>
                                    <td class="text-center">{{ $siswa->nm_cln_siswa }}</td>
                                    <td class="text-center">{{ $siswa->alamat }}</td>
                                    <td class="text-center">{{ (is_null($siswa->jurusan)) ? "-":$siswa->jurusan->nm_jurusan }}</td>
                                    <td class="text-center">{{ $siswa->status_penerimaan }}</td>
                                    <td class="text-center">{{ (is_null($siswa->kelas)) ? "-":$siswa->kelas->nm_kelas }}</td>
                                    <td class="text-center">{{ $siswa->jadwal->nm_jadwal }}</td>
                                    {{-- <td class="text-center">
                                        <a href="{{ route('detailJadwalAdmin', $siswa->id_user) }}" class="btn btn-default btn-flat btn-sm"><i class="fa fa-folder-open"></i></a>
                                        <a href="{{ route('editJadwalAdmin', $siswa->id_user) }}" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-edit"></i></a>
                                        <button value="{{ $siswa->id_user }}" class="btn btn-danger btn-flat btn-sm btn_delete" data-toggle="modal" data-target="#modalDeleteJadwal">
                                            <i class="fa fa-trash"></i></button>
                                    </td> --}}
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
							</table>
						</div>
					</div>
                    {{-- @include('pages.print.partials.footer') --}}
                    <hr>
                    {{-- <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <h4>Mengetahui</h4>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <h4>Kepala Kampus</h4>
                                </div>
                                <hr>
                            </div>

                            <div class="col-md-6">
                                <div class="text-center">
                                    <h4>Kepala Kampus</h4>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="text-center">
                                    <h4>Nama Kamu disini</h4>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="text-center">
                                    <h4>Nama Kamu disini</h4>   
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    @push('css')
                    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/print/bootstrap-print.css') }}">
                    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/print/bootstrap-print-md.css') }}">
                    <style type="text/css">
                        @media print {
                        h3 {
                            font-size: 20px;
                        }
                        h4 {
                            font-size: 18px;
                        }
                        }
                    </style>
                    @endpush
                    @push('script')
                    <script type="text/javascript">
                        
                    $( document ).ready(function() {
                        window.onload = function() { window.print(); }
                        // setTimeout(function () { window.print(); }, 500);
                        // window.onfocus = function () { setTimeout(function () { window.close(); }, 500); }
                    });
                        
                    </script>
                    @endpush
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
		</div>
	</div>

@endsection

@push('css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/print/bootstrap-print.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/print/bootstrap-print-md.css') }}">
<style type="text/css">
	@media print {
		h4 {
			font-size: 14px;
		}
	    /* Your styles here */
	}
</style>
@endpush