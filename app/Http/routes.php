<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/home', 'HomeController@index');

    //siswa
    Route::get('insert', 'SiswaController@index');
    Route::post('store', 'SiswaController@store');
    Route::get('show', 'SiswaController@show');    
    Route::get('delete&{nis}', 'SiswaController@destroy');
    Route::get('/delete&{nis}', 'SiswaController@delete');
    Route::get('/edit&{nis}', 'SiswaController@edita');
    Route::post('/update&{nis}', 'SiswaController@updatea');

});