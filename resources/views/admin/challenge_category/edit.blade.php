@extends('layouts.admin')

@section('title', challenge_category->name)

@section('content')
    <h1>Actie Categorie "{{challenge_category->name}}" bewerken</h1>
    <form action="/admin/uitdaging-categorie/{{challenge_category->id}}" method="POST">
        @method('PATCH')
        @include('admin.challenge_category.form')
        <button type="submit">Opslaan</button>
    </form>
@endsection
