@extends('layout')

@section('body')
<div class="container" style="margin-top: 20px; text-align: center;">
<div class="card" style="width: 18rem; margin: auto; text-align: left;">
  <div class="card-body">
    <h5 class="card-title" style="text-align: center;">Tambah Obat</h5>

	<form action="{{ action('DokterKonsultan\ObatController@store') }}" method="post">
		@csrf
	  <div class="form-group">
	    <label >Kode</label>
	    <input name="kode" type="kode" class="form-control" placeholder="Masukan Kode">
	    @if ($errors->has('kode'))
	    	<div style="color:#ff0000 ">{{  $errors->first('kode') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >Nama Obat</label>
	    <input name="nama" type="nama" class="form-control" placeholder="Masukan Nama Obat">
	    @if ($errors->has('nama'))
	    	<div style="color: #ff0000">{{  $errors->first('nama') }}</div>
	    @endif
	   <div class="form-group">
	 	<label> Golongan </label>
	 	<select name="golongan" class="form-control">
	 		<option value="paracetamol">Paracetamol</option>
	 		<option value="tramadol">Tramadol</option>
	 	</select>
	   </div>
	 
	   <div class="form-group">
	 	<label> Ketegori </label>
	 	<select name="kategori" class="form-control">
	 		<option value="obat_keras">Obat Keras</option>
	 		<option value="obat_ringan">Obat Ringan</option>
	 	</select>
	 </div>
	  <div class="form-group">
	    <label >Bentuk</label>
	    <input name="bentuk" type="bentuk" class="form-control" placeholder="Masukan Bentuk">
	    @if ($errors->has('bentuk'))
	    	<div style="color: #ff0000">{{  $errors->first('bentuk') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >Indikasi</label>
	    <input name="indikasi" type="indikasi" class="form-control" placeholder="Masukan Indikasi">
	    @if ($errors->has('indikasi'))
	    	<div style="color: #ff0000">{{  $errors->first('indikasi') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >Dosis</label>
	    <input name="dosis" type="dosis" class="form-control" placeholder="Masukan Dosis">
	    @if ($errors->has('dosis'))
	    	<div style="color: #ff0000">{{  $errors->first('dosis') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >Produsen</label>
	    <input name="produsen" type="produsen" class="form-control" placeholder="Masukan Produsen">
	    @if ($errors->has('produsen'))
	    	<div style="color: #ff0000">{{  $errors->first('produsen') }}</div>
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