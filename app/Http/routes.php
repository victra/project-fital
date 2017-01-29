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

Route::group(['middleware' => 'auth'], function () {

    // Route::auth();

    Route::get('/home', 'HomeController@index');

    
    //Route::get('insert', 'SiswaController@index');
    // Route::get('/edit&{nis}', 'SiswaController@editsiswa');
    // Route::get('show', 'SiswaController@show');

    // siswa
    Route::get('/checkNIS', 'SiswaController@checkNISAvailability');
    Route::post('storesiswa', 'SiswaController@storesiswa');    
    Route::get('siswa', 'SiswaController@showsiswa');
    Route::get('/delete&{nis}', 'SiswaController@deletesiswa');    
    Route::post('/update&{nis}', 'SiswaController@updatesiswa');
    
    //guru piket
    Route::get('/checkNIP', 'GuruController@checkNIPAvailability');
    Route::get('/checkUsername', 'GuruController@checkUsernameAvailability');
    Route::post('storeguru', 'GuruController@storeguru');
    Route::get('guru_piket', 'GuruController@showguru');   
    Route::get('/deleteguru&{nip}', 'GuruController@deleteguru');
    Route::post('/updateguru&{nip}', 'GuruController@updateguru');

    //absensi siswa
    Route::get('absensisiswa', 'AbsensiController@showabsensi');    
    Route::post('store', 'AbsensiController@storeabsensi');
});
