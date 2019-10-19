<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Prodi as Model;

class Prodi extends Controller
{
    public function index()
    {
        $list_prodi = Model::all();

        $data = [];

        foreach($list_prodi as $prodi)
        {
            $temp = [
                'id' => $prodi->id,
                'nama' => $prodi->nama,
                'slug' => $prodi->slug,
                'rombel_count' => count($prodi->rombel)
            ];

            array_push($data, $temp);
            unset($temp);
        }

        return response()->json($data, 200);
    }

    public function search($search_query)
    {
        $list_prodi = Model::where('slug', 'LIKE', '%'.$search_query.'%')->orWhere('nama', 'LIKE', '%'.$search_query.'%')->get();

        $data = [];

        foreach($list_prodi as $prodi)
        {
            $temp = [
                'id' => $prodi->id,
                'nama' => $prodi->nama,
                'slug' => $prodi->slug,
                'rombel_count' => count($prodi->rombel)
            ];

            array_push($data, $temp);
            unset($temp);
        }

        return response()->json($data, 200);
    }

    public function detail($id)
    {
        $list_prodi = Model::find($id);

        $data = [
            'slug' => $list_prodi->slug,
            'nama' => $list_prodi->nama,
            'rombel_count' => count($list_prodi->rombel),
            'keterangan' => $list_prodi->keterangan,
            'rombel' => $list_prodi->rombel
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {

        $prodi = new Model;
        $prodi->nama = $request->input('nama');
        $prodi->slug = $request->input('slug');

        if($prodi->save())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menambahkan Prodi baru',
                'data' => $prodi
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $prodi = Model::findOrFail($id);
        $prodi->nama = $request->input('nama');
        $prodi->slug = $request->input('slug');

        if($prodi->save())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil memeperbarui data Prodi',
                'data' => $prodi
            ]);
        }
    }

    public function delete($id)
    {
        $prodi = Model::findOrFail($id);

        if($prodi->delete())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menghapus Program Studi'
            ], 200);
        }
    }
}
