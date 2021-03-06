@extends('layouts.public')

@section('title', $challenge->title)

@section('content')
    <main>
        <article>
            <header style="background-image: url('{{$challenge->image_path}}')">
                <div class="header-overlay">
                    <h1 class="header-title">{{$challenge->title}}</h1>
                    <p class="header-subtitle">{{$challenge->subtitle}}</p>
                </div>
            </header>
            <div class="container">
                <div class="article-info">
                    <div class="article-info-location">
                        <strong>Locatie:</strong>
                        <a href="https://www.google.com/maps/place/{{str_replace(" ", "+", trim($challenge->location_address))}}"
                           target="_blank" rel="noreferrer">{{$challenge->location_name}}
                        </a>
                    </div>
                    <div class="article-info-date">
                        <strong>Datum:</strong>
                        {{$challenge->start_time}} tot {{$challenge->end_time}}
                    </div>
                </div>
                <div class="content">
                    @markdown($challenge->content)
                </div>
            </div>
        </article>
    </main>
@endsection
