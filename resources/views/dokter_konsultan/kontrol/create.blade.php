@extends('layout')

@section('body')


<div class="container" style="margin-top: 20px; text-align: center;">
<div class="card" style="width: 18rem; margin: auto; text-align: left;">
  <div class="card-body">
    <h5 class="card-title" style="text-align: center;">FORM TAMBAH KONTROL</h5>

    <form action="{{ action('DokterKonsultan\KontrolController@store', [$monitoring_id]) }}" method="post">
		@csrf
	  <div class="form-group">
	  	<label>Nama Pasien</label>	
	  	<td>: {{ $pasien_nama }}</td>		  	
	  </div>
	  <div class="form-group">
	   	 <label >DPJP</label>
	   	 <select class="form-control" name="dokter">
	@foreach(App\Dokter::where('role', 'dpjp')->get() as $dokter)
		<option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
	@endforeach 
		</select>
	  </div>
	  <div class="form-group">
	    <label >Tanggal Kontrol</label>
	    <input name="tgl_kontrol" value="{{old('tgl_kontrol')}}" type="date"  class="form-control" >
	    @if ($errors->has('tgl_kontrol'))
	    	<div style="color: #ff0000">{{  $errors->first('tgl_kontrol') }}</div>
	    @endif
	  </div >
	 <label >JADWAL KONSUMSI OBAT</label>	
	 <div class="form-group">
	  	<label >Nama Obat</label>
	  	<select class="form-control" name="obat">
	@foreach(App\Obat::get() as $obat)
		<option value="{{ $obat->id }}">{{ $obat->nama }}</option>
	@endforeach 
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
