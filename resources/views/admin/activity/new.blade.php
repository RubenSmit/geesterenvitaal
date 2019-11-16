@extends('layouts.admin')

@section('title', 'Nieuwe activiteit')

@section('content')
    <h1>Nieuwe activiteit</h1>
    <form action="/admin/activiteit/new" method="POST" enctype="multipart/form-data">
        @method('POST')
        @include('admin.activity.form')
        <button type="submit">Aanmaken</button>
    </form>
@endsection
