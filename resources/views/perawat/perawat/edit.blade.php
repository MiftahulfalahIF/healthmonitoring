@extends('layout')
@section('body')
<style type="text/css">
.pw-input{
	display: none;
}	
</style>
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
    
    if(old('password')!=null){
    	$password = old('password');
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
        Edit Perawat
    </h1>
</section>
<form action="{{ action('Perawat\PerawatController@update', $perawat->id) }}" method="post" class="form-horizontal">
    @csrf
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Form Edit Perawat</h3>
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
                        <option value="superadmin"  @if($role == 'superadmin') selected=true @endif>Super Admin</option>
                        <option value="admin"  @if($role == 'admin') selected=true @endif
                        >Admin</option>
                        </select>
                    </div >
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
                    <label class="col-sm-3 control-label">Telepon</label>
                    <div class="col-sm-9">
                        <input name="telepon" value="{{$telepon}}" type="telepon" class="form-control" placeholder="Masukan No Telepon">
                        @if ($errors->has('telepon'))
                        <div style="color: #ff0000">{{  $errors->first('telepon') }}</div>
                        @endif
                    </div >
                </div>
                <div class="form-group pw-input">
                    <label class="col-sm-3 control-label">Password</label>
                    <div class="col-sm-9">
                        <input type="password" name="password" class="form-control" placeholder="Masukan Password Baru" autocomplete="new-password">
                        @if ($errors->has('password'))
                        <div style="color: #ff0000">{{  $errors->first('password') }}</div>
                        @endif
                    </div >
                </div>
                <div class="form-group pw-input">
                    <label class="col-sm-3 control-label">Konfirmasi Password</label>
                    <div class="col-sm-9">
                        <input name="password_confirmation"  type="password" class="form-control" placeholder="Konfirmasi Password Baru">
                    </div >
                </div>
                <div class="form-group pw-btn">
                    <label class="col-sm-3 control-label"></label>
                    <div class="col-sm-9">
                    	<button type="button" class="btn btn-primary" onclick="showPassword()">Ganti Password</button>
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
@endsection

@section('script')
<script type="text/javascript">
function showPassword(){
	$('.pw-input').show();
	$('.pw-btn').hide();
}	

@if(!empty($password))
$(function(){
	showPassword();
});
@endif
</script>
@endsection