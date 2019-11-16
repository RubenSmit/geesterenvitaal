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
                        <small class="main-highlight-small">{{$activities->first()->start_time->isoFormat('dddd D MMM [om] H:mm')}}</small>
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
                                <small>{{$activity->start_time}} tot {{$activity->end_time}}</small>
                                {{$activity->content}}
                            </li>
                        @endforeach
                    </ul>
                </aside>
                <aside class="main-column">
                    <h2 class="aside-title">spaaracties</h2>
                    <p class="aside-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas non elit non
                        dolor efficitur porta. Curabitur et tempus lacus. Lorem ipsum dolor sit amet, consectetur
                        adipiscing
                        elit. Quisque lorem lacus, feugiat at tellus ac, eleifend sodales tortor. Sed quis risus nisl.
                        Suspendisse justo odio, maximus nec lobortis ut, vehicula ac arcu. Aliquam erat volutpat. Nullam
                        facilisis enim a nibh placerat, vel mattis odio congue. Ut consequat mi nec arcu imperdiet
                        gravida.
                        Nam dapibus maximus eleifend. </p>
                </aside>
                <aside class="main-column">
                    <h2 class="aside-title">uitdagingen</h2>
                    @foreach($challenges as $challenge)
                        <li>
                            <h3>{{$challenge->title}}</h3>
                            <strong>{{$challenge->subtitle}}</strong>
                            <small>{{$challenge->start_time}} tot {{$challenge->end_time}}</small>
                            {{$challenge->content}}
                        </li>
                    @endforeach
                </aside>
            </div>
        </div>
    </main>
@endsection
