<?php

namespace App\Http\Controllers\DokterKonsultan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kontrol;
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
        return view('dokter_konsultan.kontrol.create')->with('monitoring_id', $monitoring_id)
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

        $kontrol = new Kontrol;
        $kontrol->monitoring_id =$monitoring->id;
        $kontrol->pasien_id =$monitoring->pasien_id;
        $kontrol->dpjp_id =$request->input('dokter');
        $kontrol->tgl_kontrol =$request->input('tgl_kontrol');
        $kontrol-> save();

        $kontrol->no_kontrol = $kontrol->id."/Kontrol/".$kontrol->dpjp_id."/".date('d/m/Y', strtotime($kontrol->tgl_kontrol));
        $kontrol->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
