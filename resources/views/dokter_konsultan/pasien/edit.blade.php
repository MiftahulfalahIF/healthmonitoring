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
$status = $pasien->status;
if(old('status')!=null){
	$status = old('status');
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

<section class="content-header">
    <h1>
         Edit Pasien
    </h1>
</section>

<form action="{{ action('DokterKonsultan\PasienController@update', $pasien->id) }}" method="post" class="form-horizontal">
		@csrf

<section class="content">	

	<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Form Edit Pasien</h3>
            <div class="box-tools">
                
            </div>
        </div>

	<div class="box-body">

		<input type="hidden" name="_method" value="PUT">

		<div class="form-group">
			<label class="col-sm-3 control-label" >Nama</label>
			<div class="col-sm-9">
			    <input name="nama" value="{{$nama}}" type="nama" class="form-control" placeholder="Masukan Nama">
			    @if ($errors->has('nama'))
			    	<div style="color: #ff0000">{{  $errors->first('nama') }}</div>
			    @endif
			</div>
		</div >

		<div class="form-group">
			<label class="col-sm-3 control-label" >NIK</label>
			<div class="col-sm-9">
				<input name="nik" value="{{$nik}}" type="nik" class="form-control" placeholder="Masukan nik">
				@if ($errors->has('nik'))
					<div style="color: #ff0000">{{  $errors->first('nik') }}</div>
				@endif
			</div >
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label">NO REKAM MEDIS</label>
			<div class="col-sm-9">
				<input name="no_rekam" value="{{$no_rekam}}" type="no_rekam" class="form-control" placeholder="Masukan no_rekam">
				@if ($errors->has('no_rekam'))
					<div style="color: #ff0000">{{  $errors->first('no_rekam') }}</div>
				@endif
			</div>
		</div >

	 	<div class="form-group">
	 		<label class="col-sm-3 control-label"> Status </label>
	 		<div class="col-sm-9">
	 			<select name="status" class="form-control">
	 				<option value="aktif"  @if($status == 'aktif') selected=true @endif>Aktif</option>
	 				<option value="tidak_aktif"  @if($status == 'tidak_aktif') selected=true @endif
					>Nonaktif</option>
	 			</select>
	  		 </div >
	    </div>

		<div class="form-group">
	    <label class="col-sm-3 control-label">Email</label>
	    <div class="col-sm-9">
	    <input name="email" value="{{$email}}" type="email" class="form-control" placeholder="Masukan Email">
	    @if ($errors->has('email'))
	    	<div style="color: #ff0000">{{  $errors->first('email') }}</div>
	    @endif
	  </div >
	</div>

	  <div class="form-group">
	    <label class="col-sm-3 control-label">Alamat</label>
	    <div class="col-sm-9">
	    <input name="alamat" value="{{$alamat}}" type="alamat" class="form-control" placeholder="Masukan Alamat">
	    @if ($errors->has('alamat'))
	    	<div style="color: #ff0000">{{  $errors->first('alamat') }}</div>
	    @endif
	  </div >
	</div>

	  <div class="form-group">
	 	<label class="col-sm-3 control-label"> Jenis Kelamin </label>
	 	<div class="col-sm-9">
	 	<select name="jk" class="form-control">
	 		<option value="l"  @if($jk == 'l') selected=true @endif>Laki-Laki</option>
	 		<option value="p"  @if($jk == 'p') selected=true @endif
			>Perempuan</option>
	 	</select>
	 </div>
	 </div>

	 <div class="form-group">
	 	<label class="col-sm-3 control-label" > Wanita Subur </label>
	 	<div class="col-sm-9">
	 	<select name="wanita_subur" class="form-control">
	 		<option value="hamil"  @if($wanita_subur == 'hamil') selected=true @endif>Hamil</option>
	 		<option value="tidak_hamil"  @if($wanita_subur == 'tidak_hamil') selected=true @endif
			>Tidak Hamil</option>
	 	</select>
	 </div>
	</div>

	  <div class="form-group">
	    <label class="col-sm-3 control-label">Tanggal Lahir</label>
	    <div class="col-sm-9">
	    <input name="tgl_lahir" value="{{$tgl_lahir}}" type="tgl_lahir" class="form-control" placeholder="Masukan tgl_lahir">
	    @if ($errors->has('tgl_lahir'))
	    	<div style="color: #ff0000">{{  $errors->first('tgl_lahir') }}</div>
	    @endif
	</div>
	  </div >

	  <div class="form-group">
	    <label class="col-sm-3 control-label">Berat Badan</label>
	    <div class="col-sm-9">
	    <input name="bb" value="{{$bb}}" type="bb" class="form-control" placeholder="Masukan Berat Badan">
	    @if ($errors->has('bb'))
	    	<div style="color: #ff0000">{{  $errors->first('bb') }}</div>
	    @endif
	  </div >
	</div>

	  <div class="form-group">
	    <label class="col-sm-3 control-label" >Tinggi Badan</label>
	    <div class="col-sm-9">
	    <input name="tb" value="{{$tb}}" type="tb" class="form-control" placeholder="Masukan tb">
	    @if ($errors->has('tb'))
	    	<div style="color: #ff0000">{{  $errors->first('tb') }}</div>
	    @endif
	  </div >
	</div>

	 <div class="form-group">
	 	<label class="col-sm-3 control-label"> Bentuk Obat </label>
	 	<div class="col-sm-9">
	 	<select name="bentuk_obat" class="form-control">
	 		<option value="kdt"  @if($bentuk_obat == 'kdt') selected=true @endif>KDT</option>
	 		<option value="kombipak"  @if($bentuk_obat == 'kombipak') selected=true @endif
			>Kombipak</option>
	 	</select>
	 </div>
	</div>

	  <div class="form-group">
	    <label class="col-sm-3 control-label">Telepon</label>
	    <div class="col-sm-9">
	    <input name="telepon" value="{{$telepon}}" class="form-control" placeholder="Masukan Telepon">
	    @if ($errors->has('telepon'))
	    	<div style="color: #ff0000">{{  $errors->first('telepon') }}</div>
	    @endif
	</div>
	  </div >

	  <div class="form-group">
	    <label class="col-sm-3 control-label">Nama PMO</label>
	    <div class="col-sm-9">
	    <input name="nama_pmo" value="{{$nama_pmo}}" type="nama_pmo" class="form-control" placeholder="Masukan Nama PMO">
	    @if ($errors->has('nama_pmo'))
	    	<div style="color: #ff0000">{{  $errors->first('nama_pmo') }}</div>
	    @endif
	</div>
	  </div >

	  <div class="form-group">
	    <label class="col-sm-3 control-label">NIK PMO</label>
	    <div class="col-sm-9">
	    <input name="nik_pmo" value="{{$nik_pmo}}" type="nik_pmo" class="form-control" placeholder="Masukan NIK PMO">
	    @if ($errors->has('nik_pmo'))
	    	<div style="color: #ff0000">{{  $errors->first('nik_pmo') }}</div>
	    @endif
	  </div >
	</div>

	  <div class="form-group">
	    <label class="col-sm-3 control-label">Telepon PMO</label>
	    <div class="col-sm-9">
	    <input name="tlp_pmo" value="{{$tlp_pmo}}" type="tlp_pmo" class="form-control" placeholder="Masukan Telepon PMO">
	    @if ($errors->has('tlp_pmo'))
	    	<div style="color: #ff0000">{{  $errors->first('tlp_pmo') }}</div>
	    @endif
	</div>
	  </div >


	  @if(Session::has('msg'))
	  <div style="color: red; font-size: 0.8em; margin-bottom: 10px; ">
	  	{{ session('msg')}}
	  </div>
	  @endif

	  <div style="text-align: center;">
	  <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
	</div>

	

  </div>
</div>
</div>
</section>
</form>
edit
@endsection