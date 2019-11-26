@extends('layouts.admin')

@section('title', 'Nieuwe categorie')

@section('content')
    <h1>Nieuwe categorie</h1>
    <form action="/admin/actie-categorie/new" method="POST">
        @method('POST')
        @include('admin.action_category.form')
        <button type="submit">Aanmaken</button>
    </form>
@endsection
