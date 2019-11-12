@extends('layouts.app')

@section('title', 'Uitdagingen')

@section('content')
    <main>
        <header class="header-narrow" style="background-image: url('img/blubel-ffmkD8dm7Zw-unsplash.jpg')">
            <div class="header-overlay">
                <h1 class="header-title">Uitdagingen</h1>
            </div>
        </header>
        <div class="container">
            @foreach ($challenges as $challenge)
                <aside>
                    <h2><a href="/uitdaging/{{$challenge->id}}">{{$challenge->title}}</a></h2>
                    <h3>{{$challenge->subtitle}}</h3>
                </aside>
            @endforeach
        </div>
    </main>
@endsection
