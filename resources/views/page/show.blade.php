@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <main>
        <article>
            <header style="background-image: url('{{url('img/blubel-ffmkD8dm7Zw-unsplash.jpg')}}')">
                <div class="header-overlay">
                    <h1 class="header-title">{{$page->title}}</h1>
                    <p class="header-subtitle">{{$page->subtitle}}</p>
                </div>
            </header>
            <div class="container">
                <div class="content">
                    @markdown($page->content)
                </div>
                <small class="article-date">Gepubliceerd op {{$page->created_at}}</small>
            </div>
        </article>
    </main>
@endsection
