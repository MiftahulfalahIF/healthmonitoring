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

Route::get('/', 'LoginController@login');

Route::group(['middleware' => 'guest'],function(){
	Route::get('/login', 'LoginController@login');

});



Route::post('/login/do', 'LoginController@loginDo');

Route::get('/logout', 'LoginController@logout');

Route::group(['prefix' => '/dokter_konsultan'], function(){
	Route::get('/dashboard', 'DokterKonsultan\DashboardController@index');
	Route::get('/monitoring', 'DokterKonsultan\MonitoringController@index');
	Route::resource('/dokter', 'DokterKonsultan\DokterController');
	Route::resource('/pasien', 'DokterKonsultan\PasienController');
	Route::resource('/obat', 'DokterKonsultan\ObatController');
	Route::resource('/efeksamping', 'DokterKonsultan\EfekSampingController');
	Route::resource('/monitoring', 'DokterKonsultan\MonitoringController');

	Route::group(['prefix' => '/kontrol'], function(){
		Route::get('/create/{monitoring_id}', 'DokterKonsultan\KontrolController@create');
		Route::post('/store/{monitoring_id}', 'DokterKonsultan\KontrolController@store');
		Route::get('/show/{id}', 'DokterKonsultan\KontrolController@show');
	});


});

Route::get('/dpjp/dashboard', 'Dpjp\DashboardController@index');


