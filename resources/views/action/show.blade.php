@extends('layouts.public')

@section('title', $action->title)

@section('content')
    <main>



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
                        <div class="action-description">
                            @markdown($action->content)
                        </div>
                        <a href="{{$action->samengezond_url}}" class="action-link btn">Bestellen via SamenGezond</a>
                    </div>
                </div>
                <small class="article-date">Gepubliceerd op {{$action->created_at}}</small>
            </div>
        </article>
    </main>
@endsection
