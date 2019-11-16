@extends('layouts.admin')

@section('title', $action->title)

@section('content')
    <h1>Actie "{{$action->title}}" bewerken</h1>
    <form action="/admin/actie/{{$action->id}}" method="POST" enctype="multipart/form-data">
        @method('PATCH')
        @include('admin.action.form')
        <button type="submit">Opslaan</button>
    </form>
@endsection
