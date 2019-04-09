<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function login(){
    	 return view('login');
    }

    public function loginDo(Request $request){

    	$credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...

            $user = Auth::user();
            if ($user->role=='perawat_klinik')
                return redirect()->action('PerawatKlinik\DashboardController@index');

            if ($user->role=='dokter')
                return redirect()->action('Dokter\DashboardController@index');
            if ($user->role=='kepala_klinik')
                return redirect()->action('KepalaKlinik\DashboardController@index');
	    }

	    // Kondisi salah email atau password
	   	return redirect()->action('LoginController@login')
            ->with('msg', 'Email dan Password yang Anda Masukan Salah!!!')
            ->withInput(
                    $request->except('password')
            );
    }

    public  function logout(){
    	Auth::logout();
    	return redirect()->action('LoginController@login');
    }
}
