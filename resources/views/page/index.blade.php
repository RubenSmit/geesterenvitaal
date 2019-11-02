@extends('layouts.app')

@section('title', 'Alle pagina\'s')

@section('content')
    <h1>Alle pagina's</h1>
    @foreach ($pages as $page)
        <p>
            <a href="/admin/pagina/{{$page->id}}">{{$page->title}}</a>
        </p>
    @endforeach
@endsection
