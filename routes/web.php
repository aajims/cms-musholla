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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleware'=>'auth'],function(){
    Route::get('/', function () {
        return redirect('beranda');
    });
    
    Route::get('beranda','BerandaController@index');
    
    //user
    Route::get('user', 'UserController@index');
    Route::get('user/yajra', 'UserController@yajra');
    Route::get('user/add', 'UserController@add');
    Route::post('user/store', 'UserController@store');
    Route::get('user/{id}', 'UserController@edit');
    Route::put('user/{id}', 'UserController@update');
    Route::delete('user/{id}', 'UserController@delete');

     //headline
     Route::get('headline', 'HeadlineController@index');
     Route::get('headline/yajra', 'HeadlineController@yajra');
     Route::get('headline/add', 'HeadlineController@add');
     Route::post('headline/store', 'HeadlineController@store');
     Route::get('headline/{id}', 'HeadlineController@edit');
     Route::put('headline/{id}', 'HeadlineController@update');
     Route::delete('headline/{id}', 'HeadlineController@delete');
     
     //keuangan
     Route::get('keuangan', 'KeuanganController@index');
     Route::get('keuangan/yajra', 'KeuanganController@yajra');
     Route::get('keuangan/add', 'KeuanganController@add');
     Route::post('keuangan/store', 'KeuanganController@store');
     Route::get('keuangan/{id}', 'KeuanganController@edit');
     Route::put('keuangan/{id}', 'KeuanganController@update');
     Route::delete('keuangan/{id}', 'KeuanganController@delete');
     
     //foto
    Route::get('foto','FotoController@index');
    Route::get('foto/yajra','FotoController@yajra');
    Route::get('foto/add','FotoController@add');
    Route::post('foto/store','FotoController@store');
    Route::get('foto/{id}','FotoController@edit');
    Route::put('foto/{id}','FotoController@update');
    Route::delete('foto/{id}','FotoController@delete');
    
    //video
    Route::get('video','VideoController@index');
    Route::get('video/yajra','VideoController@yajra');
    Route::get('video/add','VideoController@add');
    Route::post('video/store','VideoController@store');
    Route::get('video/{id}','VideoController@edit');
    Route::put('video/{id}','VideoController@update');
    Route::delete('video/{id}','VideoController@delete');
});

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
 });
