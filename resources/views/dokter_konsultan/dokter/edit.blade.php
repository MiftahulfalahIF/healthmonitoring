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

<div class="container" style="margin-top: 20px; text-align: center;">
<div class="card" style="width: 18rem; margin: auto; text-align: left;">
  <div class="card-body">
    <h5 class="card-title" style="text-align: center;">EDIT DATA</h5>

	<form action="{{ action('DokterKonsultan\DokterController@update', $dokter->id) }}" method="post">
		@csrf
		<input type="hidden" name="_method" value="PUT">
	  <div class="form-group">
	    <label for="exampleInputPassword1">NIK</label>
	    <input name="nik" value="{{$nik}}" type="nik" class="form-control" placeholder="Masukan NIK">
	    @if ($errors->has('nik'))
	    	<div style="color: #ff0000">{{  $errors->first('nik') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label for="exampleInputPassword1">Nama</label>
	    <input name="nama" value="{{$nama}}" type="nama" class="form-control" placeholder="Masukan Nama">
	    @if ($errors->has('nama'))
	    	<div style="color: #ff0000">{{  $errors->first('nama') }}</div>
	    @endif
	  </div >
	 <div class="form-group">
	 	<label> Role </label>
	 	<select name="role" class="form-control">
	 		<option value="dpjp"  @if($role == 'dpjp') selected=true @endif>DPJP</option>
	 		<option value="dokter_konsultan"  @if($role == 'dokter_konsultan') selected=true @endif
			>Dokter Konsultan</option>
	 	</select>
	 </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Email</label>
	    <input name="email" value="{{$email}}" class="form-control" placeholder="Masukan Email">
	    @if ($errors->has('email'))
	    	<div style="color: #ff0000">{{  $errors->first('email') }}</div>
	    @endif
	  </div >
	 <div class="form-group">
	 	<label> Unit </label>
	 	<select name="unit" class="form-control">
	 		<option value="bedah" @if($unit == 'bedah') selected=true @endif>Bedah</option>
	 		<option value="paru" @if($unit  == 'paru') selected=true @endif>Paru</option>
	 		<option value="internis" @if($unit == 'internis') selected=true @endif>Internis</option>
	 		<option value="syaraf" @if($unit  == 'syaraf') selected=true @endif>Syaraf</option>
	 	</select>
	 </div>
	<div class="form-group">
	 	<label> Sub Unit </label>
	 	<select name="sub_unit" class="form-control">
	 		<option value="umum"  @if($sub_unit == 'umum') selected=true @endif>Umum</option>
	 		<option value="orthopedi"  @if($sub_unit == 'othopedi') selected=true @endif>Orthopedi</option>
	 	</select>
	 </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Telepon</label>
	    <input name="telepon" value="{{$telepon}}" type="telepon" class="form-control" placeholder="Masukan No Telepon">
	    @if ($errors->has('telepon'))
	    	<div style="color: #ff0000">{{  $errors->first('telepon') }}</div>
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

create
@endsection