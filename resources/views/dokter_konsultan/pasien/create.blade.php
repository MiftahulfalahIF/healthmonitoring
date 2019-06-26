@extends('layout')

@section('body')
<section class="content-header">
    <h1>
         Tambah Pasien
    </h1>
</section>

<form action="{{ action('DokterKonsultan\PasienController@store') }}" method="post" class="form-horizontal">
@csrf

<section class="content">	

	<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Pasien</h3>
            <div class="box-tools">
                
            </div>
        </div>
        
    <div class="box-body">

	  <div class="form-group">
	    <label class="col-sm-3 control-label">Nama</label>
	    <div class="col-sm-9">
		    <input name="nama" value="{{old('nama')}}" class="form-control" placeholder="Masukan Nama">
		    @if ($errors->has('nama'))
		    	<div  style="color: #ff0000">{{  $errors->first('nama') }}</div>
		    @endif
		</div>
	  </div >
	  <div class="form-group">
	    <label class="col-sm-3 control-label">NIK</label>
	    <div class="col-sm-9">
	    <input name="nik" value="{{old('nik')}}" class="form-control" placeholder="Masukan NIK">
	    @if ($errors->has('nik'))
	    	<div style="color: #ff0000">{{  $errors->first('nik') }}</div>
	    @endif
		</div>
	  </div >
	  <div class="form-group">
	    <label class="col-sm-3 control-label">NO REKAM MEDIS</label>
	    <div class="col-sm-9">
	    <input name="no_rekam" value="{{old('no_rekam')}}" class="form-control" placeholder="Masukan No Rekam Medis">
	    @if ($errors->has('no_rekam'))
	    	<div style="color: #ff0000">{{  $errors->first('no_rekam') }}</div>
	    @endif	
	    </div>
	  </div >
	  <div class="form-group">
	 	<label class="col-sm-3 control-label"> Status</label>
	 	<div class="col-sm-9">
	 	<select name="status" class="form-control">
	 		<option value="aktif">Aktif</option>
	 		<option value="tidak_aktif">Nonaktif</option>
	 	</select>	
	 	</div>
	  </div>
	  <div class="form-group">
	    <label class="col-sm-3 control-label" >Email</label>
	    <div class="col-sm-9">
	    	<input name="email" value="{{old('email')}}" class="form-control" placeholder="Masukan Email">
	    @if ($errors->has('email'))
	    	<div style="color: #ff0000">{{  $errors->first('email') }}</div>
	    @endif
	    </div>
	 </div >
	 <div class="form-group">
	    <label class="col-sm-3 control-label">Alamat</label>
	    <div class="col-sm-9">
	    	<input name="alamat" value="{{old('alamat')}}" class="form-control" placeholder="Masukan Alamat">
	    @if ($errors->has('alamat'))
	    	<div style="color: #ff0000">{{  $errors->first('alamat') }}</div>
	    @endif
	    </div>
	 </div >
	 <div class="form-group">
	 	<label class="col-sm-3 control-label"> Jenis Kelamin </label>
	 	<div class="col-sm-9">
	 		<select name="jk" class="form-control" id="jk-select">
	 		<option value="l">Laki-Laki</option>
	 		<option value="p">Perempuan</option>
	 		</select>
	 	</div>
	 </div>
	 <div class="form-group" id="wanita-subur" style="display: none;">
	 	<label class="col-sm-3 control-label"> Wanita Subur</label>
	 	<div class="col-sm-9">
	 		<select name="wanita_subur" class="form-control">
	 		<option value="hamil">Hamil</option>
	 		<option value="tidak_hamil">Tidak Hamil</option>
	 		</select>
	 	</div>
	 </div>
	 <div class="form-group">
	    <label class="col-sm-3 control-label" >Tanggal Lahir</label>
	    <div class="col-sm-9">
	    	<input name="tgl_lahir" value="{{old('tgl_lahir')}}" type="date"  class="form-control" placeholder="Masukan Tanggal Lahir">
	    @if ($errors->has('tgl_lahir'))
	    	<div style="color: #ff0000">{{  $errors->first('tgl_lahir') }}</div>
	    @endif
	    </div>
	  </div >
	   <div class="form-group">
	    <label class="col-sm-3 control-label" >Berat Badan</label>
	    <div class="col-sm-9">
	    	<input name="bb" value="{{old('bb')}}" class="form-control" placeholder="Masukan Berat Badan">
	    @if ($errors->has('bb'))
	    	<div style="color: #ff0000">{{  $errors->first('bb') }}</div>
	    @endif
	    </div>
	 </div >
	 <div class="form-group">
	    <label class="col-sm-3 control-label">Tinggi Badan</label>
	    <div class="col-sm-9">
	    <input name="tb" value="{{old('tb')}}" class="form-control" placeholder="Masukan Tinggi Badan">
	    @if ($errors->has('tb'))
	    	<div style="color: #ff0000">{{  $errors->first('tb') }}</div>
	    @endif
	</div>
	 </div >
	 
	 <div class="form-group">
	    <label class="col-sm-3 control-label">Telepon</label>
	    <div class="col-sm-9">
	    <input name="telepon" value="{{old('telepon')}}" class="form-control" placeholder="Masukan No Telepon">
	    @if ($errors->has('telepon'))
	    	<div style="color: #ff0000">{{  $errors->first('telepon') }}</div>
	    @endif
	</div>
	  </div >
	  <div class="form-group">
	    <label class="col-sm-3 control-label">Nama PMO</label>
	    <div class="col-sm-9">
	    <input name="nama_pmo" value="{{old('nama_pmo')}}" class="form-control" placeholder="Masukan Nama PMO">
	    @if ($errors->has('nama_pmo'))
	    	<div style="color: #ff0000">{{  $errors->first('nama_pmo') }}</div>
	    @endif
	  </div >
	</div>
	  <div class="form-group">
	    <label class="col-sm-3 control-label">NIK PMO</label>
	     <div class="col-sm-9">
	    <input name="nik_pmo" value="{{old('nik_pmo')}}" class="form-control" placeholder="Masukan NIK PMO">
	    @if ($errors->has('nik_pmo'))
	    	<div style="color: #ff0000">{{  $errors->first('nik_pmo') }}</div>
	    @endif
	  </div >
	</div>
	  <div class="form-group">
	    <label class="col-sm-3 control-label" >Telepon PMO</label>
	    <div class="col-sm-9">
	    <input name="tlp_pmo" value="{{old('tlp_pmo')}}" class="form-control" placeholder="Masukan Telepon PMO">
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
	  <button type="submit" class="btn btn-primary">Tambah</button>
	</div>

	</form>

  </div>
</div>
</div>
</section>

</form> 
@endsection

@section('script')
<script type="text/javascript">
$('#jk-select').change(function(){
	if(this.value=='l'){
		$('#wanita-subur').hide();
	}else{
		$('#wanita-subur').show();
	}

});
</script>
@endsection