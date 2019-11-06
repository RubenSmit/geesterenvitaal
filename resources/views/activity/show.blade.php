@extends('layouts.app')

@section('title', $activity->title)

@section('content')
    <main>
        <article>
            <header style="background-image: url('{{url('img/blubel-ffmkD8dm7Zw-unsplash.jpg')}}')">
                <div class="header-overlay">
                    <h1 class="header-title">{{$activity->title}}</h1>
                    <p class="header-subtitle">{{$activity->subtitle}}</p>
                </div>
            </header>
            <div class="container">
                <div class="content">
                    @markdown($activity->content)
                </div>
                <small class="article-date">Gepubliceerd op {{$activity->created_at}}</small>
            </div>
        </article>
    </main>
@endsection
