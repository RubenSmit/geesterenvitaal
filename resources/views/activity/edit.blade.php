@extends('layouts.app')

@section('title', $activity->title)

@section('content')
    <h1>Activiteit "{{$activity->title}}" bewerken</h1>

    <form action="/admin/activiteit/{{$activity->id}}" method="POST">
        @method('PATCH')
        @include('activity.form')
        <button type="submit">Opslaan</button>
    </form>

@endsection
