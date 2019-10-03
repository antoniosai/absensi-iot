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
    $jam_masuk = [
        'awal' => '06:00:00',
        'akhir' => '07:45:00'
    ];

    $jam_pulang = [
        'awal' => '14:00:00',
        'akhir' => '17:00:00'
    ];
    $now = date('H:i:s');
    $sekarang = strtotime($now);

    if( strtotime($jam_masuk['awal']) <= $sekarang &&
        strtotime($jam_masuk['akhir']) >= $sekarang)
    {
        return $now;
    }

    if( strtotime($jam_pulang['awal']) <= $sekarang &&
        strtotime($jam_pulang['akhir']) >= $sekarang)
    {
        return $now;
    }

    return 'gagal';

});
