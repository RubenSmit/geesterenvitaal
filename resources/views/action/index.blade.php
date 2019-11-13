@extends('layouts.app')

@section('title', 'Acties')

@section('content')
    <main>
        <header class="header-narrow" style="background-image: url('img/blubel-ffmkD8dm7Zw-unsplash.jpg')">
            <div class="header-overlay">
                <h1 class="header-title">acties</h1>
            </div>
        </header>
        <div class="container actions">
            @foreach ($actions as $action)
                <aside class="action">
                    <a href="/actie/{{$action->id}}">
                        <img class="action-image" src="img/blubel-ffmkD8dm7Zw-unsplash.jpg"/>
                        <div>
                            <h2 class="action-title">{{$action->title}}</h2>
                            <small class="action-subtitle">Vanaf €{{number_format($action->new_price/100, 2, ',', '')}}
                                + {{$action->points_required}} punten!</small>
                        </div>
                    </a>
                </aside>
            @endforeach
        </div>
    </main>
@endsection
