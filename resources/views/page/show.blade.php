@extends('layouts.public')

@section('title', $page->title)

@section('content')
    <main>
        <article>
            <header style="background-image: url('{{$page->image_path}}')">
                <div class="header-overlay">
                    <h1 class="header-title">{{$page->title}}</h1>
                    <p class="header-subtitle">{{$page->subtitle}}</p>
                </div>
            </header>

            @if($page->children()->exists())
                <div class="link-bar">
                    <div class="container">
                        @foreach($page->children as $child)
                            <a href="{{url('/pagina/'.$child->id)}}">{{$child->title}}</a>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="container">
                <div class="content">
                    @if($page->parent()->exists())
                        <small class="breadcrumbs">
                            <a href="{{url('/pagina/'.$parent->id)}}">{{$parent->title}}</a>
                            <span class="breadcrumbs-caret"> > </span>
                            <a href="{{url('/pagina/'.$page->id)}}">{{$page->title}}</a>
                        </small>
                    @endif
                    @markdown($page->content)
                </div>
            </div>
        </article>
    </main>
@endsection
