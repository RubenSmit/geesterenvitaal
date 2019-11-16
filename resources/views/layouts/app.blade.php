<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>

    <title>Geesteren Vitaal - @yield('title')</title>
</head>
<body class="@yield('type')">
<nav>
    <div class="nav-container">
        @yield('nav')
    </div>
</nav>
@if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
@endif
@yield('main')
<footer>
    <div class="footer-container">
        <div class="footer-column">
            <h5 class="footer-title">Contact</h5>
            <p class="footer-text">
                Straatweg 12<br>
                Geesteren
            </p>
        </div>
        <div class="footer-column">
            <h5 class="footer-title">Info</h5>
            <p class="footer-text">
                Balu des amerco<br>
                Curabitur fringilla turpis augue
            </p>
        </div>
        <div class="footer-column">
            <h5 class="footer-title">Privacy</h5>
            <p class="footer-text">
                Duis sed ornare enim<br>
                Quisque pellentesque porta libero
            </p>
        </div>
    </div>
</footer>
</body>
</html>
