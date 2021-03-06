@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('Tambah Jadwal Pendaftaran') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-9">
    	<form class="form-horizontal" method="POST" action="{{ route('postAddJadwalAdmin') }}">
    	{{ csrf_field() }}

    	<div class="box">
    		<div class="box-header with-border">
    			<div class="box-title"><i class="fa fa-plus"></i>	Tambah Jadwal Pendaftaran</div>
    		</div>
    		<div class="box-body">
				<div class="col-md-6">
					<div class="form-group">
						<label>Nama Jadwal : </label>
    					<input type="text" maxlength="14" name="nama_jadwal_pendf" class="form-control text-capitalize" required="required" placeholder="ex: Gelombang 1">
					</div>
					<div class="form-group">
						<label>Tahun Ajaran</label>
	                    <select name="id_th_ajaran" class="form-control" required="required">
	                        @foreach($tahunajarans as $tahunajaran)
	                            <option value="{{ $tahunajaran->id_th_ajaran }}">{{ $tahunajaran->th_ajaran }}</option>
	                        @endforeach
	                    </select>
					</div>
				</div>
				<div class="col-md-6">
					<label>Tanggal Pendaftaran : </label>
					<div class="row">
    					<div class="form-horizontal">
	    					<div class="form-group">
	    						<label class="control-label col-sm-4">Tanggal Mulai</label>
	    						<div class="col-md-6">
		    						<input type="text" name="tanggal_mulai_pendf" class="form-control datepicker3" required="required">
		    					</div>
	    					</div>
	    					<div class="form-group">
	    						<label class="control-label col-sm-4">Tanggal Selesai</label>
	    						<div class="col-md-6">
		    						<input type="text" name="tanggal_selesai_pendf" class="form-control datepicker3" required="required">
		    					</div>
	    					</div>
    					</div>
    				</div>
    				<label>Tanggal Tes Ujian Masuk :</label>
					<div class="row">
    					<div class="form-horizontal">
	    					<div class="form-group">
	    						<label class="control-label col-sm-4">Tanggal Mulai</label>
	    						<div class="col-md-6">
		    						<input type="text" name="tanggal_mulai_tes" class="form-control datepicker3" required="required">
		    					</div>
	    					</div>
	    					<div class="form-group">
	    						<label class="control-label col-sm-4">Tanggal Selesai</label>
	    						<div class="col-md-6">
		    						<input type="text" name="tanggal_selesai_tes" class="form-control datepicker3" required="required">
		    					</div>
	    					</div>
    					</div>
    				</div>
					<label>Pengumuman Hasil Seleksi : </label>
					<div class="row">
    					<div class="form-group">
	    					<label class="control-label col-sm-4"></label>
	    					<div class="col-md-6">
	    						<input type="text" name="tanggal_pengumuman_penerimaan" class="form-control datepicker3" required="required">
	    					</div>
    					</div>
					</div>
					{{-- <label>Daya Tampung Pendaftaran : </label>
					<div class="row">
    					<div class="form-horizontal">
	    					<div class="form-group">
	    						<label class="control-label col-sm-4"></label>
	    						<div class="col-md-6">
		    						<input type="number" name="daya_tampung_pendf" class="form-control" required="required">
		    					</div>
	    					</div>
    					</div>
    				</div> --}}
				</div>
    		</div>
    		<div class="box-footer">
    			<div class="pull-right">
    				<button type="submit" class="btn btn-success btn-flat"><i class="fa fa-plus"></i>   Tambah</button>
    			</div>
    		</div>
    	</div>
    	</form>
    </div>
    {{-- <div class="col-md-3">
    	<div class="box">
    		<div class="box-header with-border">
    			<div class="box-title"><i class="fa fa-bars"></i>  Control Panel</div>
    		</div>
    		<div class="box-body">
    			<a class="btn btn-app btn-flat disabled">
					<i class="fa fa-plus"></i> Tambah
				</a>
    			<a class="btn btn-app btn-flat disabled">
					<i class="fa fa-edit"></i> Edit
				</a>
    		</div>
    	</div>
    </div> --}}
</div>
@endsection


@push('script')
    <script type="text/javascript" src="{{ asset('/plugins/datepicker/bootstrap-datepicker.js') }}"></script>
    {{-- Setting DatePicker3 --}}
    <script type="text/javascript">
        
    </script>
@endpush
