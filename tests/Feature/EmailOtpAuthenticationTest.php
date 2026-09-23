<?php

namespace Tests\Feature;

use App\Mail\EmailOtpMail;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class EmailOtpAuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_registration_requires_and_accepts_email_otp(): void
    {
        Mail::fake();

        $response = $this->post(route('register.submit'), [
            'name' => 'Reader One',
            'email' => 'reader@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
        ]);

        $response->assertRedirect(route('otp.show'));
        $this->assertGuest();

        $sentCode = null;
        Mail::assertSent(EmailOtpMail::class, function (EmailOtpMail $mail) use (&$sentCode) {
            $code = DB::table('email_verification_codes')->value('code_hash');
            $sentCode = $mail->code;

            return $mail->hasTo('reader@example.com') && Hash::check($mail->code, $code);
        });

        $this->post(route('otp.verify'), ['code' => '000000'])
            ->assertSessionHasErrors('code');
        $this->assertGuest();

        $this->post(route('otp.verify'), ['code' => $sentCode])
            ->assertRedirect(route('home'));

        $this->assertAuthenticated();
        $this->assertNotNull(User::first()->email_verified_at);
    }

    public function test_login_requires_email_otp_before_authentication(): void
    {
        Mail::fake();
        $user = User::factory()->create([
            'email' => 'reader@example.com',
            'password' => 'password123',
            'email_verified_at' => now(),
        ]);

        $this->post(route('login.submit'), [
            'email' => $user->email,
            'password' => 'password123',
        ])->assertRedirect(route('otp.show'));

        $this->assertGuest();
        $sentCode = null;
        Mail::assertSent(EmailOtpMail::class, function (EmailOtpMail $mail) use (&$sentCode) {
            $sentCode = $mail->code;

            return $mail->hasTo('reader@example.com');
        });

        $this->post(route('otp.verify'), ['code' => $sentCode])
            ->assertRedirect(route('home'));

        $this->assertAuthenticatedAs($user);
    }
}
