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

// Authentication
Route::group(['prefix'=>'auth'], function($route){
  $route->post('login', 'AuthController@login');
  $route->post('register', 'AuthController@register');

  Route::group([
    'middleware' => 'jwt'
  ], function() {
    Route::get('logout', 'AuthController@logout')->name('logout');
  });
});

Route::put('user/{id}', 'UserController@update')->middleware('jwt');

// Get Dokter dan Pasien
Route::get('user/{id}/get/dokter', 'UserController@getDokter')->middleware('jwt');
Route::get('user/{id}/get/pasien', 'UserController@getPasien')->middleware('jwt');

// Add and delete pasien
Route::post('user/add/pasien', 'UserController@addPasien')->middleware('jwt');
Route::post('user/delete/pasien', 'UserController@deletePasien')->middleware('jwt');

Route::apiResource('obat', 'ObatController')->middleware('jwt');
Route::get('obat/{id}/dosis', 'ObatController@dosis')->middleware('jwt');

Route::apiResource('zona', 'ZonaController');

Route::post('dispatch/zona/{id}', 'MutationController@ActionSaveLastZona')->middleware('jwt');
Route::post('commit/zona/action', 'MutationController@MutationZonaAction')->middleware('jwt');

Route::get('riwayat/{user_id}', 'RiwayatController@show')->middleware('jwt');
Route::post('riwayat', 'RiwayatController@store')->middleware('jwt');

Route::get('pencegahan', function () {
  $pencegahan = App\Pencegahan::all();
  return response()->json($pencegahan);
});