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
					<th>Klinik Awal</th>
					<th>Tanggal Dimulai</th>
					<th>Status Monitoring</th>
					<th width="180">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($monitorings as $monitoring)
				<tr>
					<td>{{ $monitoring->no_monitoring}}</td>
					<td>{{ $monitoring->pasien->nama }}</td>
					<td>{{ $monitoring->klinik_awal }}</td>
					<td>{{ $monitoring->tgl_mulai }} </td>
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
					<a href="{{ action('DokterKonsultan\MonitoringController@edit', $monitoring->id) }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Edit</a>
					<a href="{{ action('DokterKonsultan\MonitoringController@show', $monitoring->id) }}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Lihat Detail</a>
					</td>
					
				
					
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

     
    </div>
  </div>
</div>






@endsection

