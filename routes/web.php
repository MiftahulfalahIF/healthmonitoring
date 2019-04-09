<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'guest'],function(){
	Route::get('/login', 'LoginController@login');

});



Route::post('/login/do', 'LoginController@loginDo');

Route::get('/logout', 'LoginController@logout');

Route::get('/dokter_konsultan/dashboard', 'DokterKonsultan\DashboardController@index');

Route::get('/dpjp/dashboard', 'Dpjp\DashboardController@index');

