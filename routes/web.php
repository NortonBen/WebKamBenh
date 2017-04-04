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

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['namespace' => 'Admin', 'as' => 'admin.', 'prefix' => 'admin' ],function (){
    Route::resource('/user','UserController');
    Route::resource('/doctor','DoctorController',['only' => ['index','show','update','store','destroy']]);
    Route::resource('/patient','PatientController',['only' => ['index','show','update','store','destroy']]);
    Route::resource('/register','PatientRegisterController',['only' => ['index','show','destroy']]);
    Route::resource('/records','PatientRecordController',['only' => ['index','show','destroy']]);
});