@extends('layouts.app')

@section('title', $page->title)

@section('content')
    <h1>{{$page->title}}</h1>
    <small>{{$page->created_at}}</small>
    <p>{{$page->content}}</p>
@endsection
