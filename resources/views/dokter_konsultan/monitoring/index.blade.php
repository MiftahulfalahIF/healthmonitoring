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
			<a href="{{ action('DokterKonsultan\MonitoringController@create') }}" class="btn btn-primary">Tambah Monitoring</a>
		</div>

		<table class="table">
			<thead>
				<tr>
					<th>Nomor Monitoring</th>
					<th>Nama Pasien</th>
					<th>Dokter Konsultan</th>
					<th>Klinik Awal</th>
					<th>Tanggal Dimulai</th>
					<th>Tahap Pengobatan</th>
					<th>Kontrol Yang Harus Dilakukan</th>
					<th>Status Monitoring</th>
					<th width="180">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($monitorings as $monitoring)
				<tr>
					<td>{{ $monitoring->no_monitoring}}</td>
					<td>{{ $monitoring->pasien->nama }}</td>
					<td>{{ $monitoring->dokter_konsultan->nama }}</td>
					<td>{{ $monitoring->klinik_awal }}</td>
					<td>TANGGAL DIMULAI </td>
					<td>{{ $monitoring->tahap_pengobatan }}</td>
					<td>
					@if($monitoring->status=='belum')
					<div class="badge btn-success">Belum Dilakukan</div>
					@endif
					@if($monitoring->status=='berjalan')
					<div class="badge btn-primary">Sedang Berjalan</div>
					@endif
					@if($monitoring->status=='selesai')
					<div class="badge btn-success">Selesai</div>
					@endif
					@if($monitoring->status=='do')
					<div class="badge btn-danger">Drop Out</div>
					@endif
				</td>
					
				
					<td>
						<?php /*
					<a href="{{ action('DokterKonsultan\DokterController@edit', $dokter->id) }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
		    <button onclick="hapus({{ $dokter->id }})" class="btn btn-danger btn-sm active" role="button" aria-pressed="true">Hapus</button> 

		    		*/ ?>
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

