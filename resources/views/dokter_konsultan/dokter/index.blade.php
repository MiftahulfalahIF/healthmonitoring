@extends('layout')

@section('body')

<div class="container">
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


				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection