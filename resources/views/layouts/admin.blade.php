<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <title>Geesteren Vitaal - Admin - @yield('title')</title>
</head>
<body class="admin">
<nav>
    <div class="nav-container">
        <a href="/admin" class="nav-brand">
            Admin
        </a>
        <div class="nav-menu">
            <a class="nav-item" href="/admin/pagina">Pagina's</a>
            <a class="nav-item" href="/admin/actie">Acties</a>
            <a class="nav-item" href="/admin/activiteit">Activiteiten</a>
            <a class="nav-item" href="/admin/uitdaging">Uitdagingen</a>
            <a class="nav-item nav-pill" href="/">Uitloggen</a>
        </div>
    </div>
</nav>
<main>
    <div class="container">
        @yield('content')
    </div>
</main>
</body>
</html>
