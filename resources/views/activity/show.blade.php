@extends('layouts.public')

@section('title', $activity->title)

@section('content')
    <main>
        <article>
            <header style="background-image: url('{{$activity->image_path}}')">
                <div class="header-overlay">
                    <h1 class="header-title">{{$activity->title}}</h1>
                    <p class="header-subtitle">{{$activity->subtitle}}</p>
                    <a class="header-link" href="{{$activity->registration_url}}" target="_blank" rel="noreferrer">Inschrijven</a>
                </div>
            </header>
            <div class="container">
                <div class="article-info">
                    <div class="article-info-location">
                        <strong>Locatie:</strong>
                        <a href="https://www.google.com/maps/place/{{str_replace(" ", "+", trim($activity->location_address))}}"
                           target="_blank" rel="noreferrer">{{$activity->location_name}}
                        </a>
                    </div>
                    <div class="article-info-date">
                        <strong>Datum:</strong>
                        {{$activity->humanized_times}}
                    </div>
                </div>
                <div class="content">
                    @markdown($activity->content)
                </div>
                <small class="article-date">Gepubliceerd op {{$activity->created_at}}</small>
            </div>
        </article>
    </main>
@endsection
