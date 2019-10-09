<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Setting;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }

    public function data()
    {
        $setting = Setting::first();

        return response()->json($setting, 200);
    }

    public function save(Request $request)
    {
        $setting = Setting::first();
        $setting->mac_address = $request->input('mac_address');
        $setting->batas_awal_jam_masuk = $request->input('batas_awal_jam_masuk');
        $setting->batas_akhir_jam_masuk = $request->input('batas_akhir_jam_masuk');
        $setting->batas_awal_jam_keluar = $request->input('batas_awal_jam_keluar');
        $setting->batas_akhir_jam_keluar = $request->input('batas_akhir_jam_keluar');

        if($setting->save())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengupdate pengaturan'
            ]);
        }
    }
}
