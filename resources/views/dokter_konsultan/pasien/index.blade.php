@extends('layout')

@section('body')


<table class="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>NIK</th>
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
		</tr>
	</thead>
	<tbody>
		@foreach($pasiens as $pasien)
			<tr>
				<td>0</td>
				<td>{{ $pasien->nama }}</td>
				<td>{{ $pasien->nik }}</td>
				<td>{{ $pasien->no_rekam }}</td>
				<td>{{ $pasien->email }}</td>
				<td>{{ $pasien->alamat }}</td>
				<td>{{ $pasien->jk }}</td>
				<td>{{ $pasien->wanita_subur }}</td>
				<td>{{ $pasien->tgl_lahir }}</td>
				<td>{{ $pasien->bb}}</td>
				<td>{{ $pasien->tb }}</td>
				<td>{{ $pasien->bentuk_obat }}</td>
				<td>{{ $pasien->telepon }}</td>
				<td>{{ $pasien->nama_pmo }}</td>
				<td>{{ $pasien->nik_pmo }}</td>
				<td>{{ $pasien->tlp_pmo }}</td>
			</tr>
		@endforeach
	</tbody>
</table>

@endsection