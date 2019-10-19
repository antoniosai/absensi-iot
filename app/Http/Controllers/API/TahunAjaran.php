<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\TahunAjaran as Model;
use App\Models\Info;

class TahunAjaran extends Controller
{
    public function index()
    {
        $init_year = date('Y');

        $tahun_ajaran = [];

        for($i = 2015; $i <= $init_year; $i++)
        {
            $until = $i + 1;
            $string = $i.'/'. $until;
            array_push($tahun_ajaran, $string);
            $string = '';
        }

        $data = [
            'tahun_ajaran' => $tahun_ajaran,
            'semester' => ['1', '2']
        ];

        return response()->json($data, 200);
    }

    public function changeToActive($id)
    {
        $model = Model::all();

        foreach($model as $list)
        {
            $list->is_active = 'n';
            $list->save();
            // $list->save();
        }

        $active = Model::findOrFail($id);
        $active->is_active = 'y';
        if ($active->save())
        {
            return response()->json([
                'status' => 'Success',
                'message' => 'Berhasil mengganti tahun ajaran ke ' . $active->tahun_ajaran . ' / Semester ' . $active->semester
            ]);
        }
        // $model->is_active = $request->input('status')
    }

    public function active()
    {
        $model = Model::where('is_active', 'y')->first();

        return response()->json([
            'status' => 'success',
            'data' => $model
        ]);
    }

    public function store(Request $request)
    {
        $check = Model::where('tahun_ajaran', $request->input('tahun_ajaran'))->where('semester', $request->input('semester'))->first();
        if($check)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengupdate Tahun Ajaran karena sudah ada'
            ]);
        }
        else
        {
            $model = new Model;
            $model->tahun_ajaran = $request->input('tahun_ajaran');
            $model->semester = $request->input('semester');
            if($model->save())
            {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Berhasil mengganti Tahun Ajaran'
                ]);
            }
        }
    }

    public function update(Request $request)
    {
        $info = Info::first();

        $info->semester = $request->input('semester');
        $info->tahun_ajaran = $request->input('tahun_ajaran');

        if($info->save())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengganti Tahun Ajaran menjadi ' . $request->input('tahun_ajaran') . ' / Semester ' . $request->input('semester')
            ]);
        }


    }
}
