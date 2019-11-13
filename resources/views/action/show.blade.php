@extends('layouts.app')

@section('title', $action->title)

@section('content')
    <main>
        <article>
            <header style="background-image: url('{{url('img/blubel-ffmkD8dm7Zw-unsplash.jpg')}}')">
                <div class="header-overlay">
                    <h1 class="header-title">{{$action->title}}</h1>
                </div>
            </header>
            <div class="container">
                <div class="content">
                    @markdown($action->content)
                    <p>
                    <ul>
                        <li>SamenGezond URL: {{$action->samengezond_url}}</li>
                        <li>Benodigde aantal punten: {{$action->points_required}}</li>
                        <li>Van €{{number_format($action->old_price, 2, ',', '')}}!</li>
                        <li>U bespaart {{number_format($action->discount, 1, ',', '')}}%!</li>
                        <li>Nu voor maar €{{number_format($action->new_price, 2, ',', '')}}!</li>
                    </ul>
                    </p>
                </div>
                <small class="article-date">Gepubliceerd op {{$action->created_at}}</small>
            </div>
        </article>
    </main>
@endsection
