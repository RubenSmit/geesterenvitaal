@extends('layouts.app')

@section('type', 'screen')

@section('title', $activity->title)

@section('nav')
    <img class="nav-brand" src="{{url('img/logo.png')}}" alt="Geesteren Vitaal - Home"/>
    <h1 class="nav-title">{{$site_settings["site_title"]}}</h1>
@endsection()

@section('main')
    <main class="activity-show activity-screen">
        <article>
            <img class="activity-image" src="{{$activity->image_path}}"/>
            <div class="container">
                <div class="content">
                    <div class="activity-header">
                        <h1 class="activity-title">{{$activity->title}}</h1>
                    </div>
                    <p class="activity-subtitle">{{$activity->subtitle}}</p>
                    <div class="activity-info">
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
                </div>
            </div>
        </article>
    </main>
@endsection
