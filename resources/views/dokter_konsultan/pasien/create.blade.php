@extends('layout')

@section('body')
<div class="container" style="margin-top: 20px; text-align: center;">
<div class="card" style="width: 18rem; margin: auto; text-align: left;">
  <div class="card-body">
    <h5 class="card-title" style="text-align: center;">Tambah Pasien</h5>

	<form action="{{ action('DokterKonsultan\PasienController@store') }}" method="post">
		@csrf
	  <div class="form-group">
	    <label >Nama</label>
	    <input name="nama" type="nama" class="form-control" placeholder="Masukan Nama">
	    @if ($errors->has('nama'))
	    	<div>{{  $errors->first('nama') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >NIK</label>
	    <input name="nik" type="nik" class="form-control" placeholder="Masukan NIK">
	    @if ($errors->has('nik'))
	    	<div>{{  $errors->first('nik') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >NO REKAM MEDIS</label>
	    <input name="no_rekam" type="no_rekam" class="form-control" placeholder="Masukan No Rekam Medis">
	    @if ($errors->has('no_rekam'))
	    	<div>{{  $errors->first('no_rekam') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	 	<label> Status</label>
	 	<select name="status" class="form-control">
	 		<option value="aktif">Aktif</option>
	 		<option value="tidak_aktif">Nonaktif</option>
	 	</select>
	  </div>
	  <div class="form-group">
	    <label >Email</label>
	    <input name="email" type="email" class="form-control" placeholder="Masukan Email">
	    @if ($errors->has('email'))
	    	<div>{{  $errors->first('email') }}</div>
	    @endif
	 </div >
	 <div class="form-group">
	    <label >Alamat</label>
	    <input name="alamat" type="alamat" class="form-control" placeholder="Masukan Alamat">
	    @if ($errors->has('alamat'))
	    	<div>{{  $errors->first('alamat') }}</div>
	    @endif
	 </div >
	 <div class="form-group">
	 	<label> Jenis Kelamin </label>
	 	<select name="jk" class="form-control">
	 		<option value="l">Laki-Laki</option>
	 		<option value="p">Perempuan</option>
	 	</select>
	 </div>
	 <div class="form-group">
	 	<label> Wanita Subur</label>
	 	<select name="wanita_subur" class="form-control">
	 		<option value="hamil">Hamil</option>
	 		<option value="tidak_hamil">Tidak Hamil</option>
	 	</select>
	 </div>
	 <div class="form-group">
	    <label >Tanggal Lahir</label>
	    <input type="date" name="tgl_lahir" class="form-control" placeholder="Masukan Tanggal Lahir">
	    @if ($errors->has('tgl_lahir'))
	    	<div>{{  $errors->first('tgl_lahir') }}</div>
	    @endif
	  </div >
	   <div class="form-group">
	    <label >Berat Badan</label>
	    <input name="bb" type="bb" class="form-control" placeholder="Masukan Berat Badan">
	    @if ($errors->has('bb'))
	    	<div>{{  $errors->first('bb') }}</div>
	    @endif
	 </div >
	 <div class="form-group">
	    <label >Tinggi Badan</label>
	    <input name="tb" type="tb" class="form-control" placeholder="Masukan Tinggi Badan">
	    @if ($errors->has('tb'))
	    	<div>{{  $errors->first('tb') }}</div>
	    @endif
	 </div >
	 <div class="form-group">
	 	<label> Bentuk Obat</label>
	 	<select name="bentuk_obat" class="form-control">
	 		<option value="kdt">KDT</option>
	 		<option value="kombipak">Kombipak</option>
	 	</select>
	 </div>
	 <div class="form-group">
	    <label >Telepon</label>
	    <input name="telepon" class="form-control" placeholder="Masukan No Telepon">
	    @if ($errors->has('telepon'))
	    	<div>{{  $errors->first('telepon') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >Nama PMO</label>
	    <input name="nama_pmo" type="nama_pmo" class="form-control" placeholder="Masukan Nama PMO">
	    @if ($errors->has('nama_pmo'))
	    	<div>{{  $errors->first('nama_pmo') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >NIK PMO</label>
	    <input name="nik_pmo" type="nik_pmo" class="form-control" placeholder="Masukan NIK PMO">
	    @if ($errors->has('nik_pmo'))
	    	<div>{{  $errors->first('nik_pmo') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >Telepon PMO</label>
	    <input name="tlp_pmo" type="tlp_pmo" class="form-control" placeholder="Masukan Telepon PMO">
	    @if ($errors->has('tlp_pmo'))
	    	<div>{{  $errors->first('tlp_pmo') }}</div>
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