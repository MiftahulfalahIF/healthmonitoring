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
Route::group(['middleware' => 'auth'],function(){
	Route::get('/', 'Perawat\DashboardController@index');
});

Route::group(['middleware' => 'guest'],function(){
	Route::get('/login', 'LoginController@login')->name('login');
});



Route::post('/login/do', 'LoginController@loginDo');

Route::get('/logout', 'LoginController@logout');

Route::group(['prefix' => '/perawat'], function(){
	Route::get('/dashboard', 'Perawat\DashboardController@index');
	Route::get('/monitoring', 'Perawat\MonitoringController@index');
	Route::resource('/dokter', 'Perawat\DokterController');
	Route::resource('/pasien', 'Perawat\PasienController');
	Route::resource('/perawat', 'Perawat\PerawatController');
	Route::resource('/obat', 'Perawat\ObatController');
	Route::resource('/efeksamping', 'Perawat\EfekSampingController');
	Route::resource('/monitoring', 'Perawat\MonitoringController');

	Route::group(['prefix' => '/kontrol'], function(){
		Route::get('/create/{monitoring_id}', 'Perawat\KontrolController@create');
		Route::post('/store/{monitoring_id}', 'Perawat\KontrolController@store');
		Route::get('/show/{id}', 'Perawat\KontrolController@show');
	});

	Route::get('/laporan/kontrol/{id}', 'Perawat\PasienController@kontrol');

	Route::post('update-password/{id}', 'Perawat\PerawatController@updatePassword');
});

Route::get('/dpjp/dashboard', 'Dpjp\DashboardController@index');


