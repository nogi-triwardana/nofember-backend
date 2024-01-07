<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Validation\Validator;
use Mail;
use Hash;
use Carbon\Carbon;
use DB;
use App\Mail\forgotPasswordMail;
use Illuminate\Support\Str;
use Illuminate\Http\JsonResponse;

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
        ], JsonResponse::HTTP_BAD_REQUEST);
    }

    public function forgotPassword(ForgotPasswordRequest $request) 
    {
        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::to($request->email)->send(new forgotPasswordMail($request->email));

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Verifikasi reset password telah dikirim ke email anda'
        ]);
    }

    public function resetPassword(ResetPasswordRequest $request)
    {
        $updatePassword = DB::table('password_reset_tokens')->where([ 
            'email' => $request->email,
            'token' => $request->token
        ])->first();

        if(!$updatePassword) {
            return response()->json([
                'code' => 400,
                'status' => false,
                'message' => 'invalid token!'
            ], JsonResponse::HTTP_BAD_REQUEST);
        }

        $user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);

        DB::table('password_reset_tokens')->where([ 'email' => $request->email])->delete();

        return response()->json([
            'code' => 200,
            'status' => true,
            'message' => 'Password anda telah direset!'
        ]);
    }
}
