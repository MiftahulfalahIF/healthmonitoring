<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pasien;
use App\Monitoring;
use Hash;

class APIController extends Controller
{
    public function signin(Request $request)
    {

    	$validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $res =  [
    		'code' => 400,
    		'message' => 'Email atau password tidak tepat',
    		'status' => 'error',
    	];

        if ($validator->fails()) {
        	return response()->json($res);
        }

        if(Pasien::where('email', $request->input('email'))->count() > 0){
        	$pasien = Pasien::where('email', $request->input('email'))->first();

        	if (Hash::check($request->input('password'), $pasien->password)) {
				$res =  [
		    		'code' => 200,
		    		'message' => 'Signed In',
		    		'status' => 'success',
		    	];
			}
        }

    	return response()->json($res);
    }

    public function pasienData($email){
    	if(Pasien::where('email', $email)->count() > 0){
    		$pasien = Pasien::where('email', $email)->first();
    		$res =  [
			   'id' => $pasien->id,
			   'nama' => $pasien->nama,
			   'email' => $pasien->email,
			   'alamat' => $pasien->alamat,
			   'nik' => $pasien->nik,
			   'no_rekam_medis' => $pasien->no_rekam,
			   'status' => $pasien->status,
			   'jenis_kelamin' => $pasien->jk,
			   'wanita_subur' => $pasien->wanita_subur,
			   'nama_pmo' => $pasien->nama_pmo,
			   'nik_pmo' => $pasien->nik_pmo,
			   'telepon_pmo' => $pasien->tlp_pmo,
			];

    		return response()->json($res);
    	}

    	return response()->json(null);
    }

    public function monitoringData($email){

    	if(Pasien::where('email', $email)->count() > 0){

    		$pasien = Pasien::where('email', $email)->first();
    		$monitoring = Monitoring::where('pasien_id', $pasien->id)->where('status', 'berjalan')->first();

            $kontrols = [];

            foreach ($monitoring->kontrols as $kon) {
                $k = [];
                $k['id'] = $kon->id;
                $k['no_kontrol'] = $kon->no_kontrol;
                $k['tgl_kontrol'] = date('d-m-Y', strtotime($kon->tgl_kontrol));
                $k['tgl_kembali'] = date('d-m-Y', strtotime($kon->tgl_kembali));
                $k['status'] = $kon->status;
                $k['dpjp'] = $kon->dpjp->nama;

                $kontrols[] = $k;
            }

    		$res =  [
			   	'id' => $monitoring->id,
				'nama' => $monitoring->pasien->nama,
				'no_monitoring' => $monitoring->no_monitoring,
				'dok_konsultan' => $monitoring->dokter_konsultan->nama,
				'klinik_awal' => $monitoring->klinik_awal,
				'tgl_mulai' => date('d-m-Y', strtotime($monitoring->tgl_mulai)),
				'tahap' => $monitoring->tahap_pengobatan,
				'jumlah_kontrol' => $monitoring->jml_kontrol,
				'status' => $monitoring->status,
                'kontrols' => $kontrols
			];

    		return response()->json($res);
    	}

    	return response()->json(null);
    }
}
