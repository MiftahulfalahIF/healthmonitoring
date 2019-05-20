<?php

namespace App\Http\Controllers\DokterKonsultan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Monitoring;

class MonitoringController extends Controller
{

    public function index()
    {
    	$monitorings = Monitoring::get();

        return view('dokter_konsultan.monitoring.index')->with('monitorings', $monitorings);

        
    }



 	public function create()
    {
       	$monitorings = Monitoring::get();
        return view('dokter_konsultan.monitoring.create')->with('monitorings', $monitorings);
    }

	public function store(Request $request)
    {

        $validatedData = $request->validate([
            //'no_monitoring' => 'required|unique:monitoring|max:255',
            'tgl_mulai' => 'required',
            'tahap_pengobatan' => 'required|numeric',
            'jml_kontrol' => 'required|numeric',
        ],
        [
           
            //'no_monitoring.required'=>'No Monitoring harus diisi',
            'no_monitoring.unique'=>'No Monitoring Sudah Terdaftar',
            'tgl_mulai.required' => 'Tanggal harus diisi',
            'tahap_pengobatan.required' => 'Tahap Berobat harus diisi',
            'tahap_pengobatan.numeric' => 'Tidak sesuai format',
           'jml_kontrol.required' => 'Jumlah kontrol harus diisi',
            'jml_kontrol.numeric' => 'Tidak sesuai format',
           

        ]); 

        $monitoring = new Monitoring;
        //$monitoring->no_monitoring = $request->input('no_monitoring');
        $monitoring->pasien_id = $request->input('pasien');
        $monitoring->dokterkonsultan_id = $request->input('dokter');
        $monitoring->klinik_awal = $request->input('klinik_awal');
        $monitoring->tgl_mulai = $request->input('tgl_mulai');
        $monitoring->tahap_pengobatan = $request->input('tahap_pengobatan');
        $monitoring->jml_kontrol = $request->input('jml_kontrol');
        $monitoring->status = $request->input('status');
        $monitoring->save();


        $monitoring->no_monitoring = $monitoring->id."/".date('d-m-Y', strtotime($monitoring->created_at))."/".strtoupper($monitoring->klinik_awal);
        $monitoring->save();

        return redirect()->action('DokterKonsultan\MonitoringController@index')->with ('msg', 'Data Berhasil Ditambahkan');
    }
  
}

