<?php

namespace App\Http\Controllers;

use App\Mail\EmailOtpMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmailVerificationController extends Controller
{
    public function show(Request $request)
    {
        if (! $request->session()->has('otp.email')) {
            return redirect()->route('login');
        }

        return view('auth.verify-otp', [
            'email' => $request->session()->get('otp.email'),
        ]);
    }

    public function verify(Request $request)
    {
        $validated = $request->validate([
            'code' => ['required', 'digits:6'],
        ]);

        $email = $request->session()->get('otp.email');
        $purpose = $request->session()->get('otp.purpose');

        if (! $email || ! $purpose) {
            return redirect()->route('login')->withErrors([
                'code' => 'Your verification session has expired. Please try again.',
            ]);
        }

        $otp = \DB::table('email_verification_codes')
            ->where('email', $email)
            ->where('purpose', $purpose)
            ->latest('created_at')
            ->first();

        if (! $otp || now()->greaterThan($otp->expires_at)) {
            return back()->withErrors(['code' => 'This code has expired. Please request a new one.']);
        }

        if ($otp->attempts >= 5) {
            return back()->withErrors(['code' => 'Too many incorrect attempts. Please request a new code.']);
        }

        if (! Hash::check($validated['code'], $otp->code_hash)) {
            \DB::table('email_verification_codes')->where('id', $otp->id)->increment('attempts');

            return back()->withErrors(['code' => 'The verification code is incorrect.']);
        }

        $user = User::where('email', $email)->firstOrFail();
        $user->forceFill(['email_verified_at' => now()])->save();

        \DB::table('email_verification_codes')->where('id', $otp->id)->delete();

        $remember = $request->session()->pull('otp.remember', false);
        $request->session()->forget(['otp.email', 'otp.purpose']);

        Auth::login($user, $remember);
        $request->session()->regenerate();

        return $user->is_admin
            ? redirect()->route('admin.dashboard')
            : redirect()->route('home');
    }

    public function resend(Request $request)
    {
        $email = $request->session()->get('otp.email');
        $purpose = $request->session()->get('otp.purpose');

        if (! $email || ! $purpose) {
            return redirect()->route('login');
        }

        $this->sendCode($email, $purpose);

        return back()->with('status', 'A new verification code has been sent.');
    }

    public static function sendCode(string $email, string $purpose): void
    {
        $code = (string) random_int(100000, 999999);

        \DB::table('email_verification_codes')
            ->where('email', $email)
            ->where('purpose', $purpose)
            ->delete();

        \DB::table('email_verification_codes')->insert([
            'email' => $email,
            'purpose' => $purpose,
            'code_hash' => Hash::make($code),
            'expires_at' => now()->addMinutes(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Mail::to($email)->send(new EmailOtpMail($code));
    }
}
