<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Pasien;
use App\Kontrol;
use App\Monitoring;
use App\KontrolObat;
use App\JadwalKonsumsi;
use App\SurveyPerkembangan;
use App\SurveySesakNafas;
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

            $kontrol_status = 'inactive';
            $kontrol = Kontrol::where('pasien_id', $pasien->id)->where('status', 'berjalan')->count();
            if($kontrol>0){
                $kontrol_status = 'active';
            }
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
               'kontrol_status' => $kontrol_status,
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

            if(!empty($monitoring)){

                foreach ($monitoring->kontrols as $kon) {
                    $k = [];
                    $k['id'] = $kon->id;
                    $k['no_kontrol'] = $kon->no_kontrol;
                    $k['tgl_kontrol'] = date('d-m-Y', strtotime($kon->tgl_kontrol));
                    $k['tgl_kembali'] = date('d-m-Y', strtotime($kon->tgl_kembali));
                    $k['status'] = $kon->status;
                    $k['dokter'] = $kon->dokter->nama;

                    $kontrols[] = $k;
                }

        		$res =  [
    			   	'id' => $monitoring->id,
    				'nama' => $monitoring->pasien->nama,
    				'no_monitoring' => $monitoring->no_monitoring,
    				'perawat' => $monitoring->perawat->nama,
    				'klinik_awal' => $monitoring->klinik_awal,
    				'tgl_mulai' => date('d-m-Y', strtotime($monitoring->tgl_mulai)),
    				'tahap' => $monitoring->tahap_pengobatan,
    				'jumlah_kontrol' => $monitoring->jml_kontrol,
    				'status' => $monitoring->status,
                    'kontrols' => $kontrols
    			];

        		return response()->json($res);
            }
        }

    	return response()->json(null);
    }

    public function kontrolObatData($kontrol_id){
        if(KontrolObat::where('kontrol_id', $kontrol_id)->count() > 0){
            $kontrolObat = KontrolObat::where('kontrol_id', $kontrol_id)->get();

            $res = [];
            foreach ($kontrolObat as $ko) {
                $r = [];
                $r['id'] = $ko->id;
                $r['kontrol_id'] = $ko->kontrol_id;
                $r['obat'] = $ko->obat;
                $r['dosis_konsumsi'] = $ko->dosis_konsumsi;
                $r['jadwal_konsumsi'] = $ko->jadwal_konsumsi;
                $r['aturan_pakai'] = $ko->aturan_pakai;
                $r['total_obat'] = $ko->total_obat;

                $res[] = $r;
            }

            return response()->json($res);
        }

        return response()->json(null);
    }

    public function jadwalKonsumsiData($kontrol_obat_id){
        if(JadwalKonsumsi::where('kontrol_obat_id', $kontrol_obat_id)->count() > 0){
            $JadwalKonsumsi = JadwalKonsumsi::where('kontrol_obat_id', $kontrol_obat_id)->get();

            $res = [];
            foreach ($JadwalKonsumsi as $ko) {

                $diminum = "Belum Diminum";

                if($ko->diminum == 'tidak')
                    $diminum = "Tidak Diminum";
                if($ko->diminum == 'ya')
                    $diminum = "Sudah Diminum";
                if($ko->diminum == 'belum')
                    $diminum = "Belum Diminum";

                $r = [];
                $r['id'] = $ko->id;
                $r['jadwal_konsumsi'] = date('d-m-Y H:i', strtotime($ko->jadwal_konsumsi));
                $r['diminum'] = $diminum;

                $res[] = $r;
            }

            return response()->json($res);
        }

        return response()->json(null);
    }

    public function updateJadwal($diminum, $jadwal_konsumsi_id) {
        $jadwal_konsumsi = JadwalKonsumsi::find($jadwal_konsumsi_id);
        $jadwal_konsumsi->diminum = $diminum;
        $jadwal_konsumsi->save();

        return response()->json($jadwal_konsumsi->diminum);
    }

    public function updatePerkembangan($email,$mual, $muntah, $pusing, $nyeri_kaki, $gatal, $kemerahan, $kuning, $lain_lain) {

        $pasien = Pasien::where('email', $email)->first();
        $kontrol = Kontrol::where('pasien_id', $pasien->id)->where('status', 'berjalan')->first();

        if(SurveyPerkembangan::where('pasien_id', $pasien->id)->where('kontrol_id', $kontrol->id)->where('created_at', 'LIKE', '%'.date('Y-m-d').'%')->count() <=0 ){

            $p = new SurveyPerkembangan;
            $p->pasien_id = $pasien->id;
            $p->kontrol_id = $kontrol->id;
            $p->mual = $mual;
            $p->muntah = $muntah;
            $p->pusing = $pusing;
            $p->nyeri_kaki = $nyeri_kaki;
            $p->gatal = $gatal;
            $p->kemerahan = $kemerahan;
            $p->kuning = $kuning;
            $p->lain_lain = $lain_lain;
            $p->save();

            return response()->json("Perkembangan pasien telah diupdate");
        }else{
            return response()->json("Perkembangan pasien telah diupdate");
        }

        return response()->json("Gagal update perkembangan pasien");
    }

    public function updateSesakNafas($email, $level){
        $pasien = Pasien::where('email', $email)->first();
        $kontrol = Kontrol::where('pasien_id', $pasien->id)->where('status', 'berjalan')->first();

        if(SurveySesakNafas::where('pasien_id', $pasien->id)->where('kontrol_id', $kontrol->id)->where('created_at', 'LIKE', '%'.date('Y-m-d').'%')->count() <=0 ){
            $p = new SurveySesakNafas;
            $p->pasien_id = $pasien->id;
            $p->kontrol_id = $kontrol->id;
            $p->tingkat_sesak_nafas = $level;
            $p->save();

            return response()->json("Survey sesak nafas pasien telah diupdate");
        }else{
            return response()->json("Survey sesak nafas pasien telah diupdate");
        }

        return response()->json("Gagal update survey sesak nafas pasien");
    }

    public function gantiPassword(Request $request) {
        $pasien = Pasien::where('email', $request->email)->first();
        $pasien->password = bcrypt($request->password);
        $pasien->save();

        return response()->json("Password berhasil diganti");
    }
}
