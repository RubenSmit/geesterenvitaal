@extends('layouts.admin')

@section('title', 'Nieuwe actie')

@section('content')
    <h1>Nieuwe actie</h1>
    <form action="/admin/actie/new" method="POST" enctype="multipart/form-data">
        @method('POST')
        @include('admin.action.form')
        <button type="submit">Aanmaken</button>
    </form>
@endsection
