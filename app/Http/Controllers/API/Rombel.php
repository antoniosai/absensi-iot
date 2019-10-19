<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Info;


use App\Models\Rombel as Model;

class Rombel extends Controller
{
    private $tahun_ajaran;
    private $semester;

    public function __construct()
    {
        $info = Info::first();

        $this->tahun_ajaran = $info->tahun_ajaran;
        $this->semester = $info->semester;
    }

    public function index()
    {
        $whereClause = [
            ['tahun_ajaran', '=', $this->tahun_ajaran],
            ['semester', '=', $this->semester],
        ];

        $list_rombel = Model::where($whereClause)->get();

        $data = [];

        foreach($list_rombel as $rombel)
        {
            $temp = [
                'id' => $rombel->id,
                'nama' => $rombel->nama,
                'tingkat' => $rombel->tingkat,
                'prodi' => $rombel->prodi,
                'siswa_count' => $rombel->siswa->count()
            ];

            array_push($data, $temp);
            unset($temp);
        }

        return response()->json($data, 200);
    }

    public function byProdiId($prodi_id)
    {
        $list_rombel = Model::where('prodi_id', $prodi_id)->get();

        $data = [];

        foreach($list_rombel as $rombel)
        {
            $temp = [
                'id' => $rombel->id,
                'nama' => $rombel->nama,
                'tingkat' => $rombel->slug,
                'prodi' => $rombel->prodi
            ];

            array_push($data, $temp);
            unset($temp);
        }

        return response()->json($data, 200);
    }

    public function search($search_query)
    {
        $list_rombel = Model::where('nama', 'LIKE', '%'.$search_query.'%')->get();

        $data = [];

        foreach($list_rombel as $rombel)
        {
            $temp = [
                'id' => $rombel->id,
                'nama' => $rombel->nama,
                'tingkat' => $rombel->slug,
                'prodi' => $rombel->prodi
            ];

            array_push($data, $temp);
            unset($temp);
        }

        return response()->json($data, 200);
    }

    public function filter(Request $request)
    {
        $whereClause = [];

        if($request->input('tingkat'))
        {
            array_push($whereClause, ['tingkat', '=', $request->input('tingkat')]);
        }
        if($request->input('prodi_id'))
        {
            array_push($whereClause, ['prodi_id', '=', $request->input('prodi_id')]);
        }
        if($request->input('search_query'))
        {
            array_push($whereClause, ['nama', 'LIKE', '%'.$request->input('search_query').'%']);
        }

        $rombel = Model::where($whereClause);

        $data = [];

        foreach($rombel->get() as $rombel)
        {
            $temp = [
                'id' => $rombel->id,
                'nama' => $rombel->nama,
                'tingkat' => $rombel->slug,
                'prodi' => $rombel->prodi
            ];

            array_push($data, $temp);
            unset($temp);
        }

        return response()->json($data, 200);
    }

    public function detail($id)
    {
        $list_rombel = Model::find($id);

        $data = [
            'id' => $list_rombel->id,
            'nama' => $list_rombel->nama,
            'tingkat' => $list_rombel->slug,
            'prodi' => $list_rombel->prodi
        ];

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        // Check if Rombel It's Exist
        $whereClause = [
            ['tahun_ajaran', '=', $this->tahun_ajaran],
            ['semester', '=', $this->semester],
            ['tingkat', '=', $request->input('tingkat')],
            ['prodi_id', '=', $request->input('prodi_id')],
            ['nama', '=', $request->input('nama')],
            ['tingkat', '=', $request->input('tingkat')],
        ];

        $list_rombel = Model::where($whereClause)->first();

        if($list_rombel)
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menambahkan Rombel karena sudah ada'
            ]);
        }


        // Start add new Rombel
        $rombel = new Model;
        $rombel->tahun_ajaran = $this->tahun_ajaran;
        $rombel->semester = $this->semester;
        $rombel->nama = strtoupper($request->input('nama'));
        $rombel->tingkat = $request->input('tingkat');
        $rombel->prodi_id = $request->input('prodi_id');

        if($rombel->save())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menambahkan Rombel baru',
                'data' => $rombel
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        $rombel = Model::findOrFail($id);
        $rombel->nama = strtoupper($request->input('nama'));
        $rombel->slug = $request->input('slug');

        if($rombel->save())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil memeperbarui data Rombel',
                'data' => $rombel
            ]);
        }
    }

    public function delete($id)
    {
        $rombel = Model::findOrFail($id);

        if($rombel->delete())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menghapus Program Studi'
            ], 200);
        }
    }
}
