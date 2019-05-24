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
        				<td>: {{ $pasien->nama }}</td>
        			</tr>
        			<tr>
        				<td width="200">NIK</td>
        				<td>: {{ $pasien->nik }}</td>
        			</tr>
        			<tr>
        				<td>No.Rekam Medis</td>
        				<td>: {{ $pasien->no_rekam }}</td>
        			</tr>
        			<tr>
        				<td>Status</td>
        				<td>: {{ $pasien->status }}</td>
        			</tr>
        			<tr>
        				<td>Email</td>
        				<td>: {{ $pasien->email }}</td>
        			</tr>
        			<tr>
        				<td>Alamat</td>
        				<td>: {{ $pasien->alamat }}</td>
        			</tr>
        			<tr>
        				<td>Jenis Kelamin</td>
        				<td>: {{ $pasien->jk }}</td>
        			</tr>
        			<tr>
        				<td>Wanita Subur</td>
        				<td>: {{ $pasien->wanita_subur }}</td>
        			</tr>
        			<tr>
        				<td>Nama PMO</td>
        				<td>: {{ $pasien->nama_pmo }}</td>
        			</tr>
        			<tr>
        				<td>NIK PMO</td>
        				<td>: {{ $pasien->nik_pmo }}</td>
        			</tr>
        			<tr>
        				<td>Telepon PMO</td>
        				<td>: {{ $pasien->tlp_pmo }}</td>
        			</tr>
        		</table>
        	</div>
        </div>

</div>






@endsection




