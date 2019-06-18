<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Dokter;

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
            if ($user->role=='dokter_konsultan')
                return redirect()->action('DokterKonsultan\DashboardController@index');

            if ($user->role=='dpjp')
                return redirect()->action('Dpjp\DashboardController@index');
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
