@extends('layouts.app')

@section('title', 'Nieuwe activiteit')

@section('content')
    <h1>Nieuwe activiteit</h1>
    <form action="/admin/activiteit/new" method="POST">
        @method('POST')
        @include('activity.form')
        <button type="submit">Aanmaken</button>
    </form>
@endsection
