<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Info as Model;

class Info extends Controller
{
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

        $model->nama = $request->input('nama');
        $model->logo = $request->input('logo');
        $model->alamat = $request->input('alamat');
        $model->latitude = $request->input('latitude');
        $model->longitude = $request->input('longitude');
        $model->email = $request->input('email');
        $model->handphone = $request->input('handphone');
        $model->fax = $request->input('fax');
        $model->telp = $request->input('telp');
        $model->npsn = $request->input('npsn');
        $model->status = $request->input('status');
        $model->bentuk_pendidikan = $request->input('bentuk_pendidikan');
        $model->status_kepemilikan = $request->input('status_kepemilikan');
        $model->sk_pendirian_sekolah = $request->input('sk_pendirian_sekolah');
        $model->tanggal_sk_pendirian = $request->input('tanggal_sk_pendirian');
        $model->sk_izin_operasional = $request->input('sk_izin_operasional');
        $model->tanggal_sk_izin_operasional = $request->input('tanggal_sk_izin_operasional');

        if($model->save())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengupdate Informasi Sekolah'
            ], 200);
        }
    }

    public function saveLogo(Request $request)
    {

    }
}
