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

Route::get('/NotificacionApi/{id}','ApiController@eventApi')->name('api.test')->middleware('auth:api');

Route::get('/{carrier}/{origin}/{destination}','ApiController@AllExpecifict')->middleware('auth:api');
Route::get('/{carrier}','ApiController@ForCarrier')->name('for.carrier')->middleware('auth:api');



//https://scotch.io/@neo/getting-started-with-laravel-passport