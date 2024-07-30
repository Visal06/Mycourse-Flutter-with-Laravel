<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
        {
            $fields = $request->validate([
                'name' => 'required|string',
                'email' => 'required|string|email|unique:users,email',
                'password' => 'required|string|confirmed'
            ]);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->save();
          

            $token = $user->createToken('myapptoken')->plainTextToken;

            $data = array(
                "user" =>$user,
                "token" => $token
            );
            return response($data, 201);
        }
        public function login(Request $request)
        {
            $fields = $request->validate([

                'email' => 'required|string|email',
                'password' => 'required|string'
            ]);
            $user = User::where('email', $fields['email'])->first();
            if (!$user || !Hash::check($fields['password'], $user->password)) {
                return response([
                    'message' => 'Invalid Credentials'
                ], 401);
            }
            $token = $user->createToken('myapptoken')->plainTextToken;
            $data = array(
                "user" =>$user,
                "token" => $token
            );
        
            return response($data, 201);
        }
}
