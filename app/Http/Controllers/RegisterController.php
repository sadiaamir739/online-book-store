<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        $request->session()->put([
            'otp.email' => $user->email,
            'otp.purpose' => 'registration',
            'otp.remember' => false,
        ]);

        EmailVerificationController::sendCode($user->email, 'registration');

        return redirect()->route('otp.show')->with('status', 'A verification code has been sent to your email.');
    }
}