@extends('layouts.public')

@section('title', 'Home')

@section('content')
    <main>
        <header style="background-image: url('img/banner.jpg')">
            <div class="header-overlay">
                <h1 class="header-title">Geesteren Vitaal</h1>
                <p class="header-subtitle">Hier komt een mooie pakkende tekst</p>
                <a class="header-link" href="{{url('/pagina/1')}}">Meer over vitaal leven</a>
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
                    <a href="{{url('/activiteit')}}">Meer activiteiten</a>
                </aside>
                <aside class="main-column index-actions">
                    <h2 class="aside-title">spaaracties</h2>
                    <ul>
                        @foreach($actions as $action)
                            <li>
                                <img class="action-image" src="{{$action->image_path}}">
                                <small>Vanaf €{{number_format($action->new_price, 2, ',', '')}}
                                    + {{$action->points_required}} punten</small>
                            </li>
                        @endforeach
                    </ul>
                    <a href="{{url('/actie')}}">Meer spaaracties</a>
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
                    <a href="{{url('/uitdaging')}}">Meer uitdagingen</a>
                </aside>
            </div>
        </div>
    </main>
@endsection
