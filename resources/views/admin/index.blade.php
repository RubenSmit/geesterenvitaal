@extends('layouts.admin')

@section('title', 'Home')

@section('content')
    <div class="container">
        <h1>Administratie interface</h1>
        <small>Ingelogd als {{ Auth::user()->name }}</small>
    </div>
@endsection
