<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;
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

    public function login(Request $request)
    {
        
    }
}
