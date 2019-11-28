@extends('layouts.public')

@section('title', 'Uitdagingen')

@section('content')
    <main>
        <header class="header-narrow" style="background-image: url('{{url('img/banner.jpg')}}')">
            <div class="header-overlay">
                <h1 class="header-title">uitdagingen</h1>
            </div>
        </header>

        <div class="link-bar">
            <div class="container">
                <a href="{{url('/uitdaging')}}" class="{{$current_category == null ? "active" : "" }}">alles</a>
                @foreach($categories as $category)
                    <a href="{{url('/uitdaging/categorie/'.$category->name)}}"  class="{{$current_category == $category->name ? "active" : "" }}">{{$category->name}}</a>
                @endforeach
            </div>
        </div>

        <div class="container challenges">
            @foreach ($challenges as $challenge)
                <div class="challenge">
                    <a href="/uitdaging/{{$challenge->id}}">
                        <img class="challenge-image" src="{{$challenge->image_path}}"/>
                        <div>
                            <h2 class="challenge-title">{{$challenge->title}}</h2>
                            <small class="challenge-subtitle">{{$challenge->subtitle}}</small>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </main>
@endsection
