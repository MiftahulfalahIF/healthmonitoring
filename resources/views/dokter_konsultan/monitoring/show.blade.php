@extends('layout')

@section('body')

<section class="content-header">
    <h1>
        Kontrol
    </h1>
</section>

<section class="content">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Detail Monitoring</h3>
            <div class="box-tools">
                
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
                     <!--
                <tr>
                    <td>Tahap Pengobatan</td>
                    <td>: {{ $monitoring->tahap_pengobatan}}</td>
                </tr>
                     -->
                <tr>
                    <td>Kontrol Yang Harus Dilakukan</td>
                    <td>: {{ $monitoring->jml_kontrol}}</td>
                </tr>
                <tr>
                    <td>Status Monitoring</td>
                    <td>: {{ $monitoring->status}}</td>
                </tr>
            </table>

        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tabel Kontrol</h3>
            <div class="box-tools">
                <a href="{{ action('DokterKonsultan\KontrolController@create', [$monitoring->id]) }}" class="btn btn-primary btn-sm">Tambah Kontrol</a>
            </div>
        </div>

        <div class="box-body">
            <table class="table table-bordered" id="datatable">
                <thead>
                    <tr>
                        <th>No Kontrol</th>
                        <th>DPJP</th>
                        <th>Tanggal Kontrol</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th width="60">Aksi</th>
                    </tr>

                </thead>
                <tbody>
                    @foreach($monitoring->kontrols as $kontrol)
                    <tr>
                        <td>{{ $kontrol->no_kontrol }}</td>
                        <td>{{ $kontrol->dpjp->nama }}</td>
                        <td>{{ date('d-m-Y', strtotime($kontrol->tgl_kontrol)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($kontrol->tgl_kembali)) }}</td>
                        <td>{{ $kontrol->status }}</td>
                        <td><a href="{{ action('DokterKonsultan\KontrolController@show', $kontrol->id) }}" class="btn btn-info btn-xs active" role="button" aria-pressed="true">Detail Kontrol</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>

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