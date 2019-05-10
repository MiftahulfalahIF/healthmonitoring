<?php

namespace App\Http\Controllers\DokterKonsultan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Obat;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $obats = Obat::get();
        return view('dokter_konsultan.obat.index')->with('obats', $obats);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $obats = Obat::get();
       return view('dokter_konsultan.obat.create')->with('obats', $obats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obat = new Obat;
        
        $obat->kode = $request->input('kode');
        $obat->nama = $request->input('nama');
        $obat->golongan = $request->input('golongan');
        $obat->kategori = $request->input('kategori');
        $obat->bentuk = $request->input('bentuk');
        $obat->indikasi = $request->input('indikasi');
        $obat->dosis = $request->input('dosis');
        $obat->produsen = $request->input('produsen');
        $obat->save();

        return redirect()->action('DokterKonsultan\ObatController@index')->with ('msg', 'Data Berhasil Ditambahkan');
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        


    }
}
