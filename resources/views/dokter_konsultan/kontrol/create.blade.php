@extends('layout')

@section('body')

<section class="content-header">
    <h1>
        Tambah Kontrol
    </h1>
</section>

<form action="{{ action('DokterKonsultan\KontrolController@store', [$monitoring_id]) }}" method="post" class="form-horizontal">
@csrf

<section class="content">

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Kontrol</h3>
            <div class="box-tools">
                
            </div>
        </div>

        <div class="box-body">
            
            <div class="form-group">
				<label class="col-sm-3 control-label">Nama Pasien</label>	
				<div class="col-sm-9"> {{ $pasien_nama }}</div>		  	
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">DPJP</label>
				<div class="col-sm-9">
					<select class="form-control" name="dokter">
						@foreach(App\Dokter::where('role', 'dpjp')->get() as $dokter)
						<option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
						@endforeach 
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Kontrol</label>
				<div class="col-sm-9">
					<input name="tgl_kontrol" value="{{old('tgl_kontrol')}}" type="date"  class="form-control" >
					@if ($errors->has('tgl_kontrol'))
						<div style="color: #ff0000">{{  $errors->first('tgl_kontrol') }}</div>
					@endif
				</div>
			</div >

			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Kembali</label>
				<div class="col-sm-9">
					<input name="tgl_kembali" value="{{old('tgl_kembali')}}" type="date"  class="form-control" >
					@if ($errors->has('tgl_kembali'))
						<div style="color: #ff0000">{{  $errors->first('tgl_kembali') }}</div>
					@endif
				</div>
			</div >

        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Kontrol Obat</h3>
            <div class="box-tools">
            </div>
        </div>

        <div class="box-body" id="form-obat">
			<div class="form-group">
			    <label class="col-sm-3 control-label">Nama Obat</label>
			    <div class="col-sm-9">
				    <select class="form-control" name="obat">
				        @foreach(App\Obat::get() as $obat)
				        <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
				        @endforeach 
				    </select>
				</div>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Dosis </label>

			    <div class="col-sm-9">
			    	<div class="row">
			    		<div class="col-sm-3">
						    <input min="1" type="number" step="1" name="dosis_jadwal" value="1" class="form-control" placeholder="Masukan Hari">
						    <div style="color: #ff0000"></div>
						</div>
			    		<div class="col-sm-3">
						    <input min="1" type="number" step="1" name="dosis_jumlah" value="1" class="form-control" placeholder="Jumlah Konsumsi Harian">
						    <div style="color: #ff0000"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Aturan Pakai </label>
				<div class="col-sm-9">
					<div class="row">
			    		<div class="col-sm-3">
						    <div class="radio">
						        <label>
						        <input type="radio" name="aturan_pakai" id="aturan_pakai1" value="sebelum_makan" checked="">
						        Sebelum Makan
						        </label>
						    </div>
						</div>
			    		<div class="col-sm-3">
						    <div class="radio">
						        <label>
						        <input type="radio" name="aturan_pakai" id="aturan_pakai2" value="sesudah_makan">
						        Sesudah Makan
						        </label>
						    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Jumlah Obat yang diberikan </label>
			    <div class="col-sm-9">
				    <input min="1" name="jumlah_obat" value="1" class="form-control" placeholder="Masukan Jumlah Obat">
				    <div style="color: #ff0000"></div>
				</div>
			</div>
        </div>
        

        <div class="box-footer">

            <center><button class="btn btn-primary" onclick="tambahObat()" type="button">Tambah Obat</button></center>

        </div>
    </div>  

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tabel Kontrol Obat</h3>
            <div class="box-tools">

            </div>
        </div>

        <div class="box-body">
        	<table class="table table-bordered">
        		<thead>
        			<tr>
        				<th width="40">No.</th>
        				<th>Nama Obat</th>
        				<th>Dosis</th>
        				<th>Aturan Pakai</th>
        				<th>Jumlah Obat Diberikan</th>
        				<th width="60">Aksi</th>
        			</tr>
        		</thead>
        		<tbody id="item-obat">
        			
        		</tbody>
        	</table>
        </div>

    </div>

    <center><button type="submit" class="btn btn-success">Selesai & Simpan Kontrol</button></center>

</section>

</form>  

@endsection

@section('script')
<script type="text/javascript">

function tambahObat() {
	//$('#template-table-obat .obat-no').html($('#item-obat').length + 1);

	var htm = '<tr>'+
		'<td>'+($('#item-obat tr').length + 1)+'</td>'+
		'<td><input type="hidden" name="id_obat[]" value="'+$('#form-obat select[name=obat]').find(":selected").val()+'">'+$('#form-obat select[name=obat]').find(":selected").text()+'</td>'+
		'<td></td>'+
		'<td></td>'+
		'<td></td>'+
		'<td></td>'+
	'</tr>';
	$('#item-obat').append(htm);
}
	
</script>
@endsection
