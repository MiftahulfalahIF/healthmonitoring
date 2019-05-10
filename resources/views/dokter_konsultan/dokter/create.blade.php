@extends('layout')

@section('body')



<div class="container" style="margin-top: 20px; text-align: center;">
<div class="card" style="width: 18rem; margin: auto; text-align: left;">
  <div class="card-body">
    <h5 class="card-title" style="text-align: center;">Tambah Dokter</h5>

	<form action="{{ action('DokterKonsultan\DokterController@store') }}" method="post">
		@csrf
	  <div class="form-group">
	    <label for="exampleInputPassword1">NIK</label>
	    <input name="nik" type="nik" class="form-control" placeholder="Masukan NIK">
	    @if ($errors->has('nik'))
	    	<div style="color: #ff0000">{{  $errors->first('nik') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label for="exampleInputPassword1">Nama</label>
	    <input name="nama" type="nama" class="form-control" placeholder="Masukan Nama">
	    @if ($errors->has('nama'))
	    	<div style="color: #ff0000">{{  $errors->first('nama') }}</div>
	    @endif
	  </div >
	 <div class="form-group">
	 	<label> Role </label>
	 	<select name="role" class="form-control">
	 		<option value="dpjp">DPJP</option>
	 		<option value="dokter_konsultan">Dokter Konsultan</option>
	 	</select>
	 </div>
	  <div class="form-group">
	 	<label> Status </label>
	 	<select name="status" class="form-control">
	 		<option value="aktif">Aktif</option>
	 		<option value="tidak_aktif">Nonaktif</option>
	 	</select>
	 </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Email</label>
	    <input name="email" class="form-control" placeholder="Masukan Email">
	    @if ($errors->has('email'))
	    	<div style="color: #ff0000">{{  $errors->first('email') }}</div>
	    @endif
	  </div >
	 <div class="form-group">
	 	<label> Unit </label>
	 	<select name="unit" class="form-control">
	 		<option value="bedah">Bedah</option>
	 		<option value="paru">Paru</option>
	 		<option value="internis">Internis</option>
	 		<option value="syaraf">Syaraf</option>
	 	</select>
	 </div>
	<div class="form-group">
	 	<label> Sub Unit </label>
	 	<select name="sub_unit" class="form-control">
	 		<option value="umum">Umum</option>
	 		<option value="orthopedi">Orthopedi</option>
	 	</select>
	 </div>
	  <div class="form-group">
	    <label for="exampleInputPassword1">Telepon</label>
	    <input name="telepon" type="telepon" class="form-control" placeholder="Masukan No Telepon">
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
	  <button type="submit" class="btn btn-primary">Tambah</button>
	</div>

	</form>

  </div>
</div>
</div>

create
@endsection