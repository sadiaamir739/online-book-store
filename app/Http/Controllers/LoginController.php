<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->merge([
            'email' => strtolower(trim($request->input('email', ''))),
        ]);

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::validate($credentials)) {
            $request->session()->put([
                'otp.email' => $credentials['email'],
                'otp.purpose' => 'login',
                'otp.remember' => $request->boolean('remember'),
            ]);

            EmailVerificationController::sendCode($credentials['email'], 'login');

            return redirect()->route('otp.show')->with('status', 'A verification code has been sent to your email.');
        }

        return back()->withErrors([
            'email' => 'The provided email or password is incorrect.',
        ])->onlyInput('email');
    }
}