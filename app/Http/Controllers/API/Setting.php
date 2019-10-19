<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting as Model;

class Setting extends Controller
{
    public function index()
    {
        return view('admin.model.index');
    }

    public function data()
    {
        $model = Model::first();

        return response()->json($model, 200);
    }

    public function save(Request $request)
    {
        $model = Model::first();

        if(!$model)
        {
            $model = new Model;
        }
        $model->mac_address = $request->input('mac_address');
        $model->batas_awal_jam_masuk = $request->input('batas_awal_jam_masuk');
        $model->batas_akhir_jam_masuk = $request->input('batas_akhir_jam_masuk');
        $model->batas_awal_jam_keluar = $request->input('batas_awal_jam_keluar');
        $model->batas_akhir_jam_keluar = $request->input('batas_akhir_jam_keluar');

        if($model->save())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengupdate pengaturan'
            ]);
        }
    }
}
