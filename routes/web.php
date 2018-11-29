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

Route::get('/guia', function () {
   return view('guia');
});


Route::get('verify/{token}', 'Auth\RegisterController@verifyUser');

Route::middleware(['auth'])->prefix('Harbors')->group(function () {
   Route::resource('UploadFile','FileHarborsPortsController');
   Route::get('/loadViewAdd','FileHarborsPortsController@loadviewAdd')->name('load.View.Add');
   Route::get('/destroyharbor/{id}','FileHarborsPortsController@destroyharbor')->name('destroy.harbor');
});

Route::middleware(['auth'])->prefix('Importation')->group(function () {
   Route::resource('importation','ImportationController');
   Route::put('/Upload-Schedules','ImportationController@uploadSchedules')->name('upload.schedules');
});


Route::middleware(['auth'])->prefix('AcountS')->group(function () {
   Route::get('/AccountDelete/{id}','AccountSchedulesController@eliminar')->name('account.delete');
   Route::resource('AcountS','AccountSchedulesController');
});

Route::middleware(['auth'])->prefix('Schedules')->group(function () {
   Route::get('/SchedulesGoodFailed/{id}/{selector}','SchedulesController@GoodAndFailedSchedules')->name('good.failed.schedules');
   Route::get('/ScheduleDelete/{id}/{selector}','SchedulesController@eliminar')->name('schedule.delete');
   Route::get('/ShowModal/{id}/{selector}/{selectorRet}','SchedulesController@ShowModal')->name('show.modal.schedules');
   Route::get('/CreateTwo','SchedulesController@createtwo')->name('createtwo.modal.schedules');
   Route::resource('schedule','SchedulesController');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

