<?php

namespace App\Http\Controllers\Perawat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Monitoring;
use Auth;

class MonitoringController extends Controller
{

    public function index()
    {
    	$monitorings = Monitoring::get();

        return view('perawat.monitoring.index')->with('monitorings', $monitorings);

        
    }



 	public function create()
    {
       	$monitorings = Monitoring::get();
        return view('perawat.monitoring.create')->with('monitorings', $monitorings);
    }

	public function store(Request $request)
    {

        $validatedData = $request->validate([
            //'no_monitoring' => 'required|unique:monitoring|max:255',
            'tgl_mulai' => 'required',
            'tahap_pengobatan' => 'required|numeric',
            'jml_kontrol' => 'required|numeric',
            'klinik_awal' => 'required',
        ],
        [
           
            //'no_monitoring.required'=>'No Monitoring harus diisi',
            //'no_monitoring.unique'=>'No Monitoring Sudah Terdaftar',
            'tgl_mulai.required' => 'Tanggal harus diisi',
            'tahap_pengobatan.required' => 'Tahap Berobat harus diisi',
            'tahap_pengobatan.numeric' => 'Tidak sesuai format',
           'jml_kontrol.required' => 'Jumlah kontrol harus diisi',
           'klinik_awal.required' => 'Klinik awal harus diisi',
            'jml_kontrol.numeric' => 'Tidak sesuai format',
           

        ]); 

        $check1 = Monitoring::where('pasien_id', $request->input('pasien'))->where('status', '=', 'berjalan')->count();
        $check2 = Monitoring::where('pasien_id', $request->input('pasien'))->where('status', '=', 'belum')->count();

        if($check1+$check2>0){
            return redirect()->action('Perawat\MonitoringController@create')->with('err', 'Monitoring Sudah Ada.');
        }

        $monitoring = new Monitoring;
        //$monitoring->no_monitoring = $request->input('no_monitoring');
        $monitoring->pasien_id = $request->input('pasien');
        $monitoring->perawat_id = Auth::user()->id;
        $monitoring->klinik_awal = $request->input('klinik_awal');
        $monitoring->tgl_mulai = date('Y-m-d', strtotime($request->input('tgl_mulai')));
        $monitoring->tahap_pengobatan = $request->input('tahap_pengobatan');
        $monitoring->jml_kontrol = $request->input('jml_kontrol');
        $monitoring->status = 'belum';
        $monitoring->save();


        $monitoring->no_monitoring = $monitoring->id."/".date('d-m-Y', strtotime($monitoring->created_at))."/".strtoupper($monitoring->klinik_awal);
        $monitoring->save();

        return redirect()->action('Perawat\MonitoringController@index')->with ('msg', 'Data Berhasil Ditambahkan');
    }

    public function edit($id)
    {
        $monitoring = Monitoring::find($id);

        return view('perawat.monitoring.edit')->with('monitoring', $monitoring);

    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tgl_mulai' => 'required',
            'tahap_pengobatan' => 'required|numeric',
            'jml_kontrol' => 'required|numeric',
        ],
        [
            'tgl_mulai.required' => 'Tanggal harus diisi',
            'tahap_pengobatan.required' => 'Tahap Berobat harus diisi',
            'tahap_pengobatan.numeric' => 'Tidak sesuai format',
           'jml_kontrol.required' => 'Jumlah kontrol harus diisi',
            'jml_kontrol.numeric' => 'Tidak sesuai format',


        ]);

        $monitoring =Monitoring::find($id);

        $monitoring->pasien_id = $request->input('pasien');
        $monitoring->perawat_id = Auth::user()->id;
        $monitoring->klinik_awal = $request->input('klinik_awal');
        $monitoring->tgl_mulai = $request->input('tgl_mulai');
        $monitoring->tahap_pengobatan = $request->input('tahap_pengobatan');
        $monitoring->jml_kontrol = $request->input('jml_kontrol');
        $monitoring->status = $request->input('status');
        $monitoring->save();


        return redirect()->action('Perawat\MonitoringController@index')->with ('msg', 'Data Berhasil Diedit');
    }
  

    public function show($id)
    {
        $monitoring = Monitoring::find($id);

        return view('perawat.monitoring.show')->with('monitoring', $monitoring);
    }
}

