@extends('layouts.public')

@section('title', $activity->title)

@section('content')
    <main class="activity-show">
        <article>
            <img class="activity-image" src="{{$activity->image_path}}"/>
            <div class="container">
                <div class="content">
                    <div class="activity-header">
                        <h1 class="activity-title">{{$activity->title}}</h1>
                        <a class="activity-link btn" href="{{$activity->registration_url}}" target="_blank" rel="noreferrer">Inschrijven</a>
                    </div>
                    <p class="activity-subtitle">{{$activity->subtitle}}</p>
                    <div class="activity-info">
                        <div class="article-info-date">
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
                    @markdown($activity->content)
                </div>
            </div>
        </article>
    </main>
@endsection
