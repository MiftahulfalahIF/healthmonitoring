@extends('layout')

@section('body')
<?php

$nama = $dokter->nama;
if(old('nama')!=null){
	$nama = old('nama');
}

$nik = $dokter->nik;
if(old('nik')!=null){
	$nik = old('nik');
}
$status = $dokter->status;
if(old('status')!=null){
	$status = old('status');
}
$email = $dokter->email;
if(old('email')!=null){
	$email = old('email');
}

$telepon = $dokter->telepon;
if(old('telepon')!=null){
	$telepon = old('telepon');
}
$role = $dokter->role;
if(old('role')!=null){
	$role = old('role');
}

$unit = $dokter->unit;
if(old('unit')!=null){
	$unit = old('unit');
}

$sub_unit = $dokter->sub_unit;
if(old('sub_unit')!=null){
	$sub_unit = old('sub_unit');
}




?>

<section class="content-header">
    <h1>
         Edit Dokter
    </h1>
</section>

<form action="{{ action('DokterKonsultan\DokterController@update', $dokter->id) }}" method="post" class="form-horizontal">
@csrf

<section class="content">

	<div class="box">
		<div class="box-header with-border">
			<h3 class="box-title">Form Edit Dokter</h3>
			<div class="box-tools">
			    
			</div>
		</div>

	<div class="box-body">

		<input type="hidden" name="_method" value="PUT">

	  <div class="form-group">
	    <label class="col-sm-3 control-label" >NIK</label>
	    <div class="col-sm-9">
	    <input name="nik" value="{{$nik}}" type="nik" class="form-control" placeholder="Masukan NIK">
	    @if ($errors->has('nik'))
	    	<div style="color: #ff0000">{{  $errors->first('nik') }}</div>
	    @endif
	  </div >
	</div>

	  <div class="form-group">
	    <label class="col-sm-3 control-label">Nama</label>
	    <div class="col-sm-9">
	    <input name="nama" value="{{$nama}}" type="nama" class="form-control" placeholder="Masukan Nama">
	    @if ($errors->has('nama'))
	    	<div style="color: #ff0000">{{  $errors->first('nama') }}</div>
	    @endif
	  </div >
	</div>

	 <div class="form-group">
	 	<label class="col-sm-3 control-label"> Role </label>
	 	<div class="col-sm-9">
	 	<select name="role" class="form-control">
	 		<option value="dpjp"  @if($role == 'dpjp') selected=true @endif>DPJP</option>
	 		<option value="dokter_konsultan"  @if($role == 'dokter_konsultan') selected=true @endif
			>Dokter Konsultan</option>
	 	</select>
	 </div>
	</div>

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
	    <input name="email" value="{{$email}}" class="form-control" placeholder="Masukan Email">
	    @if ($errors->has('email'))
	    	<div style="color: #ff0000">{{  $errors->first('email') }}</div>
	    @endif
	  </div >
	</div>

	 <div class="form-group">
	 	<label class="col-sm-3 control-label"> Unit </label>
	 	<div class="col-sm-9">
	 	<select name="unit" class="form-control">
	 		<option value="bedah" @if($unit == 'bedah') selected=true @endif>Bedah</option>
	 		<option value="paru" @if($unit  == 'paru') selected=true @endif>Paru</option>
	 		<option value="internis" @if($unit == 'internis') selected=true @endif>Internis</option>
	 		<option value="syaraf" @if($unit  == 'syaraf') selected=true @endif>Syaraf</option>
	 	</select>
	 </div>
	</div>

	<div class="form-group">
	 	<label class="col-sm-3 control-label"> Sub Unit </label>
	 	<div class="col-sm-9">
	 	<select name="sub_unit" class="form-control">
	 		<option value="umum"  @if($sub_unit == 'umum') selected=true @endif>Umum</option>
	 		<option value="orthopedi"  @if($sub_unit == 'othopedi') selected=true @endif>Orthopedi</option>
	 	</select>
	 </div>
	</div>

	  <div class="form-group">
	    <label class="col-sm-3 control-label">Telepon</label>
	    <div class="col-sm-9">
	    <input name="telepon" value="{{$telepon}}" type="telepon" class="form-control" placeholder="Masukan No Telepon">
	    @if ($errors->has('telepon'))
	    	<div style="color: #ff0000">{{  $errors->first('telepon') }}</div>
	    @endif
	  </div >
	</div>

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