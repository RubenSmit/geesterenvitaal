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
                <a class="main-highlight-link" href="/activiteit/{{$activities->first()->id}}">
                    <span class="fa fa-chevron-circle-right"></span>meer informatie
                </a>
            </div>
        </aside>
        <div class="container">
            <div class="main-colums">
                <aside class="main-column index-activities">
                    <h2 class="aside-title"><span class="fa fa-heartbeat"></span> activiteiten</h2>
                    <ul>
                        @foreach($activities as $activity)
                            <a class="activity-click" href="{{url('/activiteit/'.$activity["id"])}}">
                            <li>
                                    <strong>{{$activity->start_time->isoFormat('D-MM')}}</strong>
                                    <span>{{$activity->title}}</span>
                            </li>
                            </a>
                        @endforeach
                    </ul>
                    <a href="{{url('/activiteit')}}"class="aside-more">meer activiteiten ></a>
                </aside>
                <aside class="main-column index-actions">
                    <h2 class="aside-title"><span class="fa fa-wallet"></span> spaaracties</h2>
                    <ul>
                        @foreach($actions as $action)
                            <a class="action-click" href="{{url('/actie/'.$action["id"])}}">
                            <li style="background-image: url('{{$action->image_path}}');">
                                <small class = "floating-text">Vanaf €{{number_format($action->new_price, 2, ',', '')}}
                                    + {{$action->points_required}} punten</small>
                            </li>
                            </a>
                        @endforeach
                    </ul>
                    <a href="{{url('/actie')}}"class="aside-more">meer spaaracties ></a>
                </aside>
                <aside class="main-column index-challenges">
                    <h2 class="aside-title"><span class="fa fa-route"></span> uitdagingen</h2>
                    <ul>
                        @foreach($challenges as $challenge)
                            <a class="challenge-click" href="{{url('/uitdaging/'.$challenge["id"])}}">
                            <li>
                                <img class="challenge-image" src="{{$challenge->image_path}}">
                                <span>{{$challenge->title}}</span>
                            </li>
                            </a>
                        @endforeach
                    </ul>
                    <a href="{{url('/uitdaging')}}"class="aside-more">meer uitdagingen ></a>
                </aside>
            </div>
        </div>
    </main>
@endsection
