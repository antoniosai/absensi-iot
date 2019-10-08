<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ScanAttempt;

class Attempt extends Controller
{
    public function index()
    {
        $attempts = ScanAttempt::orderBy('created_at', 'DESC')->take(10)->get();

        return response()->json($attempts, 200);
    }
}
