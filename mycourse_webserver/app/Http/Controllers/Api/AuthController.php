<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apiuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:apiusers',
            // 'password' => 'required|string|min:8|confirmed',
        ]);
        $user = Apiuser::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        $u = array(
            "id" => $user->id,
            "name" => $user->name,
            "email" => $user->email
        );
        $data = array(
            "user" => $u,
            "token" => $token,
        );
        return response($data, 200);
    }
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = Apiuser::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => 'Invalid credentials',
            ], 401);
        }
        $token = $user->createToken('auth_token')->plainTextToken;
        $data = array(
            "user" => $user,
            "token" => $token,
        );
        return response($data, 200);
    }
}
