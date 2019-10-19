<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Department as Model;

class Department extends Controller
{
    public function index()
    {
        return response()->json(Model::all());
    }
}
