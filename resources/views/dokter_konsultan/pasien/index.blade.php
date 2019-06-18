@extends('layout')

@section('body')
<section class="content-header">
    <h1>
        Pasien
    </h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-header with-border">
            <h3 class="box-title">Tabel Pasien</h3>
            <div class="box-tools">
            	<a href="{{ action('DokterKonsultan\PasienController@create') }}" class="btn btn-sm btn-primary">Tambah Pasien</a>
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

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama Pasien</th>
					<th>Status</th>
					<th>No.Rekam Medis</th>
					<th>Alamat</th>
					<th>Jenis Kelamin</th>
					<th>Telepon</th>
					<th>Nama PMO </th>
					<th width="180">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($pasiens as $pasien)
				<tr>
					<td>{{$pasien->id}}</td>
					<td>{{ $pasien->nama }}</td>
					<td>
						@if($pasien->status=='aktif')
						<div class="badge btn-success">Aktif</div>
						@else
						<div class="badge btn-danger">Nonaktif</div>
						@endif
					</td>
					<td>{{ $pasien->no_rekam }}</td>
					<td>{{ $pasien->alamat }}</td>
					<td>
						@if($pasien->jk=='l')
						<div >Laki-Laki</div>
						@else
						<div >Perempuan</div>
						@endif
					</td>
					<td>{{ $pasien->telepon }}</td>
					<td>{{ $pasien->nama_pmo }}</td>
					<td>
						<a href="{{ action('DokterKonsultan\PasienController@edit', $pasien->id) }}" class="btn btn-xs btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
						<a href="{{ action('DokterKonsultan\PasienController@show', $pasien->id) }}" class="btn btn-xs btn-primary btn-sm active" role="button" aria-pressed="true">Laporan </a>
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




@endsection