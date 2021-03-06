@extends('layout')

@section('body')

<section class="content-header">
    <h1>
        Kontrol [{{ $kontrol->no_kontrol }}]
    </h1>
</section>

<section class="content">

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
                    <td width="200">Perawat Klinik</td>
                    <td>: {{ $kontrol->perawat->nama }}</td>
                </tr>
                 <tr>
                    <td width="200">Dokter</td>
                    <td>: {{ $kontrol->dokter->nama }}</td>
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

</section>

@endsection

@section('script')
<script type="text/javascript">

</script>
@endsection

