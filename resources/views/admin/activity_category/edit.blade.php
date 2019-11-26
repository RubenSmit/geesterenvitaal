@extends('layouts.admin')

@section('title', $activity_category->title)

@section('content')
    <h1>Actie Categorie "{{$activity_category->name}}" bewerken</h1>

    <form action="/admin/activiteit-categorie/{{$activity_category->id}}" method="POST">
        @method('PATCH')
        @include('admin.activity_category.form')
        <button type="submit">Opslaan</button>
    </form>

@endsection
