@extends('layout')

@section('body')

<section class="content-header">
    <h1>
         Laporan Pasien
    </h1>
</section>

<section class="content">

    <?php 
        $monitoring = $kontrol->monitoring;
    ?>

    @if(Session::has('msg'))
        <div class="alert alert-success mt-3">
          {{ session('msg') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif

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
                    <td width="200">Nomor Monitoring</td>
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

        @if(Session::has('msg'))
        <div class="alert alert-success mt-3">
            {{ session('msg') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        <div class="box-header with-border">
            <h3 class="box-title">Detail Kontrol</h3>
            <div class="box-tools">
                
            </div>
        </div>

        <div class="box-body">
            <table>
                <tr>
                    <td width="200">DPJP</td>
                    <td>: {{ $kontrol->dpjp->nama }}</td>
                </tr>
                <tr>
                    <td>Nomor Monitoring</td>
                    <td>: {{ $kontrol->monitoring->no_monitoring }}</td>
                </tr>
                <tr>
                    <td width="200">Tangal Kontrol</td>
                    <td>: {{ date('d-m-Y', strtotime($kontrol->tgl_kontrol)) }}</td>
                </tr>
                <tr>
                    <td width="200">Tangal Kembali</td>
                    <td>: {{ date('d-m-Y', strtotime($kontrol->tgl_kembali)) }}</td>
                </tr>
                <tr>
                    <td width="200">Status</td>
                    <td>: {{ $kontrol->status }}</td>
                </tr>
            </table>
        </div>
    </div>


    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Obat yang Diberikan</h3>
            <div class="box-tools">

            </div>
        </div>
    
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="40">No.</th>
                        <th>Nama Obat</th>
                        <th>Jadwal Konsumsi</th>
                        <th>Dosis/Konsumsi</th>
                        <th>Aturan Pakai</th>
                        <th>Total Obat Diberikan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $i=1;
                    ?>
                    @foreach ($kontrol->kontrolObat as $kobat)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $kobat->obat->nama }}</td>
                        <td>
                            <?php 
                                $jdw = json_decode($kobat->jadwal_konsumsi);
                            ?>
                            @foreach ($jdw as $item)
                                <span class="badge btn-inverse" style="margin-right:4px;"><?php if($item<=9) echo "0"; ?>{{ $item }}:00</span>
                            @endforeach
                        </td>
                        <td>{{ $kobat->dosis_konsumsi }}</td>
                        <td>
                            @if($kobat->aturan_pakai = "sebelum_makan")
                            Sebelum Makan
                            @else
                            Sesudah Makan
                            @endif
                        </td>
                        <td>{{ $kobat->total_obat }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>            
        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Laporan Konsumsi Obat</h3>
            <div class="box-tools">
                
            </div>
        </div>
    
        <div class="box-body">
            <div class="row">
                @foreach ($kontrol->kontrolObat as $kobat)
                <div class="col-md-6">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2">{{ $kobat->obat->nama }}</th>
                            </tr>
                            <tr>
                                <th>Jadwal Konsumsi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kobat->jadwalKonsumsi as $jk)
                            <tr>
                                <td>{{ date('d-m-Y H:i', strtotime($jk->jadwal_konsumsi)) }}</td>
                                <td>
                                    @if($jk->diminum=='belum')
                                        <span class="badge btn-warning">Belum</span>
                                    @endif
                                    @if($jk->diminum=='tidak')
                                        <span class="badge btn-danger">Tidak</span>
                                    @endif
                                    @if($jk->diminum=='ya')
                                        <span class="badge btn-success">Ya</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Laporan Perkembangan Pasien</h3>
            <div class="box-tools">
                
            </div>
        </div>
    
        <div class="box-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="200">Tanggal</th>
                        <th>Mual</th>
                        <th>Muntah</th>
                        <th>Pusing</th>
                        <th>Nyeri Kaki</th>
                        <th>Gatal</th>
                        <th>Kemerahan</th>
                        <th>Kuning</th>
                        <th>Lain-lain</th>
                        <th>Total Poin</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(App\SurveyPerkembangan::where('pasien_id', $pasien->id)->where('kontrol_id', $kontrol->id)->get() as $sp)
                    <tr>
                        <td>{{ date('d-m-Y', strtotime($sp->created_at)) }}</td>
                        <td>{{ $sp->mual }}</td>
                        <td>{{ $sp->muntah }}</td>
                        <td>{{ $sp->pusing }}</td>
                        <td>{{ $sp->nyeri_kaki }}</td>
                        <td>{{ $sp->gatal }}</td>
                        <td>{{ $sp->kemerahan }}</td>
                        <td>{{ $sp->kuning }}</td>
                        <td>{{ $sp->lain_lain }}</td>
                        <td>{{ ($sp->lain_lain + $sp->mual + $sp->pusing + $sp->nyeri_kaki + $sp->gatal + $sp->kemerahan + $sp->kuning) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</section>

@endsection




