@extends('layout')

@section('body')

<div class="container-fluid">
@if(Session::has('msg'))
        <div class="alert alert-success mt-3">
          {{ session('msg') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif



	<div class="card mt-3">
		<div class="card-body">
			<a href="{{ action('DokterKonsultan\DokterController@create') }}" class="btn btn-primary">Tambah Dokter</a>
		</div>

		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Role</th>
					<th>Email</th>
					<th>Unit</th>
					<th>Sub Unit</th>
					<th>Telepon</th>
					<th width="180">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($dokters as $dokter)
				<tr>
					<td>0</td>
					<td>{{ $dokter->nik }}</td>
					<td>{{ $dokter->nama }}</td>
					<td>{{ $dokter->role }}</td>
					<td>{{ $dokter->email }}</td>
					<td>{{ $dokter->unit }}</td>
					<td>{{ $dokter->sub_unit }}</td>
					<td>{{ $dokter->telepon }}</td>
					<td>
					<a href="{{ action('DokterKonsultan\DokterController@edit', $dokter->id) }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
		    <button onclick="hapus({{ $dokter->id }})" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Hapus</button>
		    		</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form style="text-align: left;" action="{{ action('DokterKonsultan\DokterController@index') }}" method="post">
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




<script type="text/javascript">
    function hapus(id) {
      $('#deleteModal').modal('show');
      var action = $('#deleteModal form').attr('action');
      $('#deleteModal form').attr('action', action+'/'+id);
    }
  </script>

@endsection