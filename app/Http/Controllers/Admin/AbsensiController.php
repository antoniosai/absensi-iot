<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Absensi;



class AbsensiController extends Controller
{
    public function index()
    {
        $absensi = Absensi::orderBy('created_at', 'DESC')->get();
        return view('admin.absensi.index');
    }
}
