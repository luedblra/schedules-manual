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

Route::get('/', function () {
   return view('welcome');
});

Route::get('verify/{token}', 'Auth\RegisterController@verifyUser');

Route::middleware(['auth'])->prefix('Harbors')->group(function () {
   Route::resource('UploadFile','FileHarborsPortsController');
   Route::get('/loadViewAdd','FileHarborsPortsController@loadviewAdd')->name('load.View.Add');
   Route::get('/destroyharbor/{id}','FileHarborsPortsController@destroyharbor')->name('destroy.harbor');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
