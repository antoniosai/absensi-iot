<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
    // return $request->user();
// });

// Route::get('/user', 'API\AuthController@user');


Route::group(['prefix' => 'rfid', 'namespace' => 'API'], function(){
    Route::post('/scan', 'MQTTController@scanRFID');
});

Route::post('login', 'API\AuthController@login');


Route::group(['middleware' => [], 'namespace' => 'API'], function () {


    // Data Dasar
    Route::group(['prefix' => 'data_dasar'], function () {
        Route::get('/tingkat', 'DataDasar@tingkat');
    });

    Route::group(['prefix' => 'department'], function(){
        Route::get('/', 'Department@index')->name('admin.api.department');
        Route::get('/{id}', 'Department@detail');
        Route::post('/', 'Department@store');
        Route::put('/{id}', 'Department@update');
        Route::delete('/{id}', 'Department@delete');
    });

    Route::group(['prefix' => 'attempt'], function(){
        Route::get('/', 'Attempt@index');
        Route::get('/check/{rf_id}', 'Attempt@checkIfRegistered');
    });

    Route::group(['prefix' => 'user'], function(){
        Route::get('/', 'User@index')->name('admin.api.user');
        Route::get('/{id}', 'User@detail');
        Route::post('/', 'User@store');
        Route::put('/{id}', 'User@update');
        Route::delete('/{id}', 'User@delete');
    });

    Route::group(['prefix' => 'prodi'], function(){
        Route::get('/', 'Prodi@index')->name('admin.api.prodi');
        Route::get('/search/{id}', 'Prodi@search');
        Route::get('/detail/{id}', 'Prodi@detail');
        Route::post('/', 'Prodi@store');
        Route::put('/{id}', 'Prodi@update');
        Route::delete('/{id}', 'Prodi@delete');
    });

    Route::group(['prefix' => 'rombel'], function(){
        Route::get('/', 'Rombel@index')->name('admin.api.rombel');
        Route::get('/prodi/{id}', 'Rombel@byProdiId');
        Route::get('/search/{id}', 'Rombel@search');
        Route::get('/detail/{id}', 'Rombel@detail');
        Route::post('/filter', 'Rombel@filter');
        Route::post('/', 'Rombel@store');
        Route::put('/{id}', 'Rombel@update');
        Route::delete('/{id}', 'Rombel@delete');
    });

    Route::group(['prefix' => 'siswa'], function () {
        Route::get('/', 'Siswa@data');
        Route::get('/get_kelas/{id}', 'Siswa@getRombel');
    });

    Route::group(['prefix' => 'role'], function(){
        Route::get('/', 'Role@index')->name('admin.api.role');
        Route::get('/{id}', 'Role@detail');
        Route::post('/', 'Role@store');
        Route::put('/{id}', 'Role@update');
        Route::delete('/{id}', 'Role@delete');
    });

    Route::group(['prefix' => 'absensi'], function(){
        Route::get('/', 'Absensi@index')->name('admin.api.absensi');
        Route::get('/{id}', 'Absensi@detail');
        Route::post('/', 'Absensi@store');
        Route::put('/{id}', 'Absensi@update');
        Route::delete('/{id}', 'Absensi@delete');
    });

    Route::group(['prefix' => 'setting'], function(){
        Route::get('/data', 'Setting@data');
        Route::post('/save', 'Setting@save');
    });

    Route::group(['prefix' => 'tahun_ajaran'], function(){
        Route::get('/', 'TahunAjaran@index');
        Route::post('/update/{id}', 'TahunAjaran@changeToActive');
        Route::get('/active', 'TahunAjaran@active');
        Route::post('/update', 'TahunAjaran@update');
    });

    Route::group(['prefix' => 'info'], function(){
        Route::get('/data', 'Info@data');
        Route::post('/save', 'Info@save');
        Route::post('/save_logo', 'Info@saveLogo');
    });

});
