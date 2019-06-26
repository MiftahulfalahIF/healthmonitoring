@extends('layout')

@section('body')

<section class="content-header">
    <h1>
         Tambah Monitoring
    </h1>
</section>

    <form action="{{ action('DokterKonsultan\MonitoringController@store') }}" method="post" class="form-horizontal">
		@csrf
	  
<section class="content">

	<div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Monitoring</h3>
            <div class="box-tools">
                
            </div>
        </div>

        <div class="box-body">

	  <div class="form-group">
	  	<label class="col-sm-3 control-label">Nama Pasien</label>
	  	<div class="col-sm-9">
	  	<select class="form-control" name="pasien">
	@foreach(App\Pasien::get() as $pasien)
		<option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
	@endforeach 
		</select>
	   </div>
	</div>

	  <div class="form-group">
	   	 <label class="col-sm-3 control-label">Dokter Konsultan</label>
	   	 <div class="col-sm-9">
	   	 <select class="form-control" name="dokter">
	@foreach(App\Dokter::get() as $dokter)
		<option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
	@endforeach 
		</select>
	  </div>	
	  </div> 

	  <div class="form-group">
	    <label class="col-sm-3 control-label" >Klinik Awal</label>
	    <div class="col-sm-9">
	    <input name="klinik_awal" value="{{ old('klinik_awal') }}" class="form-control" placeholder="Masukan Klinik Awal">
	    @if ($errors->has('klinik_awal'))
	    	<div style="color: #ff0000">{{  $errors->first('klinik_awal') }}</div>
	    @endif
	 </div >
	</div>

	 <div class="form-group">
	    <label class="col-sm-3 control-label" >Tanggal Dimulai</label>
	    <div class="col-sm-9">
	    <input name="tgl_mulai" value="{{ date('d-m-Y'), strtotime(old('tgl_mulai')) }}" type="text"  class="form-control datepicker" >
	    @if ($errors->has('tgl_mulai'))
	    	<div style="color: #ff0000">{{  $errors->first('tgl_mulai') }}</div>
	    @endif
	  </div >
	</div>

	  <div class="form-group">
	    <label class="col-sm-3 control-label">Tahap Pengobatan</label>
	    <div class="col-sm-9">
	    <input name="tahap_pengobatan" value="{{ old('tahap_pengobatan') }}" class="form-control" placeholder="Masukan Lama Tahap">
	    @if ($errors->has('tahap_pengobatan'))
	    	<div style="color: #ff0000">{{  $errors->first('tahap_pengobatan') }}</div>
	    @endif
	 </div >
	</div>

<div class="form-group">
	    <label class="col-sm-3 control-label" >Kontrol Yang Harus Dilakukan</label>
	    <div class="col-sm-9">
	    <input name="jml_kontrol" value="{{ old('jml_kontrol') }}" class="form-control" placeholder="Masukan Jumlah Kontrol">
	    @if ($errors->has('jml_kontrol'))
	    	<div style="color: #ff0000">{{  $errors->first('jml_kontrol') }}</div>
	    @endif
	 </div >
	</div>

	 <div class="form-group">
	 	<label class="col-sm-3 control-label"> Status Monitoring</label>
	 	<div class="col-sm-9">
	 	<select name="status" class="form-control">
	 		<option value="belum">Belum Dilakukan</option>
	 		<option value="berjalan">Sedang Berjalan</option>
	 		<option value="selesai">Selesai</option>
	 		<option value="do">Drop Out</option>
	 	</select>
	  </div>
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
$('.datepicker').datepicker({
	format: 'dd-mm-yyyy', 
	startDate: 'today'
});	
</script>
@endsection
