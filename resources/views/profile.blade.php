<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Profile | Online Book Store</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6fa;
            color: #17243d;
            min-height: 100vh;
        }

        /* ================= NAVBAR ================= */

        .navbar {
            background: #17243d;
            color: white;
            padding: 18px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 3px 12px rgba(23, 36, 61, 0.18);
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #d9a943;
            white-space: nowrap;
        }

        .logo i {
            margin-right: 8px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
        }

        .nav-links a {
            color: #e8edf5;
            text-decoration: none;
            padding: 10px 14px;
            border-radius: 7px;
            font-size: 14px;
            transition: 0.3s;
        }

        .nav-links a:hover {
            background: #304e78;
            color: #d9a943;
        }

        .logout-btn {
            background: transparent;
            color: #e8edf5;
            border: 1px solid #d9a943;
            padding: 9px 14px;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: 0.3s;
        }

        .logout-btn:hover {
            background: #d9a943;
            color: #17243d;
        }

        /* ================= PROFILE ================= */

        .profile-container {
            width: 90%;
            max-width: 760px;
            margin: 55px auto;
        }

        .profile-card {
            background: #ffffff;
            border-radius: 16px;
            padding: 45px;
            box-shadow: 0 8px 30px rgba(23, 36, 61, 0.10);
            border-top: 5px solid #d9a943;
        }

        .profile-title {
            text-align: center;
            margin-bottom: 35px;
        }

        .profile-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #203758, #304e78);
            color: #d9a943;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 42px;
            margin: 0 auto 20px;
            box-shadow: 0 6px 18px rgba(23, 36, 61, 0.20);
            border: 4px solid #f6e8c6;
        }

        .profile-title h1 {
            font-size: 34px;
            color: #17243d;
            margin-bottom: 8px;
        }

        .profile-title p {
            color: #68758a;
            font-size: 15px;
        }

        /* ================= INFO ================= */

        .profile-info {
            margin-top: 25px;
        }

        .info-box {
            background: #f4f6fa;
            padding: 19px 20px;
            border-radius: 10px;
            margin-bottom: 15px;
            border-left: 4px solid #d9a943;
        }

        .info-box strong {
            display: block;
            margin-bottom: 7px;
            color: #17243d;
            font-size: 14px;
        }

        .info-box span {
            color: #536176;
            font-size: 16px;
        }

        .info-icon {
            color: #d9a943;
            margin-right: 7px;
        }

        /* ================= BACK BUTTON ================= */

        .back-wrapper {
            text-align: center;
            margin-top: 28px;
        }

        .back-btn {
            display: inline-block;
            background: #17243d;
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: bold;
            transition: 0.3s;
        }

        .back-btn:hover {
            background: #d9a943;
            color: #17243d;
        }

        /* ================= MOBILE ================= */

        @media (max-width: 800px) {

            .navbar {
                flex-direction: column;
                gap: 18px;
                padding: 20px;
            }

            .logo {
                font-size: 21px;
            }

            .nav-links {
                justify-content: center;
            }

            .profile-container {
                width: 94%;
                margin: 35px auto;
            }

            .profile-card {
                padding: 30px 22px;
            }

            .profile-title h1 {
                font-size: 28px;
            }
        }

        @media (max-width: 500px) {

            .nav-links {
                flex-direction: column;
                width: 100%;
            }

            .nav-links a,
            .logout-btn {
                width: 100%;
                text-align: center;
            }

            .profile-card {
                padding: 25px 18px;
            }
        }
    </style>
</head>

<body>

    <!-- ================= NAVBAR ================= -->

    <nav class="navbar">

        <div class="logo">
            <i class="bi bi-book-half"></i>
            Online Book Store
        </div>

        <div class="nav-links">

            <a href="{{ url('/') }}">
                <i class="bi bi-house"></i>
                Home
            </a>

            <a href="{{ route('books.index') }}">
                <i class="bi bi-book"></i>
                Books
            </a>

            <a href="{{ route('categories.index') }}">
                <i class="bi bi-grid"></i>
                Categories
            </a>

            <a href="{{ route('stories.index') }}">
                <i class="bi bi-journal-text"></i>
                Stories
            </a>

            <form action="{{ route('logout') }}"
                  method="POST"
                  style="display:inline;">
                @csrf

                <button type="submit" class="logout-btn">
                    <i class="bi bi-box-arrow-right"></i>
                    Logout
                </button>
            </form>

        </div>

    </nav>


    <!-- ================= PROFILE ================= -->

    <div class="profile-container">

        <div class="profile-card">

            <div class="profile-title">

                <div class="profile-icon">
                    <i class="bi bi-person-fill"></i>
                </div>

                <h1>My Profile</h1>

                <p>
                    Welcome to your Online Book Store profile
                </p>

            </div>


            <div class="profile-info">

                <!-- NAME -->

                <div class="info-box">

                    <strong>
                        <i class="bi bi-person info-icon"></i>
                        Name
                    </strong>

                    <span>
                        {{ $user->name }}
                    </span>

                </div>


                <!-- EMAIL -->

                <div class="info-box">

                    <strong>
                        <i class="bi bi-envelope info-icon"></i>
                        Email
                    </strong>

                    <span>
                        {{ $user->email }}
                    </span>

                </div>


                <!-- MEMBER SINCE -->

                <div class="info-box">

                    <strong>
                        <i class="bi bi-calendar-event info-icon"></i>
                        Member Since
                    </strong>

                    <span>
                        {{ $user->created_at->format('d M Y') }}
                    </span>

                </div>

            </div>


            <!-- BACK BUTTON -->

            <div class="back-wrapper">

                <a href="{{ url('/') }}" class="back-btn">
                    <i class="bi bi-arrow-left"></i>
                    Back to Home
                </a>

            </div>

        </div>

    </div>

</body>

</html>