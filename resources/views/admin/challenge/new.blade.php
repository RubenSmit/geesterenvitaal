@extends('layouts.admin')

@section('title', 'Nieuwe uitdaging')

@section('content')
    <h1>Nieuwe uitdaging</h1>
    <form action="/admin/uitdaging/new" method="POST">
        @method('POST')
        @include('admin.challenge.form')
        <button type="submit">Aanmaken</button>
    </form>
@endsection
