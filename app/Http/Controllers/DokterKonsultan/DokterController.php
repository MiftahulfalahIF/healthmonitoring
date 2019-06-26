<?php

namespace App\Http\Controllers\DokterKonsultan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dokter;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dokters = Dokter::get();
        return view('dokter_konsultan.dokter.index')->with('dokters', $dokters);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dokters = Dokter::get();
        return view('dokter_konsultan.dokter.create')->with('dokters', $dokters);
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


        ]);

        $dokter = new Dokter;
        $dokter->email = $request->input('email');
        $dokter->password = bcrypt('12345');
        $dokter->role = $request->input('role');
        $dokter->nama = $request->input('nama');
        $dokter->nik = $request->input('nik');
        $dokter->status = $request->input('status');
        $dokter->unit = $request->input('unit');

        $dokter->sub_unit = null;
        if($request->input('unit')=='bedah'){
            $dokter->sub_unit = $request->input('sub_unit');
        }

        $dokter->telepon = $request->input('telepon');
        $dokter->save();

        return redirect()->action('DokterKonsultan\DokterController@index')->with ('msg', 'Data Berhasil Ditambahkan');
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
        $dokter = Dokter::find($id);

        return view('dokter_konsultan.dokter.edit')->with('dokter', $dokter);

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
            'email' => 'required|email|unique:dokter,email,'.$id.'|max:255',
            'nama' => 'required',
            'nik' => 'required|numeric|unique:dokter,nik,'.$id.'',
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


        ]);

        $dokter = Dokter::find($id);
        $dokter->email = $request->input('email');
        $dokter->password = bcrypt('12345');
        $dokter->role = $request->input('role');
        $dokter->nama = $request->input('nama');
        $dokter->nik = $request->input('nik');
        $dokter->status = $request->input('status');
        $dokter->unit = $request->input('unit');

        $dokter->sub_unit = null;
        if($request->input('unit')=='bedah'){
            $dokter->sub_unit = $request->input('sub_unit');
        }

        $dokter->telepon = $request->input('telepon');
        $dokter->save();


        return redirect()->action('DokterKonsultan\DokterController@index')->with ('msg', 'Data Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dokter = Dokter::find($id);
        $dokter->delete();
        
        return redirect()->action('DokterKonsultan\DokterController@index')->with('msg', 'Data berhasil dihapus');



    }
}
