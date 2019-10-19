<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

use App\User;
use Auth;

class AuthController extends Controller
{
    public $successStatus = 200;

    public function login(Request $request){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $data['token'] =  $user->createToken('nApp')->accessToken;
            $data['user'] = $user;
            return response()->json($data, $this->successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function user(Request $request)
    {
        return new UserResource($request->user);
    }
}
