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

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['auth', 'checkRole:kasir']], function(){
      Route::get('/kasir','KasirController@index')->name('kasir');
});


Route::group(['middleware' => ['auth', 'checkRole:manajer']], function(){
      Route::get('/manajer','ManajerController@index')->name('manajer');
      Route::get('/karyawan','KaryawanController@index')->name('karyawan');
      Route::post('/karyawan/store','KaryawanController@store');
      Route::patch('/karyawan/{id}/update','KaryawanController@update');
      Route::get('/karyawan/{id}/delete','KaryawanController@destroy');
      Route::post('/menu/store','MenuController@store');
});
Route::get('/menu','MenuController@index')->name('menu');

// Route::resource('karyawan','KaryawanController');
