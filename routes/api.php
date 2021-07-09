<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*  NAMA : Fajar Agsa Hatmal
    NIM  : 1810530165
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('password', function (){
    return bcrypt('fajar');
});

//----REST API WISATA----

// Get all Wisata
Route::get('wisatas', 'WisataController@getWisata');

// Get Specic Wisata detail
Route::get('wisata/{id}', 'WisataController@getWisataById');

// Add Wisata
Route::post('addWisata', 'WisataController@addWisata');

// Update Wisata
Route::put('updateWisata/{id}', 'WisataController@updateWisata');

// Delete Wisata
Route::delete('deleteWisata/{id}', 'WisataController@deleteWisata');

//------------------------------------------------------------------------------------

//----REST API PERJALANAN----

// Get all Perjalanan
Route::get('perjalanans', 'PerjalananController@getPerjalanan');

// Get Specic Perjalanan detail
Route::get('perjalanan/{id}', 'PerjalananController@getPerjalananById');

// Add Perjalanan
Route::post('addPerjalanan', 'PerjalananController@addPerjalanan');

// Update Perjalanan
Route::put('updatePerjalanan/{id}', 'PerjalananController@updateperjalanan');

// Delete perjalanan
Route::delete('deletePerjalanan/{id}', 'PerjalananController@deletePerjalanan');

//-----------------------------------------------------------------------------------

// Akses Login
Route::group(['middleware' => 'api','prefix' => 'auth'], function ($router) {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
});