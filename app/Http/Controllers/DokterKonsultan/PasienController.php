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
        $validatedData = $request->validate([
            'nama' => 'required',
            'nik' => 'required|numeric|unique:pasien',
            'no_rekam' => 'required|numeric|unique:pasien',
            'email' => 'required|email|unique:pasien|max:255',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'bb' => 'required|numeric',
            'tb' => 'required|numeric',
            'telepon' => 'required|numeric',
            'nama_pmo' => 'required',
            'nik_pmo' => 'required|numeric',
            'tlp_pmo' => 'required|numeric',

        ],
        [
            'nama.required' => 'Nama harus diisi',
            'nik.required' => 'NIK harus diisi',
            'nik.unique' => 'NIK sudah terdaftar',
            'nik.numeric' => 'NIK tidak sesuai format',
            'no_rekam.required' => 'NO REKAM harus diisi',
            'no_rekam.unique' => 'NO REKAM sudah terdaftar',
            'no_rekam.numeric' => 'NO REKAM tidak sesuai format',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak tepat',
            'email.unique' => 'Email sudah terdaftar',
            'alamat.required' => 'Alamat harus diisi',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi',
            'bb.required' => 'Berat badan harus diisi',
            'bb.numeric' => 'Berat badan tidak sesuai format',
            'tb.required' => 'Tinggi badan harus diisi',
            'tb.numeric' => 'Tinggi badan tidak sesuai format',
            'telepon.required' => 'Telepon harus diisi',
            'telepon.numeric' => 'Telepon tidak sesuai format',
            'nama_pmo.required' => 'Nama PMO harus diisi',
            'nik_pmo.required' => 'NIK PMO harus diisi',
            'nik_pmo.numeric' => 'NIK tidak sesuai format',
            'tlp_pmo.required' => 'Telepon PMO harus diisi',
            'tlp_pmo.numeric' => 'Telepon tidak sesuai format',


        ]);


        $pasien = new Pasien;
        $pasien->nama = $request->input('nama');
        $pasien->nik = $request->input('nik');
        $pasien->no_rekam = $request->input('no_rekam');
        $pasien->status = $request->input('status');
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

        $validatedData = $request->validate([
            'nama' => 'required',
            'nik' =>  'required|numeric|unique:pasien,nik,'.$id.'',
            'no_rekam' => 'required|numeric|unique:pasien,no_rekam,'.$id.'',
            'email' => 'required|email|unique:pasien,email,'.$id.'|max:255',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'bb' => 'required|numeric',
            'tb' => 'required|numeric',
            'telepon' => 'required|numeric',
            'nama_pmo' => 'required',
            'nik_pmo' => 'required|numeric',
            'tlp_pmo' => 'required|numeric',

        ],
        [
            'nama.required' => 'Nama harus diisi',
            'nik.required' => 'NIK harus diisi',
            'nik.unique' => 'NIK sudah terdaftar',
            'nik.numeric' => 'NIK tidak sesuai format',
            'no_rekam.required' => 'NO REKAM harus diisi',
            'no_rekam.unique' => 'NO REKAM sudah terdaftar',
            'no_rekam.numeric' => 'NO REKAM tidak sesuai format',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak tepat',
            'email.unique' => 'Email sudah terdaftar',
            'alamat.required' => 'Alamat harus diisi',
            'tgl_lahir.required' => 'Tanggal lahir harus diisi',
            'bb.required' => 'Berat badan harus diisi',
            'bb.numeric' => 'Berat badan tidak sesuai format',
            'tb.required' => 'Tinggi badan harus diisi',
            'tb.numeric' => 'Tinggi badan tidak sesuai format',
            'telepon.required' => 'Telepon harus diisi',
            'telepon.numeric' => 'Telepon tidak sesuai format',
            'nama_pmo.required' => 'Nama PMO harus diisi',
            'nik_pmo.required' => 'NIK PMO harus diisi',
            'nik_pmo.numeric' => 'NIK tidak sesuai format',
            'tlp_pmo.required' => 'Telepon PMO harus diisi',
            'tlp_pmo.numeric' => 'Telepon tidak sesuai format',


        ]);

        
        $pasien =Pasien::find($id);
        $pasien->nama = $request->input('nama');
        $pasien->password = bcrypt('mauwisuda');
        $pasien->nik = $request->input('nik');
        $pasien->status = $request->input('status');
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
