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
            if ($user->role=='superadmin')
                return redirect()->action('Perawat\PasienController@index');
	    }

	    // Kondisi salah email atau password
	   	return redirect()->action('LoginController@login')
            ->with('msg', 'Email atau password yang Anda masukkan tidak tepat.')
            ->withInput(
                    $request->except('password')
            );
    }

    public  function logout(){
    	Auth::logout();
    	return redirect()->action('LoginController@login');
    }
}
