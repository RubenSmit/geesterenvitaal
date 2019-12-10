@extends('layouts.app')

@section('type', 'screen')

@section('title', $action->title)

@section('nav')
        <img class="nav-brand" src="{{url('img/logo.png')}}" alt="Geesteren Vitaal - Home"/>
        <h1 class="nav-title">{{$site_settings["site_title"]}}</h1>
@endsection()

@section('main')
    <main class="action-screen">
        <article>
            <header class="header-narrow" style="background-image: url('{{$action->image_path}}')">
                <div class="header-overlay">
                    <h1 class="header-title">{{$action->title}}</h1>
                </div>
            </header>
            <div class="container">
                <div class="action-show">
                    <img class="action-image" src="{{$action->image_path}}">
                    <div class="action-content">
                        <h2 class="action-price">Vanaf €{{number_format($action->new_price, 2, ',', '')}}
                            + {{$action->points_required}} punten</h2>
                        <small class="action-old-price">Gewoonlijke prijs: €{{number_format($action->old_price, 2, ',', '')}}</small>
                    </div>
                </div>
            </div>
        </article>
    </main>
@endsection
