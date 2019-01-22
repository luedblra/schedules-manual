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

Route::middleware(['auth'])->prefix('Api')->group(function () {
    Route::get('/TestApi','ApiController@testApi')->name('test.api');
    Route::get('/ForceApiConsume','ApiController@ForceApiConsume')->name('force.api.consume');
});

Route::middleware(['auth'])->prefix('Schedules')->group(function () {
    Route::get('/SchedulesGoodFailed/{id}/{selector}','SchedulesController@GoodAndFailedSchedules')->name('good.failed.schedules');
    Route::get('/ScheduleDelete/{id}/{selector}','SchedulesController@eliminar')->name('schedule.delete');
    Route::get('/ShowModal/{id}/{selector}/{selectorRet}','SchedulesController@ShowModal')->name('show.modal.schedules');
    Route::get('/CreateTwo','SchedulesController@createtwo')->name('createtwo.modal.schedules');
    Route::resource('schedule','SchedulesController');
});

Route::middleware(['auth'])->prefix('PasswordGT')->group(function () {
    Route::get('/passwordGTDelete/{id}','PasswordGrantTokenController@eliminar')->name('password.delete');
    Route::get('/CreateTwoPass','PasswordGrantTokenController@createtwo')->name('createtwo.modal.password');
    Route::get('/IndexCredentialApi','PasswordGrantTokenController@credentialsapi')->name('index.credential.api');
    Route::get('/DatatableCredetialApi','PasswordGrantTokenController@credentialsapiList')->name('datatable.credential.api');
    Route::resource('passwordGT','PasswordGrantTokenController');
});

Route::get('create-passport-client', function () {
    Artisan::call('passport:client', 
        ['--password' => 1, '--name' => 'Password Grant Tokens' ]
    );
    return redirect()->route('passwordGT.index');
})->middleware(['auth'])->name('create.passport.client');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

use App\User;
use App\Http\Resources\User as UserResource;

Route::get('/user', function () {
    return new UserResource(User::find(1));
});