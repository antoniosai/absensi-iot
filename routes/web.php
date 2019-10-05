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

Route::get('test2', function () {

    $user = App\User::where('rf_id', '0xb9 0x78 0xbf 0x6e')->first();


    return $absensi = App\Absensi::where('user_id', $user->id)
    ->whereDate('tanggal', '2019-10-04')
    ->whereNotNull('jam_masuk')
    ->first();
});
