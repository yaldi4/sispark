<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::get('/', function()
//{
//	return View::make('hello');
//});

Route::resource('admin/user', 'UserController');
Route::resource('admin/pengendara', 'PengendaraController');
Route::resource('admin/kendaraan', 'KendaraanController');
Route::controller('operator', 'OperatorController', ['getMasuk'=>'op.masuk']);
Route::controller('table', 'TableController', ['getUser'=>'api.user','getPengendara'=>'api.pengendara']);
Route::controller('/','HomeController',['getIndex'=>'home.index','postLogin'=>'home.login','getLogout'=>'home.logout']);
