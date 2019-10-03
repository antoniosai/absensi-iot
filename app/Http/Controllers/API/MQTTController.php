<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Absensi;

class MQTTController extends Controller
{
    public function scanRFID(Request $request)
    {

        $rf_id = $request->input('rf_id');
        $mac = $request->input('mac');

        if($mac != "cc:50:e3:70:d6:8a")
        {
            return response()->json([
                'status' => 'error',
                'message' => 'MAC anda tidak terdaftar'
            ], 200);
        }

        $user = User::where('rf_id', $rf_id)->first();

        if($user)
        {
            return $this->simpanAbsensi($rf_id);
        }
        else
        {
            return response()->json([
                'status' => 'error',
                'message' => 'RFID tidak ditemukan'
            ]);
        }

    }

    private function jadwal_absensi($role = 'siswa')
    {

        if ( $role == 'guru' )
        {
            return;
        }

        //Jam Pulang dan Jam Masuk untuk Siswa

        $jam_masuk = [
            'awal' => '06:00:00',
            'akhir' => '14:00:00'
        ];

        $jam_pulang = [
            'awal' => '14:30:00',
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

    }

    protected function simpanAbsensi($rf_id)
    {

        $set_jam = $this->jadwal_absensi();

        if($set_jam == 'gagal')
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Anda telat'
            ]);
        }

        // Check jika user sudah melakukan absensi
        $user = User::where('rf_id', $rf_id)->first();

        Absensi::where('user_id', $user->id)->whereDay('created_at', date('D'))->first();

        $absensi = new Absensi;
        $absensi->user_id = $user->id;
        $absensi->jam_masuk = $set_jam;
        $absensi->jam_keluar = $set_jam;

        if($absensi->save())
        {
            return response()->json([
                'status' => 'success',
                'user' => $user,
                'message' => 'Berhasil melakukan Absensi via RFID'
            ], 200);
        }

    }

}
