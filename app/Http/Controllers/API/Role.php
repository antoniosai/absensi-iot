<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Role as Model;

class Role extends Controller
{
    public function index()
    {
        return response()->json(Model::all());
    }
}
