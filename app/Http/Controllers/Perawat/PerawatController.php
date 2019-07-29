<?php

namespace App\Http\Controllers\Perawat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Perawat;
use Hash;

class PerawatController extends Controller
{
    
    public function index()
    {
        $perawats = Perawat::get();
        return view('perawat.perawat.index')->with('perawats', $perawats);
    }


     public function create()
    {
        $perawats = Perawat::get();
        return view('perawat.perawat.create')->with('perawats', $perawats);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email|unique:perawat|max:255',
            'nama' => 'required',
            'nik' => 'required|numeric|unique:perawat',
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

        $perawat = new Perawat;
        $perawat->email = $request->input('email');
        $perawat->nama = $request->input('nama');
        $perawat->nik = $request->input('nik');
        $perawat->role = $request->input('role');
        $perawat->status = $request->input('status');
        $perawat->telepon = $request->input('telepon');
        $perawat->password = Hash::make('perawat');
        $perawat->save();

        return redirect()->action('Perawat\PerawatController@index')->with ('msg', 'Data Berhasil Ditambahkan');
    }

      public function show($id)
    {
        $perawat = Perawat::find($id);
        return view('perawat.perawat.show')->with('perawat', $perawat);
    }

    public function edit($id)
    {
        $perawat = Perawat::find($id);

        return view('perawat.perawat.edit')->with('perawat', $perawat);

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

        $rule = [
            'email' => 'required|email|unique:perawat,email,'.$id.'|max:255',
            'nama' => 'required',
            'nik' => 'required|numeric|unique:perawat,nik,'.$id.'',
            'telepon' => 'required',
        ];

        if(!empty($request->input('password'))){
            $rule['password'] = 'min:8|confirmed';
        }

        $validatedData = $request->validate($rule,
        [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Format email tidak tepat',
            'email.unique' => 'Email sudah terdaftar',
            'nama.required' => 'Nama harus diisi',
            'nik.required' => 'NIK harus diisi',
            'nik.numeric' => 'NIK tidak sesuai format',
            'nik.unique' => 'NIK sudah terdaftar',
            'telepon.required' => 'Telepon harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'password tidak sama',

        ]);

        $perawat = Perawat::find($id);
        $perawat->email = $request->input('email');
        $perawat->nama = $request->input('nama');
        $perawat->nik = $request->input('nik');
        $perawat->role = $request->input('role');
        $perawat->status = $request->input('status');
        $perawat->telepon = $request->input('telepon');

        if(!empty($request->input('password'))){
            $perawat->password = bcrypt($request->input('password'));
        }

        $perawat->save();


        return redirect()->action('Perawat\PerawatController@index')->with ('msg', 'Data Berhasil Diedit');
    }

     public function updatePassword(Request $request, $id)
    {
         $validatedData = $request->validate([
            'password' => 'required|min:8|confirmed',
        ],
        [
            'password.required' => 'Password harus diisi',
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'password tidak sama',


        ]);
        $perawat = Perawat::find($id);
        $perawat->password = bcrypt($request->input('password'));
        $perawat->save();

        return redirect()->action('LoginController@logout');

    }

}
