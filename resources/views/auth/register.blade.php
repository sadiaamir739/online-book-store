<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register | Online Book Store</title>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #17243d, #304e78);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .register-container {
            width: 100%;
            max-width: 430px;
        }

        .register-card {
            background: #ffffff;
            border-radius: 18px;
            padding: 40px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.25);
        }

        .logo {
            width: 70px;
            height: 70px;
            margin: 0 auto 18px;
            border-radius: 50%;
            background: #17243d;
            color: #d9a943;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 34px;
        }

        h1 {
            text-align: center;
            color: #17243d;
            font-size: 28px;
            margin-bottom: 8px;
        }

        .subtitle {
            text-align: center;
            color: #777;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            color: #17243d;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .input-box {
            position: relative;
        }

        .input-box i {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #d9a943;
            font-size: 18px;
        }

        .input-box input {
            width: 100%;
            padding: 13px 14px 13px 44px;
            border: 1px solid #d9dce3;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
            transition: 0.3s;
        }

        .input-box input:focus {
            border-color: #d9a943;
            box-shadow: 0 0 0 3px rgba(217, 169, 67, 0.15);
        }

        .error {
            background: #fce8e8;
            color: #b42318;
            padding: 10px 12px;
            border-radius: 8px;
            margin-bottom: 18px;
            font-size: 14px;
        }

        .register-btn {
            width: 100%;
            border: none;
            background: #17243d;
            color: #ffffff;
            padding: 14px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 5px;
        }

        .register-btn:hover {
            background: #d9a943;
            color: #17243d;
        }

        .login-text {
            text-align: center;
            margin-top: 25px;
            color: #666;
            font-size: 14px;
        }

        .login-text a {
            color: #8b671e;
            font-weight: 600;
            text-decoration: none;
        }

        .login-text a:hover {
            text-decoration: underline;
        }

        .back-home {
            text-align: center;
            margin-top: 18px;
        }

        .back-home a {
            color: #e8edf5;
            text-decoration: none;
            font-size: 14px;
        }

        .back-home a:hover {
            color: #d9a943;
        }

        @media (max-width: 500px) {
            .register-card {
                padding: 30px 22px;
            }
        }
    </style>
</head>

<body>

    <div class="register-container">

        <div class="register-card">

            <!-- Logo -->
            <div class="logo">
                <i class="bi bi-book-half"></i>
            </div>

            <h1>Create Account</h1>

            <p class="subtitle">
                Join our Online Book Store
            </p>

            <!-- Validation Errors -->
            @if ($errors->any())
                <div class="error">

                    @foreach ($errors->all() as $error)
                        <div>
                            <i class="bi bi-exclamation-circle"></i>
                            {{ $error }}
                        </div>
                    @endforeach

                </div>
            @endif

            <!-- Register Form -->
            <form method="POST" action="{{ route('register.submit') }}">

                @csrf

                <!-- Name -->
                <div class="form-group">

                    <label for="name">
                        Full Name
                    </label>

                    <div class="input-box">

                        <i class="bi bi-person"></i>

                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Enter your full name"
                            required
                            autofocus
                        >

                    </div>

                </div>

                <!-- Email -->
                <div class="form-group">

                    <label for="email">
                        Email Address
                    </label>

                    <div class="input-box">

                        <i class="bi bi-envelope"></i>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="Enter your email"
                            required
                        >

                    </div>

                </div>

                <!-- Password -->
                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <div class="input-box">

                        <i class="bi bi-lock"></i>

                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="Create a password"
                            required
                        >

                    </div>

                </div>

                <!-- Confirm Password -->
                <div class="form-group">

                    <label for="password_confirmation">
                        Confirm Password
                    </label>

                    <div class="input-box">

                        <i class="bi bi-shield-lock"></i>

                        <input
                            type="password"
                            id="password_confirmation"
                            name="password_confirmation"
                            placeholder="Confirm your password"
                            required
                        >

                    </div>

                </div>

                <!-- Button -->
                <button type="submit" class="register-btn">

                    <i class="bi bi-person-plus"></i>
                    Create Account

                </button>

            </form>

            <!-- Login -->
            <div class="login-text">

                Already have an account?

                <a href="{{ route('login') }}">
                    Login
                </a>

            </div>

        </div>

        <!-- Home -->
        <div class="back-home">

            <a href="{{ route('home') }}">
                <i class="bi bi-arrow-left"></i>
                Back to Home
            </a>

        </div>

    </div>

</body>

</html>