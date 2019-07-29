@extends('layout')

@section('body')
<?php

$nama = $perawat->nama;
if(old('nama')!=null){
    $nama = old('nama');
}

$nik = $perawat->nik;
if(old('nik')!=null){
    $nik = old('nik');
}

$role = $perawat->role;
if(old('role')!=null){
    $role = old('role');
}

$status = $perawat->status;
if(old('status')!=null){
    $status = old('status');
}
$email = $perawat->email;
if(old('email')!=null){
    $email = old('email');
}

$telepon = $perawat->telepon;
if(old('telepon')!=null){
    $telepon = old('telepon');
}

?>

<section class="content-header">
    <h1>
        
    </h1>
</section>


<form action="{{ action('Perawat\PerawatController@updatePassword', $perawat->id) }}" method="post" class="form-horizontal">
@csrf

<section class="content">

    <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Form Ganti Password</h3>
      <div class="box-tools">
      </div>
    </div>

    <div class="box-body">

      <div class="form-group">
        <label class="col-sm-3 control-label" >NIK</label>
        <div class="col-sm-9">
       {{ $perawat->nik }}
      </div >
    </div>

      <div class="form-group">
        <label class="col-sm-3 control-label">Nama</label>
        <div class="col-sm-9">
        {{ $perawat->nama }}
      </div >
    </div>

    <div class="form-group">
        <label class="col-sm-3 control-label"> Role </label>
        <div class="col-sm-9">
         {{ $perawat->role }}
       </div >
    </div>

     <div class="form-group">
        <label class="col-sm-3 control-label"> Status </label>
        <div class="col-sm-9">
        {{ $perawat->status }}
       </div >
    </div>

      <div class="form-group">
        <label class="col-sm-3 control-label">Email</label>
        <div class="col-sm-9">
       {{ $perawat->email }}
      </div >
    </div>

      <div class="form-group">
        <label class="col-sm-3 control-label">Telepon</label>
        <div class="col-sm-9">
        {{ $perawat->telepon }}
      </div >
    </div>


    <div class="form-group">
        <label class="col-sm-3 control-label"></label>
        <div class="col-sm-9">
        <button id="btn-change" type="button" class="btn btn-primary" onclick="showButton()">Ganti Password</button>
       </div >
    </div>

    <div style="display: none;" id="cpass">


     <div class="form-group">
        <label class="col-sm-3 control-label">Password</label>
        <div class="col-sm-9">
        <input name="password"  type="password" class="form-control" placeholder="Masukan Password Baru">
        @if ($errors->has('password'))
            <div style="color: #ff0000">{{  $errors->first('password') }}</div>
        @endif
      </div >
    </div>
     <div class="form-group">
        <label class="col-sm-3 control-label">Konfirmasi Password</label>
        <div class="col-sm-9">
        <input name="password_confirmation"  type="password" class="form-control" placeholder="Konfirmasi Password Baru">
        @if ($errors->has('password'))
            <div style="color: #ff0000">{{  $errors->first('password') }}</div>
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
</div>
</section>
</form>

@endsection

@section('script')

<script type="text/javascript">
  function showButton(){
    $('#cpass').show();
    $('#btn-change').remove();
  }

@if($errors->has('password'))  
$(function(){
  showButton();
});
@endif
</script>

@endsection
