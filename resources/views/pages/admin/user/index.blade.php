@extends('layouts.admin')
@section('htmlheader_title')
    {{ trans('List User') }}
@endsection
@section('main-content')
<div class="row">
    <div class="col-md-12">
    	<div class="box">
    		<div class="box-header with-border">
    			<div class="box-title"><i class="fa fa-calendar"></i>  Daftar User</div>
                <div class="box-tools pull-right">
                    <a href="{{ route('addUserAdmin') }}" type="button" class="btn btn-default btn-flat btn-sm"><i class="fa fa-plus"></i>Tambah User</a>
                </div>
    		</div>
    		<div class="box-body">
    			<table class="table table-bordered table-hover">
    				<thead>
                        <tr>
                        	<th>No</th>
                            <th class="text-capitalize">NIP</th>
                            <th class="text-center">Nama<br>Lengkap</th>
                            <th class="text-center">Alamat<br>Lengkap</th>
                            <th class="text-center">No<br>Handphone</th>
                            <th class="text-center">Agama</th>
                            <th class="text-center">Nomor Telpon</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
		    		<tbody>
                        @if($panitias->isEmpty())
                            <tr>
                                <td colspan="8"><h4 class="text-center">Maaf, Data User</h4></td>
                            </tr>
                        @else
                        @foreach($panitias as $panitia)
                        <tr>
                        	<td class="text-center">{{ (($panitias->currentPage() - 1 ) * $panitias->perPage() ) + $loop->iteration }}</td>
                            <td class="text-capitalize">{{ $panitia->nip }}</td>
                            <td class="text-capitalize">{{ $panitia->nm_panitia }}</td>
                            <td class="text-capitalize">{{ $panitia->alamat }}</td>
                            <td class="text-capitalize">{{ $panitia->no_hp }}</td>
                            <td class="text-capitalize">{{ $panitia->agama }}</td>
                            <td class="text-capitalize">{{ $panitia->no_hp }}</td>
                            <td class="text-center">
                                <a href="{{ route('detailUserAdmin', $panitia->nip) }}" class="btn btn-default btn-flat btn-sm"><i class="fa fa-folder-open"></i></a>
                                <a href="{{ route('editUserAdmin', $panitia->nip) }}" class="btn btn-primary btn-flat btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="{{ route('deleteUserAdmin', $panitia->nip) }}" class="btn btn-danger btn-flat btn-sm btn_delete"><i class="fa fa-trash"></i></a> 
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
		    	</table>
    		</div>
    		<div class="box-footer"></div>
    	</div>
    	
    </div>
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