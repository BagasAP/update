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
    return view('pages.dashboard');
});

Auth::routes();
Route::resource('kejuruan','KejuruanController');
Route::resource('subkejuruan','SubKejuruanController');
Route::resource('program','ProgramController');
Route::resource('peserta','PesertaController');

Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Master System
Route::get('/master/system/getdata', 'SystemMasterController@getdata');
Route::resource('/master/system', 'SystemMasterController');

// Language
Route::get('/language/{lang}', 'LanguageController@setLanguage');

// Menus
Route::get('/setting/menu/get_data', 'MenuController@getData');
Route::resource('/setting/menu', 'MenuController');