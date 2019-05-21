@extends('layout')

@section('body')
<?php

$nama = $monitoring->pasien->id;
if(old('nama')!=null){
	$nama = old('nama');
}
$klinik_awal = $monitoring->klinik_awal;
if(old('klinik_awal')!=null){
	$klinik_awal = old('klinik_awal');
}
$tgl_mulai = $monitoring->tgl_mulai;
if(old('tgl_dimulai')!=null){
	$tgl_mulai = old('tgl_mulai');
}
$tahap_pengobatan = $monitoring->tahap_pengobatan;
if(old('tahap_pengobatan')!=null){
	$tahap_pengobatan = old('tahap_pengobatan');
}
$jml_kontrol = $monitoring->jml_kontrol;
if(old('jml_kontrol')!=null){
	$jml_kontrol = old('jml_kontrol');
}
$status = $monitoring->status;
if(old('status')!=null){
	$status = old('status');
}

?>

<div class="container" style="margin-top: 20px; text-align: center;">
<div class="card" style="width: 18rem; margin: auto; text-align: left;">
  <div class="card-body">
    <h5 class="card-title" style="text-align: center;">EDIT DATA</h5>

	<form action="{{ action('DokterKonsultan\MonitoringController@update', $monitoring->id) }}" method="post">
		@csrf
		<input type="hidden" name="_method" value="PUT">
	  <div class="form-group">
	  	<label >Nama Pasien</label>
	  	<select class="form-control" name="pasien">
	@foreach(App\Pasien::get() as $pasien)
		<option value="{{ $pasien->id }}"
			@if($nama == $pasien->id) selected=true @endif>{{ $pasien->nama }}</option>
	@endforeach 
		</select>
	   </div >
	  <div class="form-group">
	   	 <label >Dokter Konsultan</label>
	   	 <select class="form-control" name="dokter">
	@foreach(App\Dokter::get() as $dokter)
		<option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
	@endforeach 
		</select>
	  </div>	 
	  <div class="form-group">
	    <label >Klinik Awal</label>
	    <input name="klinik_awal" value="{{ $klinik_awal }}" class="form-control" placeholder="Masukan Klinik Awal">
	    @if ($errors->has('klinik_awal'))
	    	<div style="color: #ff0000">{{  $errors->first('klinik_awal') }}</div>
	    @endif
	  </div >
	 <div class="form-group">
	    <label >Tanggal Dimulai</label>
	    <input name="tgl_mulai" value="{{$tgl_mulai}}" type="date"  class="form-control" >
	    @if ($errors->has('tgl_mulai'))
	    	<div style="color: #ff0000">{{  $errors->first('tgl_mulai') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >Tahap Pengobatan</label>
	    <input name="tahap_pengobatan" value="{{ $tahap_pengobatan }}" class="form-control" placeholder="Masukan Lama Tahap">
	    @if ($errors->has('tahap_pengobatan'))
	    	<div style="color: #ff0000">{{  $errors->first('tahap_pengobatan') }}</div>
	    @endif
	 </div >
<div class="form-group">
	    <label >Kontrol Yang Harus Dilakukan</label>
	    <input name="jml_kontrol" value="{{ $jml_kontrol}}" class="form-control" placeholder="Masukan Jumlah Kontrol">
	    @if ($errors->has('jml_kontrol'))
	    	<div style="color: #ff0000">{{  $errors->first('jml_kontrol') }}</div>
	    @endif
	 </div >
	 <div class="form-group">
	 	<label> Status </label>
	 	<select name="status" class="form-control">
	 		<option value="belum"  @if($status == 'belum') selected=true @endif>Belum Dilakukan</option>
	 		<option value="berjalan"  @if($status == 'berjalan') selected=true @endif
			>Sedang Berjalan</option>
			<option value="selesai"  @if($status == 'selesai') selected=true @endif
			>Selesai</option>
			<option value="do"  @if($status == 'do') selected=true @endif
			>Drop Out</option>
	 	</select>
	   </div >

	  @if(Session::has('msg'))
	  <div style="color: red; font-size: 0.8em; margin-bottom: 10px; ">
	  	{{ session('msg')}}
	  </div>
	  @endif

	  <div style="text-align: center;">
	  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
	</div>

	</form>

  </div>
</div>
</div>






@endsection
