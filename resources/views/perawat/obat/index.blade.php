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
		
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode</th>
					<th>Nama Obat</th>
					<th>Golongan</th>
					<th>Kategori</th>
					<th>Bentuk Obat</th>
					<th>Indikasi</th>
					<th>Dosis</th>
					<th>Produsen</th>
				</tr>
			</thead>
			<tbody>
				@foreach($obats as $obat)
				<tr>
					<td>{{$obat->id}}</td>
					<td>{{ $obat->kode }}</td>
					<td>{{ $obat->nama }}</td>
					<td>{{ $obat->golongan }}</td>
					<td>{{ $obat->kategori }}</td>
					<td>{{ $obat->bentuk }}</td>
					<td>{{ $obat->indikasi }}</td>
					<td>{{ $obat->dosis }}</td> 
					<td>{{ $obat->produsen }}</td>
					
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
      <form style="text-align: left;" action="{{ action('DokterKonsultan\ObatController@index') }}" method="post">
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