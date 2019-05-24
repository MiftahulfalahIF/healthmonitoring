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

        <div class="panel">
        	<div class="panel-body">
        		<table>
        			<tr>
        				<td width="200">Nama Pasien</td>
        				<td>: {{ $monitoring->pasien->nama }}</td>
        			</tr>
        			<tr>
        				<td>Nomor Monitoring</td>
        				<td>: {{ $monitoring->no_monitoring }}</td>
        			</tr>
        			<tr>
        				<td>Nama Dokter Konsultan</td>
        				<td>: {{ $monitoring->dokter_konsultan->nama }}</td>
        			</tr>
        			<tr>
        				<td>Klinik Awal</td>
        				<td>: {{ $monitoring->klinik_awal}}</td>
        			</tr>
        			<tr>
        				<td>Tanggal Dimulai</td>
        				<td>: {{ $monitoring->tgl_mulai}}</td>
        			</tr>
        			<tr>
        				<td>Tahap Pengobatan</td>
        				<td>: {{ $monitoring->tahap_pengobatan}}</td>
        			</tr>
        			<tr>
        				<td>Kontrol Yang Harus Dilakukan</td>
        				<td>: {{ $monitoring->jml_kontrol}}</td>
        			</tr>
        			<tr>
        				<td>Status Monitoring</td>
        				<td>: {{ $monitoring->status}}</td>
        			</tr>
        		</table>
                <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>No Kontrol</th>
                        <th>Nama Pasien</th>
                        <th>DPJP</th>
                        <th>Tanggal Kontrol</th>
                        <th width="60">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                
                </tbody>
                </table>
        	</div>
        </div>

	</div>







@endsection

