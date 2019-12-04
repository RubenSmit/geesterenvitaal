@extends('layouts.public')

@section('title', 'Home')

@section('content')
    <main>
        <header style="background-image: url('img/banner.jpg')">
            <div class="header-overlay">
                <h1 class="header-title">{{$site_settings["site_title"]}}</h1>
                <p class="header-subtitle">{{$site_settings["site_subtitle"]}}</p>
                <a class="header-link" href="{{url('/pagina/'.$site_settings["dashboard_header_button_id"])}}">
                    <span class="fa fa-chevron-circle-right"></span>
                    {{$site_settings["dashboard_header_button_text"]}}
                </a>
            </div>
        </header>
        <aside class="main-highlight">
            <div class="container">
                <div class="main-highlight-content">
                    <h2 class="main-highlight-title">
                        {{$activities->first()->title}}
                        <small
                            class="main-highlight-small">{{$activities->first()->start_time->isoFormat('dddd D MMM [om] H:mm')}}</small>
                    </h2>
                    <p class="main-highlight-subtitle">{{$activities->first()->subtitle}}</p>
                </div>
                <a class="main-highlight-link" href="/activiteit/{{$activities->first()->id}}">Meer informatie</a>
            </div>
        </aside>
        <div class="container">
            <div class="main-colums">
                <aside class="main-column index-activities">
                    <h2 class="aside-title">activiteiten</h2>
                    <ul>
                        @foreach($activities as $activity)
                            <li>
                                <strong>{{$activity->start_time->isoFormat('D-MM')}}</strong>
                                <span>{{$activity->title}}</span>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{url('/activiteit')}}"class="aside-more">Meer activiteiten</a>
                </aside>
                <aside class="main-column index-actions">
                    <h2 class="aside-title">spaaracties</h2>
                    <ul>
                        @foreach($actions as $action)
                            <li style="background-image: url('{{$action->image_path}}');">
                                <small class = "floating-text">Vanaf €{{number_format($action->new_price, 2, ',', '')}}
                                    + {{$action->points_required}} punten</small>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{url('/actie')}}"class="aside-more">Meer spaaracties</a>
                </aside>
                <aside class="main-column index-challenges">
                    <h2 class="aside-title">uitdagingen</h2>
                    <ul>
                        @foreach($challenges as $challenge)
                            <li>
                                <img class="challenge-image" src="{{$challenge->image_path}}">
                                <span>{{$challenge->title}}</span>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{url('/uitdaging')}}"class="aside-more">Meer uitdagingen</a>
                </aside>
            </div>
        </div>
    </main>
@endsection
