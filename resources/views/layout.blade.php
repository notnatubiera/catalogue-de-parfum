<!DOCTYPE html>
<html>
<head>
    <title>CATALOGUE DE PARFUM</title>
    <style>
        /* Base Reset */
        body { margin: 0; font-family: Times New Roman; }

        nav {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: rgba(242, 234, 223, 0.92);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
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
            position: relative;
            padding-bottom: 5px;
        }

        .logo::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 2px;
            bottom: 0;
            left: 0;
            background-color: currentColor;
            transform: scaleX(0);
            transition: transform 0.4s ease-in-out;
            transform-origin: center;
        }

        .logo:not(.active):hover::after,
        .logo:not(.active):focus::after {
            transform: scaleX(1);
        }

        .logo:focus {
            outline:none;
        }

        nav a {
            color: #555;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
            letter-spacing: 1.5px;
            position: relative;
            transition: color 0.3s ease;
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

        .logo:hover,
        .logo:focus {

        }

        .nav-middle {
            position: relative;
        }

        .search-results {
            position: absolute;
            top: calc(100% + 8px);
            left: 50%;
            transform: translateX(-50%);
            width: 420px;
            background: #fff;
            border: 0.5px solid #ede8e0;
            z-index: 2000;
            max-height: 340px;
            overflow-y: auto;
            box-shadow: 0 8px 32px rgba(0,0,0,0.08);
        }

        .search-item {
            display: flex;
            flex-direction: column;
            padding: 12px 18px;
            text-decoration: none;
            border-bottom: 0.5px solid #f0ebe3;
            transition: background 0.15s;
        }

        .search-item:hover {
            background: #f7f4ef;
        }

        .search-item-name {
            font-family: 'Cormorant Garamond', serif;
            font-size: 16px;
            color: #1a1a1a;
        }

        .search-item-brand {
            font-size: 10px;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #b8965a;
            margin-top: 2px;
        }

        .search-empty {
            padding: 16px 18px;
            font-size: 12px;
            color: #999;
            letter-spacing: 0.1em;
            text-transform: uppercase;
        }



        .container{
            max-width: none!important;
        }

    </style>

    @stack('styles')
</head>
<body>

<nav>
    <!-- logo -->
    <div class="nav-left">
        <a href="/main" class="logo {{ request()->is('main') ? 'active' : '' }}">Catalogue de Parfum</a>
    </div>

    <!-- search bararar -->
    <div class="nav-middle">
        <input type="text" id="searchBar" placeholder="Looking for a particular fragrance?" class="search-bar" autocomplete="off">
        <div id="searchResults" class="search-results" hidden></div>
    </div>

    <!-- right -->
    <div class="nav-right">
        <a href="/collection" class="{{ request()->is('collection') ? 'active' : '' }}">Brands</a>
        <a href="/season" class="{{ request()->is('season') ? 'active' : '' }}">Season</a>
        <a href="/admin" class="admin-login">Admin Login</a>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<!-- Make sure your CSS is linked in the <head> -->
@vite(['resources/css/seasons.css',
    'resources/css/FilterBar.css',
    'resources/css/fragrance.css',
    'resources/css/home.css',
    'resources/js/app.js'])
</body>
</html>
