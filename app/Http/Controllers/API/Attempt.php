<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ScanAttempt;
use App\User;

use Carbon\Carbon;

class Attempt extends Controller
{
    public function index()
    {

        $attempts = ScanAttempt::orderBy('created_at', 'DESC')->take(10)->get();

        $data = [];

        foreach($attempts as $attempt)
        {
            $checkRfid = $this->checkIfRegistered($attempt->rf_id);

            $temp = [
                'mac_origin' => $attempt->mac_origin,
                'rf_id' => $attempt->rf_id,
                'created_at' => Carbon::parse($attempt->created_at)->diffForHumans().'<br>'.Carbon::parse($attempt->created_at)->format('d M Y H:i:s'),
                'status' => $checkRfid['status'],
                'message' => $checkRfid['message'],
            ];

            array_push($data, $temp);

            unset($temp);
        }

        return response()->json($data, 200);
    }

    private function checkIfRegistered($rf_id)
    {
        $user = User::where('rf_id', $rf_id)->first();

        $data = [];

        if($user)
        {
            $message = "";
            if($user->role->nama == 'siswa')
            {
                $message = 'Terdaftar a/n ' . $user->name . '<br>sebagai ' . $user->role->nama . ' di kelas ' . $user->department->name;
            }

            return $data = [
                'message' => $message,
                'status' => 'registered'
            ];
        }
        else
        {
            return $data = [
                'message' => 'Tidak Terdaftar',
                'status' => 'notregistered'
            ];
        }

    }
}
