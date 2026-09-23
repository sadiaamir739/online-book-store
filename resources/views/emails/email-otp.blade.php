<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email verification code</title>
</head>
<body>
    <h1>Email verification</h1>
    <p>Use this code to continue signing in to {{ config('app.name') }}:</p>
    <p style="font-size: 28px; font-weight: bold; letter-spacing: 8px;">{{ $code }}</p>
    <p>This code expires in 10 minutes. If you did not request it, you can ignore this email.</p>
</body>
</html>
