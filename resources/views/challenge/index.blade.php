@extends('layouts.public')

@section('title', 'Uitdagingen')

@section('content')
    <main>
        <header class="header-narrow" style="background-image: url('img/blubel-ffmkD8dm7Zw-unsplash.jpg')">
            <div class="header-overlay">
                <h1 class="header-title">uitdagingen</h1>
            </div>
        </header>
        <div class="container challenges">
            @foreach ($challenges as $challenge)
                <aside class="challenge">
                    <a href="/uitdaging/{{$challenge->id}}">
                        <img class="challenge-image" src="img/blubel-ffmkD8dm7Zw-unsplash.jpg"/>
                        <div>
                            <h2 class="challenge-title">{{$challenge->title}}</h2>
                            <small class="challenge-subtitle">{{$challenge->subtitle}}</small>
                        </div>
                    </a>
                </aside>
            @endforeach
        </div>
    </main>
@endsection
