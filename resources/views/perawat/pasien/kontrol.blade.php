@extends('layout')

@section('body')
<script src="https://code.highcharts.com/highcharts.js"></script>
<section class="content-header">
    <h1>
         Laporan Kontrol Pasien
    </h1>
</section>

<section class="content">

    @if(Session::has('msg'))
        <div class="alert alert-success mt-3">
          {{ session('msg') }}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
    @endif

    @if(!empty($kontrol))

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
                    <td width="200">Nama Pasien</td>
                    <td>: {{ $kontrol->pasien->nama }}</td>
                </tr>
                <tr>
                    <td width="200">Nomor Monitoring</td>
                    <td>: {{ $kontrol->monitoring->no_monitoring }}</td>
                </tr>
                <tr>
                    <td width="200">DPJP</td>
                    <td>: {{ $kontrol->perawat->nama }}</td>
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
            <div id="container1"></div>
            <?php 
                $spdata = App\SurveyPerkembangan::where('pasien_id', $kontrol->pasien->id)->where('kontrol_id', $kontrol->id)->get();
            ?>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10">#</th>
                        <th width="200">Tanggal</th>
                        <th>Mual</th>
                        <th>Muntah</th>
                        <th>Pusing</th>
                        <th>Nyeri Kaki</th>
                        <th>Gatal</th>
                        <th>Kemerahan</th>
                        <th>Kuning</th>
                        <th>Lain-lain</th>
                        <th>Total Gejala</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($spdata as $sp)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ date('d-m-Y', strtotime($sp->created_at)) }}</td>
                        <td>{{ $sp->mual }}</td>
                        <td>{{ $sp->muntah }}</td>
                        <td>{{ $sp->pusing }}</td>
                        <td>{{ $sp->nyeri_kaki }}</td>
                        <td>{{ $sp->gatal }}</td>
                        <td>{{ $sp->kemerahan }}</td>
                        <td>{{ $sp->kuning }}</td>
                        <td>{{ $sp->lain_lain }}</td>
                        <td>{{ ($sp->lain_lain + $sp->mual + $sp->muntah + $sp->pusing + $sp->nyeri_kaki + $sp->gatal + $sp->kemerahan + $sp->kuning) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Laporan Sesak Nafas</h3>
            <div class="box-tools">
                
            </div>
        </div>
    
        <div class="box-body">
            <?php 
                $sndata = App\SurveySesakNafas::where('pasien_id', $kontrol->pasien->id)->where('kontrol_id', $kontrol->id)->get();
            ?>
            <div id="container2"></div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th width="10">#</th>
                        <th width="200">Tanggal</th>
                        <th>Tingkat Sesak Nafas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach($sndata as $sn)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ date('d-m-Y', strtotime($sn->created_at)) }}</td>
                        <td align="right">{{ $sn->tingkat_sesak_nafas }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    @endif

</section>

<script type="text/javascript">
Highcharts.chart('container1', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Perkembangan Pasien'
    },
    subtitle: {
        text: 'Semakin rendah total gejala maka semakin baik'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Total Gejala'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Total gejala: <b>{point.y} gejala</b>'
    },
    colors:['#F00'],
    series: [{
        name: 'Total Gejala',
        data: [
        @foreach($spdata as $sp)
            ['{{ date('d-m-Y', strtotime($sp->created_at)) }}', {{ ($sp->lain_lain + $sp->mual + $sp->muntah + $sp->pusing + $sp->nyeri_kaki + $sp->gatal + $sp->kemerahan + $sp->kuning) }}],
        @endforeach
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});    

Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Grafik Tingkat Sesak Nafas Pasien'
    },
    subtitle: {
        text: 'Semakin rendah tingkat sesak nafas maka semakin baik'
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Tingkat Sesak Nafas'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: 'Tingkat Sesak Nafas: <b>{point.y}</b>'
    },
    colors:['#F00'],
    series: [{
        name: 'Tingkat Sesak Nafas',
        data: [
        @foreach($sndata as $sp)
            ['{{ date('d-m-Y', strtotime($sn->created_at)) }}', {{ ($sn->tingkat_sesak_nafas) }}],
        @endforeach
        ],
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});   
</script>

@endsection




