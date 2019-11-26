@extends('layouts.admin')

@section('title', 'Nieuwe categorie')

@section('content')
    <h1>Nieuwe categorie</h1>
    <form action="/admin/activiteit-categorie/new" method="POST">
        @method('POST')
        @include('admin.activity_category.form')
        <button type="submit">Aanmaken</button>
    </form>
@endsection
