@extends('layout')

@section('body')
<section class="content-header">
    <h1>
         Tambah Dokter
    </h1>
</section>

<form action="{{ action('DokterKonsultan\DokterController@store') }}" method="post" class="form-horizontal">
@csrf

<section class="content">

	<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Dokter</h3>
            <div class="box-tools">
                
            </div>
        </div>
        
    <div class="box-body">

	  <div class="form-group">
	    <label class="col-sm-3 control-label">NIK</label>
	    <div class="col-sm-9">
			<input name="nik" value="{{ old('nik') }}" class="form-control" placeholder="Masukan NIK">
			@if ($errors->has('nik'))
			<div style="color: #ff0000">{{  $errors->first('nik') }}</div>
			@endif
	 	</div >
	</div>

	  <div class="form-group">
	    <label class="col-sm-3 control-label" >Nama</label>
	    <div class="col-sm-9">
	    <input name="nama" value="{{ old('nama') }}" class="form-control" placeholder="Masukan Nama">
	    @if ($errors->has('nama'))
	    	<div style="color: #ff0000">{{  $errors->first('nama') }}</div>
	    @endif
	  </div >
	</div>

	 <div class="form-group">
	 	<label class="col-sm-3 control-label"> Role </label>
	 	<div class="col-sm-9">
	 	<select name="role" class="form-control">
	 		<option value="dpjp">DPJP</option>
	 		<option value="dokter_konsultan">Dokter Konsultan</option>
	 	</select>
	 </div>
	</div>

	  <div class="form-group">
	 	<label class="col-sm-3 control-label"> Status </label>
	 	<div class="col-sm-9">
	 	<select name="status" class="form-control">
	 		<option value="aktif">Aktif</option>
	 		<option value="tidak_aktif">Nonaktif</option>
	 	</select>
	 </div>
	</div>

	  <div class="form-group">
	    <label class="col-sm-3 control-label">Email</label>
	    <div class="col-sm-9">
	    <input name="email" value="{{old('email')}}" class="form-control" placeholder="Masukan Email">
	    @if ($errors->has('email'))
	    	<div style="color: #ff0000">{{  $errors->first('email') }}</div>
	    @endif
	  </div >
	</div>

	 <div class="form-group">
	 	<label class="col-sm-3 control-label"> Unit </label>
	 	<div class="col-sm-9">
	 	<select name="unit" class="form-control" id="select-unit">
	 		<option value="bedah">Bedah</option>
	 		<option value="paru">Paru</option>
	 		<option value="internis">Internis</option>
	 		<option value="syaraf">Syaraf</option>
	 	</select>
	 </div>
	</div>

	<div class="form-group" id="select-subunit" @if(old('unit')!='bedah' && !empty(old('unit'))) style="display: none;" @endif>
	 	<label class="col-sm-3 control-label"> Sub Unit </label>
	 	<div class="col-sm-9">
	 	<select name="sub_unit" class="form-control">
	 		<option value="umum">Umum</option>
	 		<option value="orthopedi">Orthopedi</option>
	 	</select>
	 </div>
	</div>

	  <div class="form-group">
	    <label class="col-sm-3 control-label">Telepon</label>
	    <div class="col-sm-9">
	    <input name="telepon" value="{{old('telepon')}}" class="form-control" placeholder="Masukan No Telepon">
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
	  <button type="submit" class="btn btn-primary">Tambah</button>
	</div>

	

  </div>
</div>
</div>
</section>
</form>

@endsection

@section('script')
<script type="text/javascript">
$('#select-unit').change(function(){
	if(this.value=='bedah'){
		$('#select-subunit').show();
	}else{
		$('#select-subunit').hide();
	}
});
</script>
@endsection