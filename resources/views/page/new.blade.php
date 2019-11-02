@extends('layouts.app')

@section('title', 'Nieuwe pagina')

@section('content')
    <h1>Nieuwe pagina</h1>
    <form action="/admin/pagina/new" method="POST">
        @method('POST')
        @include('page.form')
        <button type="submit">Aanmaken</button>
    </form>
@endsection
