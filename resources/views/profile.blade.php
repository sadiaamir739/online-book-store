<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            color: #333;
        }

        /* NAVBAR */
        .navbar {
            background: #222;
            color: white;
            padding: 18px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 25px;
            font-weight: bold;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 6px;
        }

        .nav-links a:hover {
            background: #444;
        }

        .logout-btn {
            background: #555;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
        }

        .logout-btn:hover {
            background: #444;
        }

        /* PROFILE */
        .profile-container {
            width: 90%;
            max-width: 700px;
            margin: 60px auto;
        }

        .profile-card {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
        }

        .profile-title {
            text-align: center;
            margin-bottom: 30px;
        }

        .profile-title h1 {
            font-size: 35px;
            margin-bottom: 10px;
        }

        .profile-title p {
            color: #666;
        }

        .profile-icon {
            width: 90px;
            height: 90px;
            background: #222;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 25px;
        }

        .profile-info {
            margin-top: 25px;
        }

        .info-box {
            background: #f5f5f5;
            padding: 18px;
            border-radius: 8px;
            margin-bottom: 15px;
        }

        .info-box strong {
            display: block;
            margin-bottom: 7px;
            color: #222;
        }

        .info-box span {
            color: #666;
        }

        .back-btn {
            display: inline-block;
            margin-top: 20px;
            background: #222;
            color: white;
            text-decoration: none;
            padding: 12px 22px;
            border-radius: 6px;
            font-weight: bold;
        }

        .back-btn:hover {
            opacity: 0.85;
        }

        /* MOBILE */
        @media (max-width: 700px) {

            .navbar {
                flex-direction: column;
                gap: 15px;
                padding: 20px;
            }

            .profile-card {
                padding: 25px;
            }
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">

        <div class="logo">
            📚 Online Book Store
        </div>

        <div class="nav-links">

            <a href="{{ url('/') }}">
                Home
            </a>

            <a href="{{ route('books.index') }}">
                Books
            </a>

            <a href="{{ route('categories.index') }}">
                Categories
            </a>

            <a href="{{ route('stories.index') }}">
                Stories
            </a>

            <form
                action="{{ route('logout') }}"
                method="POST"
                style="display: inline;"
            >
                @csrf

                <button
                    type="submit"
                    class="logout-btn"
                >
                    🚪 Logout
                </button>
            </form>

        </div>

    </nav>


    <!-- PROFILE -->
    <div class="profile-container">

        <div class="profile-card">

            <div class="profile-title">

                <div class="profile-icon">
                    👤
                </div>

                <h1>
                    My Profile
                </h1>

                <p>
                    Welcome to your profile
                </p>

            </div>


            <div class="profile-info">

                <div class="info-box">

                    <strong>
                        Name
                    </strong>

                    <span>
                        {{ $user->name }}
                    </span>

                </div>


                <div class="info-box">

                    <strong>
                        Email
                    </strong>

                    <span>
                        {{ $user->email }}
                    </span>

                </div>


                <div class="info-box">

                    <strong>
                        Member Since
                    </strong>

                    <span>
                        {{ $user->created_at->format('d M Y') }}
                    </span>

                </div>

            </div>


            <a
                href="{{ url('/') }}"
                class="back-btn"
            >
                ← Back to Home
            </a>

        </div>

    </div>

</body>

</html>