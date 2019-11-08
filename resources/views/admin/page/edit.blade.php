@extends('layouts.admin')

@section('title', $page->title)

@section('content')
    <h1>Pagina "{{$page->title}}" bewerken</h1>

    <form action="/admin/pagina/{{$page->id}}" method="POST">
        @method('PATCH')
        @include('admin.page.form')
        <button type="submit">Opslaan</button>
    </form>

@endsection
