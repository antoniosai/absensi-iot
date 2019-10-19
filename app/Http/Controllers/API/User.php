<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Role;

use App\User as Model;

class User extends Controller
{

    public function index()
    {
        $admin = Role::where('nama', 'admin')->first();
        return $users = Model::where('role_id', $admin->id)->get();

        $data = [];

        foreach($users as $user)
        {
            $temp = [];

            $temp = [
                'id' => $user->id,
                'name' => $user->name,
                'department' => $user->email,
                'email' => $user->email,
                'updated_at' => $user->updated_at->format('d M Y'),
                'created_at' => $user->created_at->format('d M Y'),
            ];

            array_push($data, $temp);
            unset($temp);
        }

        return response()->json($data, 200);
    }

    public function store(Request $request)
    {
        if($request->input('password') != $request->input('password_confirmation'))
        {
            return response()->json([
                'status' => 'error',
                'message' => 'Password tidak sama'
            ]);
        }

        $user = new Model;
        $user->name = $request->input('name');
        $user->rf_id = $request->input('rf_id');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->alamat = 'Garut';
        $user->tanggal_lahir = '2000-01-01';
        $user->tempat_lahir = 'Garut';
        $user->department_id = $request->input('department_id');
        $user->role_id = $request->input('role_id');

        if($user->save())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menambahkan User baru'
            ]);
        }

    }
}
