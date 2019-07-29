@extends('layout')

@section('body')

<section class="content-header">
    <h1>
         Laporan Pasien
    </h1>
</section>

<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Data Pasien</h3>
            <div class="box-tools">
                
            </div>
        </div>

        <div class="box-body">
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
                    <td>: @if($pasien->jk=='l') Laki-laki @else Perempuan @endif</td>
                </tr>
                @if($pasien->jk!='l')
                <tr>
                    <td>Wanita Subur</td>
                    <td>: {{ $pasien->wanita_subur }}</td>
                </tr>
                @endif
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

@if($pasien->monitoring->count() > 0)

    @foreach($pasien->monitoring as $monitoring)

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Monitoring : {{ $monitoring->no_monitoring }}</h3>
            <div class="box-tools">
                
            </div>
        </div>

        <div class="box-body">

            <table>
                <tr>
                    <td width="200">Nama Dokter Konsultan</td>
                    <td>: {{ $monitoring->perawat->nama }}</td>
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
                    <td>Kontrol Yang Harus Dilakukan</td>
                    <td>: {{ $monitoring->jml_kontrol}}</td>
                </tr>
                <tr>
                    <td>Status Monitoring</td>
                    <td>: {{ $monitoring->status}}</td>
                </tr>
            </table>

            <br>

            <div style="text-align: center; font-weight: 600; margin-bottom: 10px;">TABEL KONTROL</div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10">#</th>
                        <th>Tanggal Kontrol</th>
                        <th>Tanggal Kembali</th>
                        <?php /*
                        <th>Status</th>
                        */ ?>
                        <th width="40">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1;?>
                    @foreach($monitoring->kontrols as $kontrol)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ date('d-m-Y', strtotime($kontrol->tgl_kontrol)) }}</td>
                        <td>{{ date('d-m-Y', strtotime($kontrol->tgl_kembali)) }}</td>
                        <?php /*
                        <td>
                            @if($kontrol->status=='berjalan')
                                <div class="badge btn-info">Sedang Berjalan</div>
                            @endif

                            @if($kontrol->status=='selesai')
                                <div class="badge btn-success">Selesai</div>
                            @endif

                            @if($kontrol->status=='mengulang')
                                <div class="badge btn-warning">Mengulang</div>
                            @endif
                        </td>
                        */ ?>
                        <td><a class="btn btn-xs btn-round btn-primary" href="{{ action('Perawat\PasienController@kontrol', $kontrol->id) }}">Laporan Kontrol</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

    @endforeach

@else
    <center>Tidak ada monitoring yang sedang berjalan</center>
@endif

</section>

@endsection




