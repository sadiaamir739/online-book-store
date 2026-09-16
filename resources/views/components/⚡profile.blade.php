<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

new class extends Component
{
    public string $name = '';
    public string $email = '';

    public function mount()
    {
        $user = Auth::user();

        $this->name = $user->name;
        $this->email = $user->email;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'email',
                'max:255',
                'unique:users,email,' . Auth::id(),
            ],
        ]);

        $user = User::find(Auth::id());

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        session()->flash('success', 'Profile updated successfully!');
    }
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile - Online Book Store</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #f5f7fa, #e8ecf1);
            min-height: 100vh;
            padding: 50px 15px;
        }

        .profile-card {
            width: 100%;
            max-width: 550px;
            margin: auto;
            background: white;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
            overflow: hidden;
        }

        .profile-header {
            background: #111;
            color: white;
            text-align: center;
            padding: 35px 20px;
        }

        .avatar {
            width: 85px;
            height: 85px;
            margin: 0 auto 15px;
            border-radius: 50%;
            background: white;
            color: #111;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
        }

        .profile-header h1 {
            margin: 0;
            font-size: 28px;
        }

        .profile-header p {
            margin: 8px 0 0;
            color: #ccc;
        }

        .profile-body {
            padding: 35px;
        }

        .success {
            background: #e8f7e8;
            color: #15803d;
            padding: 12px 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            text-align: center;
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

        .update-btn {
            width: 100%;
            padding: 14px;
            border: none;
            border-radius: 9px;
            background: #111;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
        }

        .update-btn:hover {
            background: #333;
        }

        .back-home {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #666;
            text-decoration: none;
        }

        .back-home:hover {
            color: #111;
        }
    </style>
</head>

<body>

    <div class="profile-card">

        <div class="profile-header">

            <div class="avatar">
                👤
            </div>

            <h1>My Profile</h1>

            <p>Manage your account information</p>

        </div>


        <div class="profile-body">

            @if (session('success'))
                <div class="success">
                    ✓ {{ session('success') }}
                </div>
            @endif


            <form wire:submit="updateProfile">

                <!-- Name -->
                <div class="form-group">

                    <label for="name">
                        Full Name
                    </label>

                    <input
                        id="name"
                        type="text"
                        wire:model="name"
                        placeholder="Enter your name"
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
                    >

                    @error('email')
                        <span class="error">{{ $message }}</span>
                    @enderror

                </div>


                <button type="submit" class="update-btn">
                    💾 Update Profile
                </button>

            </form>


            <a href="{{ url('/') }}" class="back-home">
                ← Back to Home
            </a>

        </div>

    </div>

</body>

</html>