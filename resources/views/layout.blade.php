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


        /* Update these to be exactly equal */
        .nav-left, .nav-right {
            flex: 1; /* Both sides get 1 part */
            display: flex;
            align-items: center;
        }

        .nav-middle {
            flex: 1; /* Give the middle 1 part as well to keep it 1:1:1 */
            display: flex;
            justify-content: center;
        }

        /* Ensure the container doesn't have a fixed width or weird padding */
        /* Find the .container class in your layout blade and update it */
        /* Replace the .container block in your layout with this */

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
        /* 1. Define the Keyframes */
        @keyframes pageFadeIn {
            from {
                opacity: 0;
                transform: translateY(10px); /* Optional: adds a slight upward slide */
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* 2. Apply it to your main page containers */
        .summer,
        .spring,
        .fall,
        .winter {
            /* 0.6s duration, 'ease-out' for smoothness, 'forwards' to stay visible */
            animation: pageFadeIn 0.6s ease-out forwards;

            /* Ensures the page starts invisible before the animation begins */
            opacity: 0;
        }
    </style>
</head>
<body>

<nav>
    <!-- Left Zone: Logo -->
    <div class="nav-left">
        <a href="/main" class="logo {{ request()->is('main') ? 'active' : '' }}">Catalogue de Parfum</a>
    </div>

    <!-- Middle Zone: Search Bar -->
    <div class="nav-middle">
        <input type="text" placeholder="Looking for a particular fragrance?" class="search-bar">
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
