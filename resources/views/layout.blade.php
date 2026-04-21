<!DOCTYPE html>
<html>
<head>
    <title>CATALOGUE DE PARFUM</title>
    <style>
        /* Base Reset */
        body { margin: 0; font-family: Times New Roman; }

        nav {
            background: #F2EADF;
            padding: 20px 40px;
            border-bottom: 1px solid #eee;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }


        .nav-left, .nav-right {
            flex: 1;
            display: flex;
            align-items: center;
        }

        .nav-middle {
            flex: 2;
            display: flex;
            justify-content: center;
        }

        .nav-right {
            justify-content: flex-end;
            gap: 30px;
        }


        .logo {
            color: #555;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
            letter-spacing: 2px;
            text-transform: uppercase;
            white-space: nowrap;
        }

        nav a {
            color: #555;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
            letter-spacing: 1.5px;
            transition: 0.3s;
        }

        nav a:hover, nav a.active {
            color: #bfa37e;
        }

        nav a.active {
            border-bottom: 2px solid #bfa37e;
            padding-bottom: 5px;
        }

        .search-bar {
            text-align: center;
            width: 250px;
            padding: 10px 10px 10px 10px;
            border-radius: 50px;
            border: 1px solid #ddd;
            outline: none;
            background: #fff;
            transition: width 0.4s ease-in-out;
        }

        .search-bar::placeholder {
            color: transparent;
            transition: color 0.3s ease;
        }

        .search-bar:focus,
        .search-bar:hover {
            border-color: #bfa37e;
            width: 400px;
        }

        .search-bar:hover::placeholder,
        .search-bar:focus::placeholder {
            color: #888;
        }

        .admin-login {
            padding: 8px 20px;
            background-color: #333;
            color: white !important;
            border-radius: 50px;
            font-size: 13px !important;
            letter-spacing: 1px;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 1px solid #333;
            white-space: nowrap;
        }

        .admin-login:hover {
            background-color: transparent;
            color: #bfa37e !important;
            border-color: #bfa37e;
        }

    </style>
</head>
<body>

<nav>
    <!-- logo -->
    <div class="nav-left">
        <a href="/main" class="logo {{ request()->is('main') ? 'active' : '' }}">Catalogue de Parfum</a>
    </div>

    <!-- search bararar -->
    <div class="nav-middle">
        <input type="text" placeholder="Looking for a particular fragrance?" class="search-bar">
    </div>

    <!-- right -->
    <div class="nav-right">
        <a href="/collection" class="{{ request()->is('collection') ? 'active' : '' }}">Brands</a>
        <a href="/season" class="{{ request()->is('season') ? 'active' : '' }}">Season</a>
        <a href="/login" class="admin-login">Admin Login</a>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<!-- Scripts (Placed before end of body) -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
</body>
</html>
