@extends('layout')

@section('body')
<?php

$nama = $pasien->nama;
if(old('nama')!=null){
	$nama = old('nama');
}

$nik = $pasien->nik;
if(old('nik')!=null){
	$nik = old('nik');
}
$no_rekam = $pasien->no_rekam;
if(old('no_rekam')!=null){
	$no_rekam = old('no_rekam');
}
$email = $pasien->email;
if(old('email')!=null){
	$email = old('email');
}
$alamat = $pasien->alamat;
if(old('alamat')!=null){
	$alamat = old('alamat');
}
$jk = $pasien->jk;
if(old('jk')!=null){
	$jk = old('jk');
}
$wanita_subur = $pasien->wanita_subur;
if(old('wanita_subur')!=null){
	$wanita_subur = old('wanita_subur');
}
$tgl_lahir = $pasien->tgl_lahir;
if(old('tgl_lahir')!=null){
	$tgl_lahir = old('tgl_lahir');
}
$bb = $pasien->bb;
if(old('bb')!=null){
	$bb = old('bb');
}
$tb = $pasien->tb;
if(old('tb')!=null){
	$tb = old('tb');
}
$bentuk_obat = $pasien->bentuk_obat;
if(old('bentuk_obat')!=null){
	$bentuk_obat = old('bentuk_obat');
}
$telepon = $pasien->telepon;
if(old('telepon')!=null){
	$telepon = old('telepon');
}
$nama_pmo = $pasien->nama_pmo;
if(old('nama_pmo')!=null){
	$nama_pmo = old('nama_pmo');
}

$nik_pmo = $pasien->nik_pmo;
if(old('nik_pmo')!=null){
	$nik_pmo = old('nik_pmo');
}

$tlp_pmo = $pasien->tlp_pmo;
if(old('tlp_pmo')!=null){
	$tlp_pmo = old('tlp_pmo');
}




?>

<div class="container" style="margin-top: 20px; text-align: center;">
<div class="card" style="width: 18rem; margin: auto; text-align: left;">
  <div class="card-body">
    <h5 class="card-title" style="text-align: center;">EDIT DATA</h5>

	<form action="{{ action('DokterKonsultan\PasienController@update', $pasien->id) }}" method="post">
		@csrf
		<input type="hidden" name="_method" value="PUT">
	  <div class="form-group">
	    <label >NAMA</label>
	    <input name="nama" value="{{$nama}}" type="nama" class="form-control" placeholder="Masukan Nama">
	    @if ($errors->has('nama'))
	    	<div style="color: #ff0000">{{  $errors->first('nama') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >NIK</label>
	    <input name="nik" value="{{$nik}}" type="nik" class="form-control" placeholder="Masukan nik">
	    @if ($errors->has('nik'))
	    	<div style="color: #ff0000">{{  $errors->first('nik') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >NO REKAM MEDIS</label>
	    <input name="no_rekam" value="{{$no_rekam}}" type="no_rekam" class="form-control" placeholder="Masukan no_rekam">
	    @if ($errors->has('no_rekam'))
	    	<div style="color: #ff0000">{{  $errors->first('no_rekam') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >Email</label>
	    <input name="email" value="{{$email}}" type="email" class="form-control" placeholder="Masukan Email">
	    @if ($errors->has('email'))
	    	<div style="color: #ff0000">{{  $errors->first('email') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >Alamat</label>
	    <input name="alamat" value="{{$alamat}}" type="alamat" class="form-control" placeholder="Masukan Alamat">
	    @if ($errors->has('alamat'))
	    	<div style="color: #ff0000">{{  $errors->first('alamat') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	 	<label> Jenis Kelamin </label>
	 	<select name="jk" class="form-control">
	 		<option value="l"  @if($jk == 'l') selected=true @endif>Laki-Laki</option>
	 		<option value="p"  @if($jk == 'p') selected=true @endif
			>Perempuan</option>
	 	</select>
	 </div>
	 <div class="form-group">
	 	<label> Wanita Subur </label>
	 	<select name="wanita_subur" class="form-control">
	 		<option value="hamil"  @if($wanita_subur == 'hamil') selected=true @endif>Hamil</option>
	 		<option value="tidak_hamil"  @if($wanita_subur == 'tidak_hamil') selected=true @endif
			>Tidak Hamil</option>
	 	</select>
	  <div class="form-group">
	    <label >Tanggal Lahir</label>
	    <input name="tgl_lahir" value="{{$tgl_lahir}}" type="tgl_lahir" class="form-control" placeholder="Masukan tgl_lahir">
	    @if ($errors->has('tgl_lahir'))
	    	<div style="color: #ff0000">{{  $errors->first('tgl_lahir') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >Berat Badan</label>
	    <input name="bb" value="{{$bb}}" type="bb" class="form-control" placeholder="Masukan Berat Badan">
	    @if ($errors->has('bb'))
	    	<div style="color: #ff0000">{{  $errors->first('bb') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >Tinggi Badan</label>
	    <input name="tb" value="{{$tb}}" type="tb" class="form-control" placeholder="Masukan tb">
	    @if ($errors->has('tb'))
	    	<div style="color: #ff0000">{{  $errors->first('tb') }}</div>
	    @endif
	  </div >
	 <div class="form-group">
	 	<label> Bentuk Obat </label>
	 	<select name="bentuk_obat" class="form-control">
	 		<option value="kdt"  @if($bentuk_obat == 'kdt') selected=true @endif>KDT</option>
	 		<option value="kombipak"  @if($bentuk_obat == 'kombipak') selected=true @endif
			>Kombipak</option>
	 	</select>
	 </div>
	  <div class="form-group">
	    <label >Telepon</label>
	    <input name="telepon" value="{{$telepon}}" class="form-control" placeholder="Masukan Telepon">
	    @if ($errors->has('telepon'))
	    	<div style="color: #ff0000">{{  $errors->first('telepon') }}</div>
	    @endif
	  </div >
	 </div>
	  <div class="form-group">
	    <label >Nama PMO</label>
	    <input name="nama_pmo" value="{{$nama_pmo}}" type="nama_pmo" class="form-control" placeholder="Masukan Nama PMO">
	    @if ($errors->has('nama_pmo'))
	    	<div style="color: #ff0000">{{  $errors->first('nama_pmo') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >NIK PMO</label>
	    <input name="nik_pmo" value="{{$nik_pmo}}" type="nik_pmo" class="form-control" placeholder="Masukan NIK PMO">
	    @if ($errors->has('nik_pmo'))
	    	<div style="color: #ff0000">{{  $errors->first('nik_pmo') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >Telepon PMO</label>
	    <input name="tlp_pmo" value="{{$tlp_pmo}}" type="tlp_pmo" class="form-control" placeholder="Masukan Telepon PMO">
	    @if ($errors->has('tlp_pmo'))
	    	<div style="color: #ff0000">{{  $errors->first('tlp_pmo') }}</div>
	    @endif
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

edit
@endsection