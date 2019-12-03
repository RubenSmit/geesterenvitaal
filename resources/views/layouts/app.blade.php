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
            <strong class="footer-title">Contact</strong>
            <p class="footer-text">
                {{$site_settings["footer_contact"]}}
            </p>
        </div>
        <div class="footer-column">
            <strong class="footer-title">Info</strong>
            <p class="footer-text">
                {{$site_settings["footer_info"]}}
            </p>
        </div>
        <div class="footer-column">
            @foreach($site_settings["footer_items"] as $item)
                <a class="footer-title" href="{{url('/pagina/'.$item->id)}}">{{$item->title}}</a>
            @endforeach
        </div>
    </div>
    <span class="footer-copyright">Copyright <a href="http://rubensmit.com" target="_blank" rel="noreferrer">Ruben Smit</a> & Laurens Pelgröm - 2019</span>
</footer>
</body>
</html>
