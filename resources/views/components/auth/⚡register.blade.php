<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

new class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    public function register()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($user);

        return $this->redirect('/');
    }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Create Account - Online Book Store</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #e8ecf1);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px 15px;
        }

        .register-card {
            width: 100%;
            max-width: 450px;
            background: white;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
        }

        .logo {
            text-align: center;
            font-size: 42px;
            margin-bottom: 10px;
        }

        h1 {
            text-align: center;
            margin: 0;
            color: #222;
            font-size: 30px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin: 10px 0 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input {
            width: 100%;
            padding: 14px;
            border: 1px solid #ddd;
            border-radius: 9px;
            font-size: 15px;
            outline: none;
            transition: 0.2s;
        }

        input:focus {
            border-color: #111;
            box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.06);
        }

        .error {
            display: block;
            color: #dc2626;
            font-size: 13px;
            margin-top: 6px;
        }

        .register-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 9px;
            background: #111;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.2s;
        }

        .register-btn:hover {
            background: #333;
        }

        .login-text {
            text-align: center;
            margin-top: 25px;
            color: #777;
        }

        .login-link {
            color: #111;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link:hover {
            text-decoration: underline;
        }

        .home-link {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #777;
            text-decoration: none;
            font-size: 14px;
        }

        .home-link:hover {
            color: #111;
        }
    </style>
</head>

<body>

    <div class="register-card">

        <div class="logo">📚</div>

        <h1>Create Account</h1>

        <p class="subtitle">
            Join our Online Book Store
        </p>

        <form wire:submit="register">

            <!-- Name -->
            <div class="form-group">

                <label for="name">
                    Full Name
                </label>

                <input
                    id="name"
                    type="text"
                    wire:model="name"
                    placeholder="Enter your full name"
                    autocomplete="name"
                >

                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror

            </div>


            <!-- Email -->
            <div class="form-group">

                <label for="email">
                    Email Address
                </label>

                <input
                    id="email"
                    type="email"
                    wire:model="email"
                    placeholder="Enter your email"
                    autocomplete="email"
                >

                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror

            </div>


            <!-- Password -->
            <div class="form-group">

                <label for="password">
                    Password
                </label>

                <input
                    id="password"
                    type="password"
                    wire:model="password"
                    placeholder="Create a password"
                    autocomplete="new-password"
                >

                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror

            </div>


            <!-- Confirm Password -->
            <div class="form-group">

                <label for="password_confirmation">
                    Confirm Password
                </label>

                <input
                    id="password_confirmation"
                    type="password"
                    wire:model="password_confirmation"
                    placeholder="Confirm your password"
                    autocomplete="new-password"
                >

                @error('password_confirmation')
                    <span class="error">{{ $message }}</span>
                @enderror

            </div>


            <button type="submit" class="register-btn">
                Create Account
            </button>

        </form>


        <div class="login-text">

            Already have an account?

            <a href="{{ route('login') }}" class="login-link">
                Login
            </a>

        </div>


        <a href="{{ url('/') }}" class="home-link">
            ← Back to Home
        </a>

    </div>

</body>

</html>