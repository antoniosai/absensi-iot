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


Route::get('test', function(){
    //Jam Pulang dan Jam Masuk untuk Siswa
    $data = [
        'message' => null,
        'status' => null,
        'jam_masuk' => null,
        'jam_pulang' => null
    ];

    $jam_masuk = [
        'awal' => '17:00:00',
        'akhir' => '18:45:00'
    ];

    $jam_pulang = [
        'awal' => '19:00:00',
        'akhir' => '20:00:00'
    ];

    $now = date('H:i:s');

    $sekarang = strtotime($now);

    if( strtotime($jam_masuk['awal']) <= $sekarang && strtotime($jam_masuk['akhir']) >= $sekarang )
    {
        $data['status'] = 'success';
        $data['jam_masuk'] = $now;
    }

    if( strtotime($jam_pulang['awal']) <= $sekarang && strtotime($jam_pulang['akhir']) >= $sekarang )
    {
        $data['status'] = 'success';
        $data['jam_pulang'] = $now;
    }

    return $data;

});

Route::get('/test_pusher', function(){

    $absensi = App\Absensi::first();
    event(new App\Events\AbsensiItem($absensi));

    return view('test_pusher');
});

Route::group(['prefix' => 'absensi', 'middleware' => [], 'namespace' => 'Admin'], function () {

    Route::get('/', function(){
        return view('admin.dashboard.index');
    })->name('admin.dashboard');

    Route::group(['prefix' => 'user'], function () {
        Route::get('/', 'UserController@index')->name('admin.user');
        Route::get('/detail/{id}', 'UserController@detail')->name('admin.user.detail');
        Route::get('/add', 'UserController@add')->name('admin.user.add');
        Route::post('/save', 'UserController@save')->name('admin.user.save');
        Route::get('/edit/{id}', 'UserController@ediy')->name('admin.user.edit');
        Route::put('/update/{id}', 'UserController@update')->name('admin.user.update');
        Route::delete('/delete/{id}', 'UserController@index')->name('admin.user.delete');
    });

    Route::group(['prefix' => 'absensi'], function () {
        Route::get('/', 'AbsensiController@index')->name('admin.absensi');
    });

    Route::group(['prefix' => 'scan_attempts'], function(){
        Route::get('/', 'AttemptController@index')->name('admin.attempt');
    });
});

Route::group(['prefix' => 'api_v1', 'middleware' => [], 'namespace' => 'API'], function () {

    Route::group(['prefix' => 'kelas'], function(){
        Route::get('/', 'Department@index')->name('admin.api.department');
        Route::get('/{id}', 'Department@detail');
        Route::post('/', 'Department@store');
        Route::put('/{id}', 'Department@update');
        Route::delete('/{id}', 'Department@delete');
    });

    Route::get('/attempt', 'Attempt@index');

    Route::group(['prefix' => 'user'], function(){
        Route::get('/', 'User@index')->name('admin.api.user');
        Route::get('/{id}', 'User@detail');
        Route::post('/', 'User@store');
        Route::put('/{id}', 'User@update');
        Route::delete('/{id}', 'User@delete');
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

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
