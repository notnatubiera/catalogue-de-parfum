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
        }


        nav a {
            color: #555;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
            letter-spacing: 1.5px;
            transition: color 0.3s, transform 0.3s; /* add transform */
            display: inline-block; /* required for transform to work */
        }

        nav a:hover, nav a.active {
            color: #bfa37e;
            transform: scale(1.20);
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

        .search-bar:focus,
        .search-bar:hover {
            border-color: #bfa37e;
            width: 400px;
        }


        .add-button {
            width: 35px;
            height: 35px;
            background-color: #333;
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.2s;
            flex-shrink: 0;
        }

        .add-button:hover {
            transform: scale(1.1);
            background-color: #bfa37e;
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




    </style>

    @stack('styles')
</head>
<body>

<nav>
    <!-- Left Zone: Logo -->
    <div class="nav-left">
        <a href="/main" class="logo {{ request()->is('main') ? 'active' : '' }}">Catalogue de Parfum</a>
    </div>

    <!-- Middle Zone: Search Bar -->
    <div class="nav-middle">
        <input type="text" id="searchBar" placeholder="Looking for a particular fragrance?" class="search-bar" autocomplete="off">
        <div id="searchResults" class="search-results" hidden></div>
    </div>

    <!-- Right Zone: Navigation and Plus Button -->
    <div class="nav-right">
        <a href="/collection" class="{{ request()->is('collection') ? 'active' : '' }}">Brands</a>
        <a href="/season" class="{{ request()->is('season') ? 'active' : '' }}">Season</a>
        <button class="add-button" title="Add fragrance?">+</button>
    </div>
</nav>

<div class="container">
    @yield('content')
</div>

<!-- Make sure your CSS is linked in the <head> -->
@vite(['resources/css/seasons.css', 'resources/js/app.js'])
</body>
</html>
