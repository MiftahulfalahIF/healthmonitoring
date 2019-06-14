@extends('layout')

@section('body')

<section class="content-header">
    <h1>
        Tambah Kontrol
    </h1>
</section>

<form action="{{ action('DokterKonsultan\KontrolController@store', [$monitoring_id]) }}" method="post" class="form-horizontal">
@csrf

<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Kontrol</h3>
            <div class="box-tools">
                
            </div>
        </div>

        <div class="box-body">
            
            <div class="form-group">
				<label class="col-sm-3 control-label">Nama Pasien</label>	
				<div class="col-sm-9"> {{ $pasien_nama }}</div>		  	
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">DPJP</label>
				<div class="col-sm-9">
					<select class="form-control" name="dokter">
						@foreach(App\Dokter::where('role', 'dpjp')->get() as $dokter)
						<option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
						@endforeach 
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Kontrol</label>
				<div class="col-sm-9">
					<input name="tgl_kontrol" value="{{old('tgl_kontrol')}}" type="date"  class="form-control" >
					@if ($errors->has('tgl_kontrol'))
						<div style="color: #ff0000">{{  $errors->first('tgl_kontrol') }}</div>
					@endif
				</div>
			</div >

			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Kembali</label>
				<div class="col-sm-9">
					<input name="tgl_kembali" value="{{old('tgl_kembali')}}" type="date"  class="form-control" >
					@if ($errors->has('tgl_kembali'))
						<div style="color: #ff0000">{{  $errors->first('tgl_kembali') }}</div>
					@endif
				</div>
			</div >

        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Obat</h3>
            <div class="box-tools">
            </div>
        </div>

        <div class="box-body">
			<div class="form-group">
			    <label class="col-sm-3 control-label">Nama Obat</label>
			    <div class="col-sm-9">
				    <select class="form-control" name="obat">
				        @foreach(App\Obat::get() as $obat)
				        <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
				        @endforeach 
				    </select>
				</div>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Dosis </label>

			    <div class="col-sm-9">
			    	<div class="row">
			    		<div class="col-sm-3">
						    <input type="number" step="1" name="dosis_jadwal" value="{{old('dosis_jadwal')}}" class="form-control" placeholder="Masukan Hari">
						    @if ($errors->has('dosis_jadwal'))
						    <div style="color: #ff0000">{{  $errors->first('dosis_jadwal') }}</div>
						    @endif
						</div>
			    		<div class="col-sm-3">
						    <input type="number" step="1" name="dosis_jumlah" value="{{old('dosis_jumlah')}}" class="form-control" placeholder="Jumlah Konsumsi Harian">
						    @if ($errors->has('dosis_jumlah'))
						    <div style="color: #ff0000">{{  $errors->first('dosis_jumlah') }}</div>
						    @endif
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Aturan Pakai </label>
				<div class="col-sm-9">
					<div class="row">
			    		<div class="col-sm-3">
						    <div class="radio">
						        <label>
						        <input type="radio" name="aturan_pakai" id="aturan_pakai1" value="sebelum_makan" checked="">
						        Sebelum Makan
						        </label>
						    </div>
						</div>
			    		<div class="col-sm-3">
						    <div class="radio">
						        <label>
						        <input type="radio" name="aturan_pakai" id="aturan_pakai2" value="sesudah_makan">
						        Sesudah Makan
						        </label>
						    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Jumalah Obat yang diberikan </label>
			    <div class="col-sm-9">
				    <input type="number" name="jumlah_obat" value="{{old('jumlah_obat')}}" class="form-control" placeholder="Masukan Jumlah Obat">
				    @if ($errors->has('jumlah_obat'))
				    <div style="color: #ff0000">{{  $errors->first('jumlah_obat') }}</div>
				    @endif
				</div>
			</div>
        </div>

        <div class="box-footer">
            <center><button class="btn btn-primary">Tambah Obat</button></center>
        </div>
    </div>  

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tabel Obat</h3>
            <div class="box-tools">

            </div>
        </div>

        <div class="box-body">
        	<table class="table">
        		
        	</table>
        </div>

    </div>

    <center><button type="submit" class="btn btn-success">Selesai & Simpan Form Kontrol</button></center>

</section>

</form>  

@endsection
