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
				<div class="col-sm-4">
					<select class="form-control" name="dokter">
						@foreach(App\Dokter::where('role', 'dpjp')->get() as $dokter)
						<option value="{{ $dokter->id }}">{{ $dokter->nama }}</option>
						@endforeach 
					</select>
				</div>
			</div>

			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Kontrol</label>
				<div class="col-sm-4">
					<input name="tgl_kontrol" value="{{ date('d-m-Y'), strtotime(old('tgl_kontrol')) }}" type="text"  class="form-control datepicker1" >
					@if ($errors->has('tgl_kontrol'))
						<div style="color: #ff0000">{{  $errors->first('tgl_kontrol') }}</div>
					@endif
				</div>
			</div >

			<div class="form-group">
				<label class="col-sm-3 control-label">Tanggal Kembali</label>
				<div class="col-sm-4">
					<input name="tgl_kembali" value="{{ date('d-m-Y'), strtotime(old('tgl_kembali')) }}" type="text"  class="form-control datepicker2" >
					@if ($errors->has('tgl_kembali'))
						<div style="color: #ff0000">{{  $errors->first('tgl_kembali') }}</div>
					@endif
				</div>
			</div >

        </div>
    </div>

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Form Tambah Obat</h3>
            <div class="box-tools">
            </div>
        </div>

        <div class="box-body" id="form-obat">
			<div class="form-group">
			    <label class="col-sm-3 control-label">Nama Obat</label>
			    <div class="col-sm-4">
				    <select class="form-control" name="obat">
				        @foreach(App\Obat::get() as $obat)
				        <option value="{{ $obat->id }}">{{ $obat->nama }}</option>
				        @endforeach 
				    </select>
				</div>
			</div>
			<?php /*
			<div class="form-group">
			    <label class="col-sm-3 control-label">Dosis </label>
			    <div class="col-sm-9">
			    	<div class="row">
						<div class="col-sm-3">
							<input min="1" type="number" step="1" name="dosis_jumlah" class="form-control" placeholder="Jumlah Obat / Konsumsi">
							<div style="color: #ff0000"></div>
						</div>
			    		<div class="col-sm-3">
						    <input min="1" type="number" step="1" name="dosis_jadwal" class="form-control" placeholder="Masukan Jadwal / Hari">
						    <div style="color: #ff0000"></div>
						</div>
					</div>
				</div>
			</div>
			*/ ?>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Aturan Pakai </label>
				<div class="col-sm-4">
					<div class="row">
			    		<div class="col-sm-6">
						    <div class="radio">
						        <label>
						        <input type="radio" name="aturan_pakai" id="aturan_pakai1" value="sebelum_makan" data-val="Sebelum Makan" checked="">
						        Sebelum Makan
						        </label>
						    </div>
						</div>
			    		<div class="col-sm-6">
						    <div class="radio">
						        <label>
						        <input type="radio" name="aturan_pakai" id="aturan_pakai2" value="sesudah_makan" data-val="Sesudah Makan">
						        Sesudah Makan
						        </label>
						    </div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
			    <label class="col-sm-3 control-label">Total Obat yang diberikan </label>
			    <div class="col-sm-4">
				    <input min="1" name="total_obat" value="1" class="form-control" placeholder="Masukan Total Obat">
				    <div style="color: #ff0000"></div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Dosis/Konsumsi</label>
				<div class="col-sm-4">
					<input min="1" name="dosis_konsumsi" value="1" class="form-control" placeholder="Masukan Dosis Konsumsi">
					<div style="color: #ff0000"></div>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label">Jadwal Konsumsi</label>
				<div class="col-sm-4">
					<div class="row">
						<div class="col-sm-12" id="container-jadwal" style="margin-bottom:5px;"></div>
						<div class="col-sm-8">
							<select class="form-control" id="input-jadwal">
								@for($i=0;$i<=23;$i++)
								<option value={{ $i }}><?php if($i<=9) echo '0'; ?>{{ $i }}:00</option>
								@endfor
							</select>
						</div>
						<div class="col-sm-4"><button type="button" class="btn btn-primary" onclick="tambahJadwal()">+</button></div>
					</div>
				</div>
			</div>
        </div>

        <div class="box-footer">
            <center><button class="btn btn-primary" onclick="tambahObat()" type="button">Tambah Obat</button></center>
        </div>
    </div>  

    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Tabel Obat</h3>
            <div class="box-tools">

            </div>
        </div>

        <div class="box-body">
        	<table class="table table-bordered">
        		<thead>
        			<tr>
        				<th width="40">No.</th>
        				<th>Nama Obat</th>
        				<th>Jadwal Konsumsi</th>
        				<th>Dosis/Konsumsi</th>
        				<th>Aturan Pakai</th>
        				<th>Total Obat Diberikan</th>
        				<th width="60">Aksi</th>
        			</tr>
        		</thead>
        		<tbody id="item-obat">
        			
        		</tbody>
        	</table>
        </div>

    </div>

    <center><button type="button" onclick="submitForm()" class="btn btn-success">Selesai & Simpan Form Kontrol</button></center>

</section>

</form>  

@endsection

@section('script')
<script type="text/javascript">

var jadwal = [];
var obat = [];

function tambahJadwal() {
	var v = $('#input-jadwal').val();
	var vt = $('#input-jadwal').find(':selected').text();
	if(v!=null){
		var htm = '<button type="button" data-val="'+v+'" class="btn btn-danger btn-xs" style="margin-right:4px;" onclick="hapusJadwal(\''+v+'\')">'+vt+'</button>';
		$('#container-jadwal').append(htm);
		$('#input-jadwal option[value="'+v+'"]').attr('disabled', 'disabled');

		jadwal.push(v);
		console.log(jadwal);
	}
}	

function hapusJadwal(op) {
	$('#input-jadwal option[value="'+op+'"]').removeAttr('disabled');
	$('#container-jadwal button[data-val="'+op+'"]').remove();
	jadwal = jQuery.grep(jadwal, function(value) {
		return value != op;
	});
}

function tambahObat() {
	if(jadwal.length>0){
		var nama_obat = $('#form-obat select[name=obat]').find(":selected").text();
		var obat_id = $('#form-obat select[name=obat]').find(":selected").val();
		var dosis_konsumsi = $('#form-obat input[name=dosis_konsumsi]').val();
		var aturan_pakai = $('#form-obat input[name=aturan_pakai]:checked').val();
		var total_obat = $('#form-obat input[name=total_obat]').val();
		var aturan_pakai_text = $('#form-obat input[name=aturan_pakai]').attr('data-val');

		var ht = '';
		$.each(jadwal, function(k,v){
			var vv = v;
			if(v<=9)
				vv = "0"+v;
			ht += '<span style="margin-right:4px;" class="label label-danger">'+vv+':00</span>';
		});

		if(!obat.includes(obat_id)){
			obat.push(obat_id);

			var htm = '<tr class="c-'+obat_id+'">'+
				'<td>'+($('#item-obat tr').length + 1)+'</td>'+
				'<td><input type="hidden" name="a_id_obat[]" value="'+obat_id+'">'+nama_obat+'</td>'+
				'<td><input type="hidden" name="a_jadwal_konsumsi[]" value='+JSON.stringify(jadwal)+'>'+ht+'</td>'+
				'<td><input type="hidden" name="a_dosis_konsumsi[]" value="'+dosis_konsumsi+'">'+dosis_konsumsi+'</td>'+
				'<td><input type="hidden" name="a_aturan_pakai[]" value="'+aturan_pakai+'">'+aturan_pakai_text+'</td>'+
				'<td><input type="hidden" name="a_total_obat[]" value="'+total_obat+'">'+total_obat+'</td>'+
				'<td><button type="button" class="btn btn-danger btn-xs" onclick="hapusObat(\'.c-'+obat_id+'\', '+obat_id+')">x</button></td>'+
			'</tr>';
			$('#item-obat').append(htm);

			jadwal = [];

			$('#input-jadwal option').removeAttr('disabled');
			$('#container-jadwal').empty();
		}else{
			alert('Obat sudah ditambahkan.')
		}
	}else{
		alert('Jadwal harus ditambahkan.')
	}
}

function hapusObat(cc, oid) {
	$(cc).remove();
	obat = jQuery.grep(jadwal, function(value) {
		return value != oid;
	});
}

function submitForm() {
	if(obat.length>0){
		$('form').submit();
	}else{
		alert('Anda belum menambahkan obat.');
	}
}

var sDate = '{{ date('d-m-Y'), strtotime(old('tgl_kontrol')) }}';

$('.datepicker2').datepicker({
	format: 'dd-mm-yyyy',
	startDate: '{{ date('d-m-Y'), strtotime(old('tgl_kontrol')) }}'
});	

$('.datepicker1').datepicker({
	format: 'dd-mm-yyyy'
}).on('hide', function(e) {
	$(".datepicker2").datepicker("option", "startDate", e.date);
});


</script>
@endsection

