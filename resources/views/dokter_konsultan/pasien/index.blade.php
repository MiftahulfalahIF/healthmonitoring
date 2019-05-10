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
			<a href="{{ action('DokterKonsultan\PasienController@create') }}" class="btn btn-primary">Tambah Pasien</a>
		</div>

		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>NIK</th>
					<th>Nama</th>
					<th>Status</th>
					<th>No.Rekam Medis</th>
					<th>Email</th>
					<th>Alamat</th>
					<th>Kelamin</th>
					<th>Wanita Subur</th>
					<th>Tanggal Lahir</th>
					<th>Berat Badan</th>
					<th>Tinggi Badan</th>
					<th>Bentuk Obat</th>
					<th>Telepon</th>
					<th>Nama PMO</th>
					<th>NIK PMO</th>
					<th>Telepon PMO</th>
					<th width="180">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pasiens as $pasien)
				<tr>
				<td>0</td>
				<td>{{ $pasien->nik }}</td>
				<td>{{ $pasien->nama }}</td>
				<td>
					@if($pasien->status=='aktif')
					<div class="badge btn-success">Aktif</div>
					@else
					<div class="badge btn-danger">Nonaktif</div>
					@endif
				</td>
				<td>{{ $pasien->no_rekam }}</td>
				<td>{{ $pasien->email }}</td>
				<td>{{ $pasien->alamat }}</td>
				<td>
					@if($pasien->jk=='l')
					<div >Laki-Laki</div>
					@else
					<div >Perempuan</div>
					@endif
				</td>
				<td>
					@if($pasien->wanita_subur=='hamil')
					<div >Hamil</div>
					@else
					<div >Tidak Hamil</div>
					@endif
				</td>
				<td>{{ $pasien->tgl_lahir }}</td>
				<td>{{ $pasien->bb}}</td>
				<td>{{ $pasien->tb }}</td>
				<td>{{ $pasien->bentuk_obat }}</td>
				<td>{{ $pasien->telepon }}</td>
				<td>{{ $pasien->nama_pmo }}</td>
				<td>{{ $pasien->nik_pmo }}</td>
				<td>{{ $pasien->tlp_pmo }}</td>
				<td>
				<a href="{{ action('DokterKonsultan\PasienController@edit', $pasien->id) }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
		<!--     <button onclick="hapus({{ $pasien->id }})" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Hapus</button> -->
		    		</td>
			</tr>
		@endforeach
	</tbody>
</table>
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form style="text-align: left;" action="{{ action('DokterKonsultan\PasienController@index') }}" method="post">
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