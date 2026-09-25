<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email | Online Book Store</title>
    <style>
        * { box-sizing: border-box; }
        body {
            min-height: 100vh;
            margin: 0;
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #17243d, #304e78);
        }
        .card {
            width: 100%;
            max-width: 430px;
            padding: 40px;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, .25);
        }
        h1 { margin: 0 0 10px; color: #17243d; text-align: center; }
        p { color: #666; line-height: 1.5; text-align: center; }
        .email { color: #17243d; font-weight: 700; word-break: break-word; }
        .code {
            width: 100%;
            margin: 18px 0;
            padding: 14px;
            border: 1px solid #d9dce3;
            border-radius: 10px;
            font-size: 24px;
            letter-spacing: 8px;
            text-align: center;
        }
        .button {
            width: 100%;
            padding: 14px;
            border: 0;
            border-radius: 10px;
            background: #17243d;
            color: #fff;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
        }
        .resend { margin-top: 18px; }
        .resend button { background: transparent; color: #8b671e; border: 0; cursor: pointer; font-weight: 600; }
        .error, .status { margin-bottom: 16px; padding: 10px 12px; border-radius: 8px; font-size: 14px; }
        .error { background: #fce8e8; color: #b42318; }
        .status { background: #e9f7ef; color: #17663a; }
        @media (max-width: 500px) { .card { padding: 30px 22px; } }
    </style>
</head>
<body>
    <main class="card">
        <h1>Verify your email</h1>
        <p>Enter the 6-digit code sent to <span class="email">{{ $email }}</span>.</p>
        
        @if ($errors->any())
            <div class="error">
                @foreach ($errors->all() as $error)
                    <div>{{ $error }}</div>
                @endforeach
            </div>
        @endif

        @if (session('status'))
            <div class="status">{{ session('status') }}</div>
        @endif

        <form method="POST" action="{{ route('otp.verify') }}">
            @csrf
            <label for="code">Verification code</label>
            <input class="code" id="code" name="code" inputmode="numeric" autocomplete="one-time-code" maxlength="6" required autofocus>
            <button class="button" type="submit">Verify email</button>
        </form>

        <form class="resend" method="POST" action="{{ route('otp.resend') }}">
            @csrf
            <p>Didn't receive the code?</p>
            <button type="submit">Send a new code</button>
        </form>
    </main>
</body>
</html>
