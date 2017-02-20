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

    // Route::get('/home', 'HomeController@index');
    Route::get('/', 'HomeController@index');

    
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

    //ongoing
    Route::get('ubahpassword', 'GuruController@tampilubahpassword');
    Route::post('ubahpasswordku', 'GuruController@ubahpasswordku');
    Route::get('storeabsensi', 'AbsensiController@storeabsensi');
    Route::get('deleteabsensi', 'AbsensiController@deleteabsensi');
    Route::get('cariabsensi', 'AbsensiController@cariabsensi');
    Route::get('rekapperbulan', 'AbsensiController@rekapabsensiminggu');
    Route::get('rekappersemester', 'AbsensiController@rekapabsensisemester');

    // kelas
    Route::get('kelas', 'KelasController@showkelas');
    Route::post('storekelas', 'KelasController@storekelas');
    Route::get('/deletekelas&{id}', 'KelasController@deletekelas');    
    Route::post('/updatekelas&{id}', 'KelasController@updatekelas');
});
