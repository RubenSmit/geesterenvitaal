@extends('layouts.app')

@section('type', 'public')

@section('nav')
    <a href="/">
        <img class="nav-brand" src="{{url('img/logo.bmp')}}" alt="Geesteren Vitaal - Home"/>
    </a>
    <div class="nav-menu">
        <a class="nav-item" href="{{url('/activiteit')}}">activiteiten</a>
        <a class="nav-item" href="{{url('/actie')}}">spaaracties</a>
        <a class="nav-item" href="{{url('/uitdaging')}}">uitdagingen</a>
        @foreach($site_settings["nav_items"] as $item)
            <a class="nav-item" href="{{url('/pagina/'.$item->id)}}">{{$item->title}}</a>
        @endforeach
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
