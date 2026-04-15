<!DOCTYPE html>
<html>
<head>
    <title>My Laravel App</title>
    <style>
        nav { background: aliceblue; padding: 2rem; }
        nav a { color: black; margin-right: 100px; text-decoration: none; font-family: sans-serif }
        nav a:hover { color: #ff2d20; } /* Laravel Red! */
        .container { padding: 20px; font-family: sans-serif; }
    </style>
</head>
<body>

<nav>
    <a>CATALOGUE DE PERFUME</a>
    <a href="/">Collection</a>
    <a href="/about">Notes</a>
    <a href="/contact">Season</a>
</nav>

<div class="container">
    @yield('content') </div>

</body>
</html>
