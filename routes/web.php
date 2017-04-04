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


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'prefix' => 'admin' ],function (){
    Route::resource('/user','UserController');
    Route::resource('/doctor','DoctorController',['only' => ['index','show','edit','update','store','destroy']]);
    Route::resource('/patient','PatientController',['only' => ['index','show','edit','update','store','destroy']]);
    Route::resource('/register','PatientRegisterController',['only' => ['index','show','destroy']]);
    Route::resource('/records','PatientRecordController',['only' => ['index','show','destroy']]);
    Route::resource('/specialist','SpecialistController');

    Route::get('/doctor/create/{user}','DoctorController@create')->name('doctor.create');
    Route::post('/doctor/store/{user}','DoctorController@store')->name('doctor.store');
    Route::get('/patient/create/{user}','PatientController@create')->name('patient.create');
    Route::post('/patient/create/{user}','PatientController@store')->name('patient.store');
});