<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Absensi;

use App\ScanAttempt;

use App\Events\AbsensiItem;

class MQTTController extends Controller
{
    public function scanRFID(Request $request)
    {

        $rf_id = $request->input('rf_id');
        $mac = $request->input('mac');

        // if($mac != "cc:50:e3:70:d6:8a")
        // {
        //     return response()->json([
        //         'status' => 'error',
        //         'message' => 'MAC anda tidak terdaftar'
        //     ], 200);
        // }

        $user = User::where('rf_id', $rf_id)->first();

        if($user)
        {
            $scan_attempt = new ScanAttempt;
            $scan_attempt->rf_id = $rf_id;
            $scan_attempt->mac_origin = $mac;

            if($scan_attempt->save())
            {
                return $this->simpanAbsensi($rf_id);
            }
        }
        else
        {
            $scan_attempt = new ScanAttempt;
            $scan_attempt->rf_id = $rf_id;
            $scan_attempt->mac_origin = $mac;

            if($scan_attempt->save())
            {
                event(new AbsensiItem('done'));

                return response()->json([
                    'status' => 'error',
                    'message' => 'RFID tidak ditemukan',
                    'rf_id' => $rf_id,
                    'mac_origin' => $mac
                ]);
            }

        }

    }

    /*
    Method untuk menentukan waktu ketika pada saat scan RFID, apakah itu jam masuk atau jam pulang
    */
    private function jadwal_absensi($role = 'siswa')
    {
        $now = date('H:i:s');
        $data = [
            'message' => null,
            'status' => null,
            'jam_masuk' => null,
            'jam_keluar' => null
        ];

        // Statement untuk membypass user yg memiliki Role guru

        //Inisiasi Data Jam Masuk dan Jam Pulang untuk Siswa
        $jam_masuk = [
            'awal' => '01:00:00',
            'akhir' => '04:00:00'
        ];

        $jam_keluar = [
            'awal' => '05:00:00',
            'akhir' => '07:00:00'
        ];


        $sekarang = strtotime($now);

        // Statement Menentukan Jam Masuk
        if( strtotime($jam_masuk['awal']) <= $sekarang && strtotime($jam_masuk['akhir']) >= $sekarang )
        {
            $data['status'] = 'jam_masuk';
            $data['jam_masuk'] = $now;
            // return $now;
        }



        // Jika terlambat
        if( strtotime($jam_masuk['akhir']) <= $sekarang && strtotime($jam_keluar['awal']) >= $sekarang )
        {
            $data['status'] = 'terlambat';
            $data['message'] = 'Anda terlambat';
            // return $now;
        }

        // Statement menentukan jam pulang
        if( strtotime($jam_keluar['awal']) <= $sekarang && strtotime($jam_keluar['akhir']) >= $sekarang)
        {
            $data['status'] = 'jam_keluar';
            $data['jam_keluar'] = $now;
        }

        return $data;
    }

    protected function simpanAbsensi($rf_id)
    {
        $set_jam = $this->jadwal_absensi();

        if($set_jam['status'] == 'terlambat')
        {
            event(new AbsensiItem('late'));
            return response()->json([
                'status' => 'error',
                'message' => 'Anda Terlambat'
            ]);
        }

        // Mencari Data User berdasarkan RFID
        $user = User::where('rf_id', $rf_id)->first();

        // Jika jam nya adalah jam masuk
        if($set_jam['status'] == 'jam_masuk')
        {
            // Mencari Data absensi apakah siswa bersangkutan telah melakukan absensi pada 5 menit sebelum nya
            $absensi = Absensi::where('user_id', $user->id)
            ->whereDate('tanggal', date('Y-m-d'))
            ->whereNotNull('jam_masuk') //Jika attr jam_masuk tidak kosong
            ->first();

            // IF statement jika Siswa telah melakukan absensi
            if($absensi)
            {
                // return $absensi;
                return response()->json([
                    'status' => 'success',
                    'message' => $user->name . '  sudah melakukan absensi'
                ]);
            }
            else
            {
                $absensi = new Absensi;
                $absensi->user_id = $user->id;
                $absensi->tanggal = date('Y-m-d');
                $absensi->jam_masuk = $set_jam['jam_masuk'];

                if($absensi->save())
                {
                    event(new AbsensiItem('success'));

                    return response()->json([
                        'status' => 'success',
                        'user' => $user,
                        'message' => $user->name . ' Berhasils melakukan Absensi via RFID'
                    ], 200);
                }
            }

        }

        // Jika jam nya adalah jam keluar
        if($set_jam['status'] == 'jam_keluar')
        {
            // Mencari siswa apakah telah menscan pada jam masuk
            $absensi = Absensi::where('user_id', $user->id)
            ->whereDate('tanggal', date('Y-m-d'))
            ->whereNotNull('jam_masuk') //Jika attr jam_masuk tidak kosong
            ->first();

            // IF statement jika Siswa telah melakukan absensi
            if(!$absensi)
            {
                return response()->json([
                    'status' => 'error',
                    'user' => $user,
                    'message' => $user->name . ' Siswa tidak melakukan absensi pada jam masuk'
                ]);
            }
            else
            {
                $absensi->tanggal = date('Y-m-d');
                $absensi->jam_keluar = $set_jam['jam_keluar'];
                $absensi->keterangan = 'hadir';
                if($absensi->save())
                {
                    event(new AbsensiItem('done'));

                    return response()->json([
                        'status' => 'success',
                        'user' => $user,
                        'message' => $user->name . ' Berhasil melakukan Absensi jam keluar'
                    ], 200);
                }
            }

        }

    }

}
