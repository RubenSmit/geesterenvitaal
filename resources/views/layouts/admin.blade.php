@extends('layouts.app')

@section('type', 'admin')

@section('nav')
    <a href="{{url('/admin')}}" class="nav-brand">
        Admin
    </a>
    <div class="nav-menu">
        @guest
            @if (Route::has('register'))
                <a class="nav-item nav-pill" href="{{ route('register') }}">{{ __('Registreren') }}</a>
            @endif
            <a class="nav-item nav-pill" href="{{ route('login') }}">{{ __('Login') }}</a>
        @else
            <a class="nav-item" href="{{url('/admin/pagina')}}">Pagina's</a>
            <a class="nav-item" href="{{url('/admin/actie')}}">Acties</a>
            <a class="nav-item" href="{{url('/admin/activiteit')}}">Activiteiten</a>
            <a class="nav-item" href="{{url('/admin/uitdaging')}}">Uitdagingen</a>
            <a class="nav-item nav-pill" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            <a class="nav-item nav-pill" href="{{url('/')}}">Publiek</a>
        @endguest
    </div>
@endsection

@section('main')
    <main>
        <div class="container">
            @yield('content')
        </div>
    </main>
@endsection
