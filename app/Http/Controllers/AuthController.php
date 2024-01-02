<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;


class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'city' => $request->city,
            'role' => $request->role,
            'phone' => $request->phone
        ]);

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);

        return response()->json([
            'success' => true,
            'message' => 'Selamat anda berhasil register!',
            'data' => $user
        ]);
    }

    public function login(LoginRequest $request)
    {

        $credentials = [
            'email'     => $request->email,
            'password' => $request->password,
        ];

        $user = User::where('email', $request->email)->first();

        if(Auth::attempt($credentials)) {
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil!',
                'data' => $user
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email atau password anda salah'
        ]);
    }
}
