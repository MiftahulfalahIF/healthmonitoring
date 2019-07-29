<?php

namespace App\Http\Controllers\Perawat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kontrol;
use App\KontrolObat;
use App\JadwalKonsumsi;
use App\Monitoring;

class KontrolController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($monitoring_id)
    {
        $monitoring = Monitoring::find($monitoring_id);

        $kontrol = new Kontrol;
        return view('perawat.kontrol.create')->with('monitoring_id', $monitoring_id)
        ->with('pasien_nama', $monitoring->pasien->nama);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $monitoring_id)
    {
        $monitoring = Monitoring::find($monitoring_id);
        $monitoring->status = 'berjalan';
        $monitoring->save();

        //return dd(json_decode($request->input('a_jadwal_konsumsi')[0]));

        $kontrol = new Kontrol;
        $kontrol->monitoring_id =$monitoring->id;
        $kontrol->pasien_id =$monitoring->pasien_id;
        $kontrol->perawat_id =$request->input('perawat');
        $kontrol->dokter_id =$request->input('dokter');
        $kontrol->tgl_kontrol = date('Y-m-d', strtotime($request->input('tgl_kontrol')));
        $kontrol->tgl_kembali = date('Y-m-d', strtotime($request->input('tgl_kembali')));
        $kontrol->status = 'berjalan';
        $kontrol-> save();

        $kontrol->no_kontrol = $kontrol->id."/Kontrol/".$kontrol->perawat_id."/".date('d/m/Y', strtotime($kontrol->tgl_kontrol));
        $kontrol->save();

        $i = 0;
        foreach($request->input('a_id_obat') as $obat){
            $kontrolObat = new KontrolObat;
            $kontrolObat->kontrol_id = $kontrol->id;
            $kontrolObat->obat_id = $obat;
            $kontrolObat->aturan_pakai = $request->input('a_aturan_pakai')[$i];
            $kontrolObat->dosis_konsumsi = $request->input('a_dosis_konsumsi')[$i];
            $kontrolObat->total_obat = $request->input('a_total_obat')[$i];
            $kontrolObat->jadwal_konsumsi = $request->input('a_jadwal_konsumsi')[$i];
            $kontrolObat->save();

            $sum = $kontrolObat->total_obat / $kontrolObat->dosis_konsumsi;
            
            $json = json_decode($request->input('a_jadwal_konsumsi')[$i]);
            $jadwals = [];
            foreach($json as $jad){
                if($jad<=9){
                    $jadwals[] = "0".$jad.":00:00";
                }else{
                    $jadwals[] = $jad.":00:00";
                }
            }
            
            $x = 0;
            $day = 0;
            for($j=1;$j<=$sum;$j++) {
                $jadwal = new JadwalKonsumsi;
                $jadwal->kontrol_obat_id = $kontrolObat->id;

                $jadwal->jadwal_konsumsi = date('Y-m-d '.$jadwals[$x], strtotime($kontrol->tgl_kontrol.' +'.$day.' day'));
                if($x<count($jadwals)-1){
                    $x++;
                }else{
                    $day++;
                    $x = 0;
                }
                $jadwal->save();
            }
            
            $i++;
        }

        return redirect()->action('Perawat\KontrolController@show', [$kontrol->id])->withMessage('Kontrol berhasil ditambahkan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kontrol = Kontrol::find($id);
        return view('perawat.kontrol.show')->with('kontrol', $kontrol);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
