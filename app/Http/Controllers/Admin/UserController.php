<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.user.index', [
            'users' => $users
        ]);
    }

    public function data()
    {

        $users = User::all();

        foreach($users as $user)
        {
            $temp = [
                'name' => $user->name,
                'rf_id' => $user->rf_id,
                'mac' => $user->mac,
                'email' => $user->email,
                'role' => $user->role->name/p,
                'rf_id' => $user->rf_id,
            ];


        }

        return response()->json(User::all(), 200);
    }

    public function detail($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.detail', [
            'user' => $user
        ]);
    }

    public function add()
    {
        return view('admin.user.add');
    }

    public function save(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->rf_id = $request->input('rf_id');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        if($user->save())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengupdate data'
            ]);
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.user.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->rf_id = $request->input('rf_id');
        $user->email = $request->input('email');


        if($user->save())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengupdate data'
            ]);
        }
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);

        if($user->save())
        {
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menghapus data'
            ]);
        }
    }
}
