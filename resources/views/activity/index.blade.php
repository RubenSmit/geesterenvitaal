@extends('layouts.app')

@section('title', 'Activiteiten')

@section('content')
    <main>
        <header class="header-narrow" style="background-image: url('img/blubel-ffmkD8dm7Zw-unsplash.jpg')">
            <div class="header-overlay">
                <h1 class="header-title">activiteiten</h1>
            </div>
        </header>
        <div class="container">
            @foreach ($activities as $activity)
                <aside>
                    <h2><a href="/activiteit/{{$activity->id}}">{{$activity->title}}</a></h2>
                    <h3>{{$activity->subtitle}}</h3>
                    <small>{{$activity->start_time}}</small>
                    <small>{{$activity->end_time}}</small>
                </aside>
            @endforeach
        </div>
    </main>
@endsection
