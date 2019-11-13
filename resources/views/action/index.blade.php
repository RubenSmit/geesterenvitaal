@extends('layouts.app')

@section('title', 'Acties')

@section('content')
    <main>
        <header class="header-narrow" style="background-image: url('img/blubel-ffmkD8dm7Zw-unsplash.jpg')">
            <div class="header-overlay">
                <h1 class="header-title">Acties</h1>
            </div>
        </header>
        <div class="container">
            @foreach ($actions as $action)
                <aside>
                    <h2><a href="/actie/{{$action->id}}">{{$action->title}}</a></h2>
                    <small>Vanaf €{{number_format($action->new_price/100, 2, ',', '')}} + {{$action->points_required}} punten!</small>
                </aside>
            @endforeach
        </div>
    </main>
@endsection
