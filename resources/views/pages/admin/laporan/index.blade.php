@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Jadwal Pendaftaran') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
    	<div class="box">
    		<div class="box-header with-border">
    			<div class="box-title"><i class="fa fa-calendar"></i>  Laporan Data Calon Mahasiswa STIH DAMARICA PALOPO</div>
                <div class="box-tools pull-right">
                    <a href="{{ route('cetakLaporan') }}" type="button" class="btn btn-default btn-flat btn-sm"><i class="fa fa-plus"></i> Cetak Laporan</a>
                </div>
    		</div>
    		<div class="box-body">
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
		    	{{ $calon_siswa->links() }}
    		</div>
    		<div class="box-footer"></div>
    	</div>
    	
    </div>
</div>


{{-- Modal Dialog Hapus Jadwal --}}
<div id="modalDeleteJadwal" class="modal modal-danger fade">
    <div class="modal-dialog">
        <form action="{{ route('postDeleteJadwalAdmin') }}" method="POST">
        {{ csrf_field() }}
        <input id="id_jadwal_delete" type="hidden" name="id_jadwal">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Hapus Jadwal Pendaftaran</h4>
            </div>
            <div class="modal-body">
                <p>Anda yakin menghapus data penjadwalan ini?</p>
                <p>Jika data penjadwalan dihapus maka data pendaftaran yang terdaftar pada penjadwalan juga terhapus</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left btn-flat" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-default btn-flat"><i class="fa fa-trash"></i>   Hapus</button>
            </div>
        </div>
        </form>
    <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection


@push('script')
<script type="text/javascript">
    $('body').on('click','.btn_delete', function(){
        // console.log(this.value);
        $('#id_jadwal_delete').val(this.value);
    });
</script>
@endpush