@extends('layouts.app')

@section('title', 'Alle activiteiten\'s')

@section('content')
    <h1>Alle pagina's</h1>
    @foreach ($activity as $activity)
        <p>
            <a href="/admin/activiteit/{{$activity->id}}">{{$activity->title}}</a>
        </p>
    @endforeach
@endsection
