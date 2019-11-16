@extends('layouts.app')

@section('type', 'public')

@section('nav')
    <a href="/">
        <img class="nav-brand" src="{{url('img/temp.bmp')}}" alt="Geesteren Vitaal - Home"/>
    </a>
    <div class="nav-menu">
        <a class="nav-item" href="{{url('/activiteit')}}">Activiteiten</a>
        <a class="nav-item" href="{{url('/actie')}}">Spaaracties</a>
        <a class="nav-item" href="{{url('/uitdaging')}}">Uitdagingen</a>
        @guest
            <a class="nav-item nav-pill" href="https://www.samengezond.nl" target="_blank"
               rel="noreferrer">SamenGezond</a>
        @else
            <a class="nav-item nav-pill" href="https://www.samengezond.nl" target="_blank"
               rel="noreferrer">SamenGezond</a>
            <a class="nav-item nav-pill" href="{{url('/admin')}}">Admin</a>
        @endguest
    </div>
@endsection()

@section('main')
    @yield('content')
@endsection
