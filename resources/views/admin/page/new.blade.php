@extends('layouts.admin')

@section('title', 'Nieuwe pagina')

@section('content')
    <h1>Nieuwe pagina</h1>
    <form action="/admin/pagina/new" method="POST" enctype="multipart/form-data">
        @method('POST')
        @include('admin.page.form')
        <button type="submit">Aanmaken</button>
    </form>
@endsection
