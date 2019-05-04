<?php

namespace App\Http\Controllers\DokterKonsultan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pasien;

class PasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $pasiens = Pasien::get();
         return view('dokter_konsultan.pasien.index')->with('pasiens', $pasiens);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pasiens = Pasien::get();
        return view('dokter_konsultan.pasien.create')->with('pasiens', $pasiens);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:dokter|max:255',
            'nama' => 'required',
            'nik' => 'required|numeric|unique:dokter',
            'telepon' => 'required',
        ],
        [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak tepat',
            'email.unique' => 'Email sudah terdaftar',
            'nama.required' => 'Nama harus diisi',
            'nik.required' => 'NIK harus diisi',
            'nik.numeric' => 'NIK tidak sesuai format',
            'nik.unique' => 'NIK sudah terdaftar',
            'telepon.required' => 'Telepon harus diisi',


        ]);*/

        $pasien = new Pasien;
        $pasien->nama = $request->input('nama');
        $pasien->nik = $request->input('nik');
        $pasien->no_rekam = $request->input('no_rekam');
        $pasien->password = bcrypt('12345');
        $pasien->email = $request->input('email');
        $pasien->alamat = $request->input('alamat');
        $pasien->jk = $request->input('jk');
        $pasien->wanita_subur = $request->input('wanita_subur');
        $pasien->tgl_lahir = $request->input('tgl_lahir');
        $pasien->bb = $request->input('bb');
        $pasien->tb = $request->input('tb');
        $pasien->bentuk_obat = $request->input('bentuk_obat');
        $pasien->telepon = $request->input('telepon');
        $pasien->nama_pmo = $request->input('nama_pmo');
        $pasien->nik_pmo = $request->input('nik_pmo');
        $pasien->tlp_pmo = $request->input('tlp_pmo');
        $pasien->save();

        return redirect()->action('DokterKonsultan\PasienController@index')->with ('msg', 'Data Berhasil Ditambahkan');
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
        $pasien = Pasien::find($id);

        return view('dokter_konsultan.pasien.edit')->with('pasien', $pasien);
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
        $pasien =Pasien::find($id);
        $pasien->nama = $request->input('nama');
        $pasien->password = bcrypt('mauwisuda');
        $pasien->nik = $request->input('nik');
        $pasien->no_rekam = $request->input('no_rekam');
        $pasien->email = $request->input('email');
        $pasien->alamat = $request->input('alamat');
        $pasien->jk = $request->input('jk');
        $pasien->wanita_subur = $request->input('wanita_subur');
        $pasien->tgl_lahir = $request->input('tgl_lahir');
        $pasien->bb = $request->input('bb');
        $pasien->tb = $request->input('tb');
        $pasien->bentuk_obat = $request->input('bentuk_obat');
        $pasien->telepon = $request->input('telepon');
        $pasien->nama_pmo = $request->input('nama_pmo');
        $pasien->nik_pmo = $request->input('nik_pmo');
        $pasien->tlp_pmo = $request->input('tlp_pmo');
        $pasien->save();


        return redirect()->action('DokterKonsultan\PasienController@index')->with ('msg', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $pasien = Pasien::find($id);
        $pasien->delete();
        
        return redirect()->action('DokterKonsultan\PasienController@index')->with('msg', 'Data berhasil dihapus');

    }
}
