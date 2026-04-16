<!DOCTYPE html>
<html>
<head>
    <title>CATALOGUE DE PARFUM</title>
    <style>
        nav {
            background: #F6F2EE ;
            padding: 35px;
            border-bottom: 1px solid #eee;
            display: flex;
            text-align: center;
        }

        nav a {
            color: #555;
            margin: 0 30px;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 20px;
            letter-spacing: 2px;
        }

        nav a:first-child {
            font-weight: bold;
            font-size: 18px;
            color: #000;
            margin-right: auto;
            margin-left: 0;
        }

        nav a:hover {
            color: #bfa37e;
        }
        nav a.active {
            color: #bfa37e;
            font-weight: bold;
            border-bottom: 2px solid #bfa37e;
            padding-bottom: 5px;
        }

    </style>
</head>
<body>

<nav>
    <a href="/main" class="{{ request()->is('main') ? 'active' : '' }}" >CATALOGUE DE PARFUM</a>
    <a href="/collection" class="{{ request()->is('collection') ? 'active' : '' }}">Brands</a>
    <a href="/notes" class="{{ request()->is('notes') ? 'active' : '' }}" >Notes</a>
    <a href="/season" class="{{ request()->is('season') ? 'active' : '' }}">Season</a>

</nav>

<div class="container">
    @yield('content') </div>

</body>
<body>

<!-- Make sure your CSS is linked in the <head> -->
@vite(['resources/css/seasons.css', 'resources/js/app.js'])
</body>
</html>
