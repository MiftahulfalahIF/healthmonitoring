@extends('layout')

@section('body')
<section class="content-header">
    <h1>
        Perawat Klinik
    </h1>
</section>
@php
$user = Auth::user();
@endphp
<section class="content">
	<div class="box">
		<div class="box-header with-border">
            <h3 class="box-title">Tabel Perawat Klinik</h3>
            <div class="box-tools">
            	@if ($user->role =='superadmin')
            	<a href="{{ action('Perawat\PerawatController@create') }}" class="btn btn-sm btn-primary">Tambah Perawat</a>
            	@endif
            </div>
        </div>
    	<div class="box-body">
    		@if(Session::has('msg'))
	        <div class="alert alert-success mt-3">
				{{ session('msg') }}
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
	        </div>
	        @endif

    		<table class="table table-bordered" id="datatable">
				<thead>
					<tr>
						<th>No</th>
						<th>NIK</th>
						<th>Nama</th>
						<th>Role</th>
						<th>Status</th>
						<th>Email</th>
						<th>Telepon</th>
						@if ($user->role =='superadmin')
						<th width="30">Aksi</th>
						@endif
					</tr>
				</thead>
				<tbody>
					@foreach($perawats as $perawat)
					<tr>
						<td>{{$perawat->id}}</td>
						<td>{{ $perawat->nik }}</td>
						<td>{{ $perawat->nama }}</td>

						<td>
						@if($perawat->role=='superadmin')
						<div class="badge btn-success">Super Admin</div>
						@else
						<div class="badge btn-warning">Admin</div>
						@endif
						</td>

						<td>
						@if($perawat->status=='aktif')
						<div class="badge btn-success">Aktif</div>
						@else
						<div class="badge btn-danger">Nonaktif</div>
						@endif
						</td>
						
						
						<td>{{ $perawat->email }}</td>
						<td>{{ $perawat->telepon }}</td>
						@if ($user->role =='superadmin')
						<td>
						<a href="{{ action('Perawat\PerawatController@edit', $perawat->id) }}" class="btn btn-xs btn-warning btn-sm active" role="button" aria-pressed="true">Edit</a>

						
			  <?php /* <button onclick="hapus({{ $dokter->id }})" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Hapus</button>*/ ?>
			    		</td>
			    		@endif
					</tr>
					@endforeach
				</tbody>
			</table>
    	</div>
    </div>
</section>

<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form style="text-align: left;" action="{{ action('Perawat\PerawatController@index') }}" method="post">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <div class="modal-body">
          Apakah Anda Yakin? ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
          <button type="submit" class="btn btn-danger">Ya</button>
        </div>
      </form>
    </div>
  </div>
</div>


@endsection
@section('script')
<script type="text/javascript">
	function hapus(id) {
		$('#deleteModal').modal('show');
		var action = $('#deleteModal form').attr('action');
		$('#deleteModal form').attr('action', action+'/'+id);
	}
	
	$(function () {
		$('#datatable').DataTable({
			'paging'      : true,
			'lengthChange': false,
			'searching'   : true,
			'ordering'    : true,
			'info'        : true,
			'autoWidth'   : false
		});
	})
</script>		
@endsection

