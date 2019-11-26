@extends('layouts.admin')

@section('title', $action_category->name)

@section('content')
    <h1>Actie Categorie "{{$action_category->name}}" bewerken</h1>
    <form action="/admin/actie-categorie/{{$action_category->id}}" method="POST">
        @method('PATCH')
        @include('admin.action_category.form')
        <button type="submit">Opslaan</button>
    </form>
@endsection
