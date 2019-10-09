<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Role;

class Siswa extends Controller
{

    protected function role()
    {
        $role = Role::where('nama', 'siswa')->first();
        return $role;
    }

    public function index()
    {
        $siswa = User::where('role_id', $this->role()->id)->get();

        return response()->json([
            'count' => count($siswa),
            'status' => 'success',
            'message' => 'Successfully fetched ' . count($siswa) . ' data(s)',
            'data' => $siswa
        ], 200);
    }

    public function detail($id)
    {
    }
}
