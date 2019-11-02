@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <main>
        <article>
            <header style="background-image: url('{{url('img/blubel-ffmkD8dm7Zw-unsplash.jpg')}}')">
                <div class="header-overlay">
                    <h1 class="header-title">{{$page->title}}</h1>
                    <p class="header-subtitle">trek die sportieve stappers aan</p>
                </div>
            </header>
            <div class="container">
                <small>{{$page->created_at}}</small>
                <p>{{$page->content}}</p>
            </div>
        </article>
    </main>
@endsection
