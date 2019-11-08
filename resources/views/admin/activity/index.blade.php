@extends('layouts.admin')

@section('title', 'Alle activiteiten\'s')

@section('content')
    <h1>Alle activiteiten</h1>
    @foreach ($activities as $activity)
        <p>
            <a href="/admin/activiteit/{{$activity->id}}">{{$activity->title}}</a>
        </p>
    @endforeach
@endsection
