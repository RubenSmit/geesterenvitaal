@extends('layouts.admin')

@section('title', $challenge->title)

@section('content')
    <h1>Uitdaging "{{$challenge->title}}" bewerken</h1>
    <form action="/admin/uitdaging/{{$challenge->id}}" method="POST">
        @method('PATCH')
        @include('admin.challenge.form')
        <button type="submit">Opslaan</button>
    </form>
@endsection
