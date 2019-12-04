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
                <aside class="main-column">
                    <h2 class="aside-title">activiteiten</h2>
                    <ul>
                        @foreach($activities as $activity)
                            <li>
                                <h3>{{$activity->title}}</h3>
                                <strong>{{$activity->subtitle}}</strong>
                                <small>{{$activity->start_time->isoFormat('dddd D MMM [om] H:mm')}}</small>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{url('/activiteit')}}">Meer activiteiten</a>
                </aside>
                <aside class="main-column">
                    <h2 class="aside-title">spaaracties</h2>
                    <ul>
                        @foreach($actions as $action)
                            <li>
                                <h3>{{$action->title}}</h3>
                                <small>Vanaf €{{number_format($action->new_price, 2, ',', '')}}
                                    + {{$action->points_required}} punten</small>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{url('/actie')}}">Meer spaaracties</a>
                </aside>
                <aside class="main-column">
                    <h2 class="aside-title">uitdagingen</h2>
                    <ul>
                        @foreach($challenges as $challenge)
                            <li>
                                <h3>{{$challenge->title}}</h3>
                                <strong>{{$challenge->subtitle}}</strong>
                                <small>locatie: {{$challenge->location_name}}</small>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{url('/uitdaging')}}">Meer uitdagingen</a>
                </aside>
            </div>
        </div>
    </main>
@endsection
