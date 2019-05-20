@extends('layout')

@section('body')


<div class="container" style="margin-top: 20px; text-align: center;">
<div class="card" style="width: 18rem; margin: auto; text-align: left;">
  <div class="card-body">
    <h5 class="card-title" style="text-align: center;">FORM TAMBAH MONITORING</h5>

    <form action="{{ action('DokterKonsultan\MonitoringController@store') }}" method="post">
		@csrf
	  
	  <div class="form-group">
	  	<label >Nama Pasien</label>
	  	<select class="form-control" name="pasien">
	@foreach(App\Pasien::get() as $pasien)
		<option value="{{ $pasien->id }}">{{ $pasien->nama }}</option>
	@endforeach 
		</select>
	   </div>
	  <div class="form-group">
	   	 <label >Dokter Konsultan</label>
	   	 <select class="form-control" name="dokter">
	@foreach(App\Dokter::get() as $dokter)
		<option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
	@endforeach 
		</select>
	  </div>	 
	  <div class="form-group">
	    <label >Klinik Awal</label>
	    <input name="klinik_awal" value="{{ old('klinik_awal') }}" class="form-control" placeholder="Masukan Klinik Awal">
	    @if ($errors->has('klinik_awal'))
	    	<div style="color: #ff0000">{{  $errors->first('klinik_awal') }}</div>
	    @endif
	 </div >
	 <div class="form-group">
	    <label >Tanggal Dimulai</label>
	    <input name="tgl_mulai" value="{{old('tgl_mulai')}}" type="date"  class="form-control" >
	    @if ($errors->has('tgl_mulai'))
	    	<div style="color: #ff0000">{{  $errors->first('tgl_mulai') }}</div>
	    @endif
	  </div >
	  <div class="form-group">
	    <label >Tahap Pengobatan</label>
	    <input name="tahap_pengobatan" value="{{ old('tahap_pengobatan') }}" class="form-control" placeholder="Masukan Lama Tahap">
	    @if ($errors->has('tahap_pengobatan'))
	    	<div style="color: #ff0000">{{  $errors->first('tahap_pengobatan') }}</div>
	    @endif
	 </div >
<div class="form-group">
	    <label >Kontrol Yang Harus Dilakukan</label>
	    <input name="jml_kontrol" value="{{ old('jml_kontrol') }}" class="form-control" placeholder="Masukan Jumlah Kontrol">
	    @if ($errors->has('jml_kontrol'))
	    	<div style="color: #ff0000">{{  $errors->first('jml_kontrol') }}</div>
	    @endif
	 </div >
	 <div class="form-group">
	 	<label> Status Monitoring</label>
	 	<select name="status" class="form-control">
	 		<option value="belum">Belum Dilakukan</option>
	 		<option value="berjalan">Sedang Berjalan</option>
	 		<option value="selesai">Selesai</option>
	 		<option value="do">Drop Out</option>
	 	</select>
	  </div>

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

@endsection
