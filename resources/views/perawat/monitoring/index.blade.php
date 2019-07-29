@extends('layout')

@section('body')
<section class="content-header">
    <h1>
        Monitoring
    </h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-header with-border">
            <h3 class="box-title">Tabel Monitoring</h3>
            <div class="box-tools">
            	<a href="{{ action('Perawat\MonitoringController@create') }}" class="btn btn-sm btn-primary">Tambah Monitoring</a>
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
					<th>Nomor Monitoring</th>
					<th>Nama Pasien</th>
					<th>Klinik Awal</th>
					<th>Tanggal Dimulai</th>
					<th>Status Monitoring</th>
					<th width="80">Aksi</th>
				</tr>
			</thead>
			<tbody>
				@foreach($monitorings as $monitoring)
				<tr>
					<td>{{ $monitoring->no_monitoring}}</td>
					<td>{{ $monitoring->pasien->nama }}</td>
					<td>{{ $monitoring->klinik_awal }}</td>
					<td>{{ date('d-m-Y', strtotime($monitoring->tgl_mulai)) }} </td>
					<td>
					@if($monitoring->status=='belum')
					<div class="badge btn-warning">Belum Dilakukan</div>
					@endif
					@if($monitoring->status=='berjalan')
					<div class="badge btn-info">Sedang Berjalan</div>
					@endif
					@if($monitoring->status=='selesai')
					<div class="badge btn-success">Selesai</div>
					@endif
					@if($monitoring->status=='do')
					<div class="badge btn-danger">Drop Out</div>
					@endif
					@if($monitoring->status=='failure')
					<div class="badge btn-danger">Failure</div>
					@endif
				</td>
					<td>
					<a href="{{ action('Perawat\MonitoringController@edit', $monitoring->id) }}" class="btn btn-warning btn-xs active" role="button" aria-pressed="true">Edit</a>
					<a href="{{ action('Perawat\MonitoringController@show', $monitoring->id) }}" class="btn btn-info btn-xs active" role="button" aria-pressed="true">Kontrol</a>
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


@section('script')
<script type="text/javascript">
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