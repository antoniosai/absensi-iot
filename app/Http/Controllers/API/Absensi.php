<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Absensi as Absen;

class Absensi extends Controller
{
    public function index()
    {
        $absensi = Absen::whereDate('tanggal', date('Y-m-d'))->get();

        $data = [];

        foreach($absensi as $absen)
        {
            $temp = [
                'rf_id' => $absen->user->rf_id,
                'name' => $absen->user->name,
                'department' => $absen->user->department->name,
                'jam_masuk' => $absen->jam_masuk,
                'jam_keluar' => $absen->jam_masuk,
                'keterangan' => $absen->keterangan,
                'tanggal' => $absen->created_at->format('d M Y'),
            ];

            array_push($data, $temp);

            unset($temp);
        }
        return response()->json($data, 200);
    }
}
