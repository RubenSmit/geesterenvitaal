@extends('layouts.public')

@section('title', 'Acties')

@section('content')
    <main>
        <header class="header-narrow" style="background-image: url('img/banner.jpg')">
            <div class="header-overlay">
                <h1 class="header-title">acties</h1>
            </div>
        </header>

        <div class="link-bar">
            <div class="container">
                <h3>Per Categorie</h3>
                <a href="{{url('/actie')}}">alle acties</a>
                    @foreach($categories as $category)
                        <a href="{{url('/actie/categorie/'.$category->name)}}">{{$category->name}}</a>
                    @endforeach
            </div>
        </div>

        <div class="container actions">
            @forelse ($actions as $action)
                <div class="action-index">
                    <a href="/actie/{{$action->id}}">
                        <img class="action-image" src="{{$action->image_path}}"/>
                        <div>
                            <h2 class="action-title">{{$action->title}}</h2>
                            <small class="action-subtitle">Vanaf €{{number_format($action->new_price, 2, ',', '')}}
                                + {{$action->points_required}} punten</small>
                        </div>
                    </a>
                </div>
                @empty
                    <p>Geen acties in deze categorie!</p>
            @endforelse
        </div>
    </main>
@endsection
