<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('signin', 'APIController@signin');
Route::get('pasien/{email}', 'APIController@pasienData');
Route::get('monitoring/{email}', 'APIController@monitoringData');
Route::get('kontrol/obat/{id_kontrol}', 'APIController@kontrolObatData');
Route::get('obat/jadwal/{id_kontrol_obat}', 'APIController@jadwalKonsumsiData');
Route::get('update/jadwal/{diminum}/{jadwal_konsumsi_id}', 'APIController@updateJadwal');

Route::get('perkembangan/{email}/{mual}/{muntah}/{pusing}/{nyeri_kaki}/{gatal}/{kemerahan}/{kuning}/{lain_lain}', 'APIController@updatePerkembangan');