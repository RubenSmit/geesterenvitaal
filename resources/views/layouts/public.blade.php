@extends('layouts.app')

@section('type', 'public')

@section('nav')
    <a href="/">
        <img class="nav-brand" src="{{url('img/logo.png')}}" alt="Geesteren Vitaal - Home"/>
    </a>
    <div class="nav-menu">
        @foreach($site_settings["nav_items"] as $item)
            <a class="nav-item {{(Request::is('pagina/'.$item->id)) ? "active": ""}}" href="{{url('/pagina/'.$item->id)}}">{{$item->title}}</a>
        @endforeach
        <a class="nav-item {{(Request::is('activiteit') || Request::is('activiteit/*')) ? "active": ""}}" href="{{url('/activiteit')}}">activiteiten</a>
        <a class="nav-item {{(Request::is('actie') || Request::is('actie/*')) ? "active": ""}}" href="{{url('/actie')}}">spaaracties</a>
        <a class="nav-item {{(Request::is('uitdaging') || Request::is('uitdaging/*')) ? "active": ""}}" href="{{url('/uitdaging')}}">uitdagingen</a>
        @guest
            <a class="nav-item nav-pill" href="https://www.samengezond.nl" target="_blank"
               rel="noreferrer">
                <span class="fa fa-chevron-circle-right"></span>
                SamenGezond
            </a>
        @else
            <a class="nav-item nav-pill" href="https://www.samengezond.nl" target="_blank"
               rel="noreferrer">
                <span class="fa fa-chevron-circle-right"></span>
                SamenGezond
            </a>
            <a class="nav-item nav-pill" href="{{url('/admin')}}">Admin</a>
        @endguest
    </div>
@endsection()

@section('main')
    @yield('content')
@endsection

@section('footer')
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
                    <a class="footer-title" href="{{url('/pagina/'.$item->id)}}">{{$item->title}}</a><br>
                @endforeach
            </div>
        </div>
        <span class="footer-copyright">Copyright <a href="http://rubensmit.com" target="_blank" rel="noreferrer">Ruben Smit</a> & Laurens Pelgröm - 2019</span>
    </footer>
@endsection
