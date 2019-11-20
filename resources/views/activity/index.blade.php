@extends('layouts.public')

@section('title', 'Activiteiten')

@section('content')
    <main class="activity-index">
        <header class="header-narrow" style="background-image: url('{{url('img/banner.jpg')}}')">
            <div class="header-overlay">
                <h1 class="header-title">activiteiten</h1>
            </div>
        </header>
        <div class="link-bar">
            <div class="container">
                <a href="{{url('/activiteit')}}">alles</a>
                @foreach($categories as $category)
                    <a href="{{url('/activiteit/categorie/'.$category->name)}}">{{$category->name}}</a>
                @endforeach
            </div>
        </div>
        <div class="container">
            @foreach ($activities as $activity)
                <a href="{{url('/activiteit/'.$activity->id)}}">
                    <div class="activity">
                        <img class="activity-image" src="{{$activity->image_path}}"/>
                        <div class="activity-content">
                            <strong class="activity-date">{{$activity->start_time->isoFormat('dddd D MMMM')}}</strong>
                            <h2 class="activity-title">{{$activity->title}}</h2>
                            <p class="activity-subtitle">{{$activity->subtitle}}</p>
                            <small class="activity-info">
                                <span class="activity-location">{{$activity->location_name}}</span>
                                <span class="activity-time">{{$activity->humanized_timerange}}</span>
                            </small>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </main>
@endsection
