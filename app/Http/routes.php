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

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'web'], function () {

    Route::auth();

    Route::get('/home', 'HomeController@index');

    
    //Route::get('insert', 'SiswaController@index');
    // Route::get('/edit&{nis}', 'SiswaController@editsiswa');
    // Route::get('show', 'SiswaController@show');

    // siswa
    Route::post('storesiswa', 'SiswaController@storesiswa');    
    Route::get('siswa', 'SiswaController@showsiswa');
    Route::get('/delete&{nis}', 'SiswaController@deletesiswa');    
    Route::post('/update&{nis}', 'SiswaController@updatesiswa');
    
    //guru piket
    Route::post('storeguru', 'GuruController@storeguru');
    Route::get('guru_piket', 'GuruController@showguru');
    Route::get('/deleteguru&{nip}', 'GuruController@deleteguru');
    Route::post('/updateguru&{nip}', 'GuruController@updateguru');

    //absensi siswa
    Route::get('absensisiswa', 'AbsensiController@showabsensi');    

});
