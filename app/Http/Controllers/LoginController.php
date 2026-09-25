<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            $user = User::where('email', $credentials['email'])->firstOrFail();

            if ($user->email_verified_at) {
                Auth::login($user, $request->boolean('remember'));
                $request->session()->regenerate();

                return $user->is_admin
                    ? redirect()->route('admin.dashboard')
                    : redirect()->route('home');
            }

            $request->session()->put([
                'otp.email' => $credentials['email'],
                'otp.purpose' => 'login',
                'otp.remember' => $request->boolean('remember'),
            ]);

            if (! EmailVerificationController::sendCode($credentials['email'], 'login')) {
                return back()->withErrors([
                    'email' => 'We could not send a verification code. Please try again in a moment.',
                ])->onlyInput('email');
            }

            return redirect()->route('otp.show')->with('status', 'A verification code has been sent to your email.');
        }

        return back()->withErrors([
            'email' => 'The provided email or password is incorrect.',
        ])->onlyInput('email');
    }
}