<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $inputs = $request->only('name', 'email', 'password');
        $inputs['password'] = bcrypt($inputs['password']);
        $credentials = $request->only('email', 'password');

        $user = User::create($inputs);

        if (!$token = JWTAuth::attempt($credentials)) {
            return response([
                'message' => 'login fail',
                'user' => new UserResource($user),
                'token' => null
            ], 401);
        }

        return response()->json(['user' => new UserResource($user), 'token' => $token]);
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        if (!$token = JWTAuth::attempt($credentials)) {
            return response([
                'status' => 'error',
                'error' => 'invalid.credentials',
                'msg' => 'Invalid Credentials.'
            ], 401);
        }

        $user = Auth::user();

        return response([
            'token' => $token,
            'user' => $user
        ]);
    }

    public function logout()
    {
        JWTAuth::invalidate();
        return response([
            'status' => 'success',
            'msg' => 'Logged out Successfully.'
        ], 200);
    }

    public function refresh()
    {
        return response([
            'status' => 'success'
        ]);
    }

    public function profile()
    {
        return response()->json(['user']);
    }
}
