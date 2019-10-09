<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Info;

class InfoController extends Controller
{
    public function index()
    {
        return view('admin.info.index');
    }

    public function save(Request $request)
    {
        $info = Info::first();

        if($info->save())
        {
            return response()->json([
                ''
            ]);
        }
    }

    public function data()
    {
        return response()->json(Info::first(), 200);
    }
}
