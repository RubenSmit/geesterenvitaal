@extends('layouts.public')

@section('title', 'Home')

@section('content')
    <main>
        <header style="background-image: url('img/blubel-ffmkD8dm7Zw-unsplash.jpg')">
            <div class="header-overlay">
                <h1 class="header-title">Geesteren Vitaal</h1>
                <p class="header-subtitle">Hier komt een mooie pakkende tekst</p>
                <a class="header-link" href="/">Meer over vitaal leven</a>
            </div>
        </header>
        <aside class="main-highlight">
            <div class="container">
                <div class="main-highlight-content">
                    <h2 class="main-highlight-title">{{$activities->first()->title}}</h2>
                    <p class="main-highlight-subtitle">{{$activities->first()->subtitle}}</p>
                </div>
                <p class="main-highlight-content">{{$activities->first()->start_time}}<br>{{$activities->first()->location_name}}</p>
                <a class="main-highlight-link" href="/activiteit/{{$activities->first()->id}}">Lees meer</a>
            </div>
        </aside>
        <div class="container">
            <div class="main-colums">
                <aside class="main-column">
                    <h2 class="aside-title">Activiteiten</h2>
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
                    <h2 class="aside-title">Spaaracties</h2>
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
                    <h2 class="aside-title">Uitdagingen</h2>
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
