@extends('layouts.admin')

@section('title', $action->title)

@section('content')
    <h1>Activiteit "{{$action->title}}" bewerken</h1>
    <form action="/admin/actie/{{$action->id}}" method="POST">
        @method('PATCH')
        @include('admin.action.form')
        <button type="submit">Opslaan</button>
    </form>
@endsection
