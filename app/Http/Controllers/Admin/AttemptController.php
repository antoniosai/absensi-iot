<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\ScanAttempt;

use App\User;

class AttemptController extends Controller
{
    public function index()
    {
        return view('admin.attempt.index', [
            'attempts' => ScanAttempt::all()
        ]);
    }


}
