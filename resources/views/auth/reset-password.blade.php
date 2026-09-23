<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | Online Book Store</title>
</head>
<body>
    <h1>Reset your password</h1>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" value="{{ old('email', $email) }}" required autofocus>

        <label for="password">New Password</label>
        <input type="password" id="password" name="password" required>

        <label for="password_confirmation">Confirm New Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>

        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
