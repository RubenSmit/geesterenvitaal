@extends('layouts.admin')

@section('title', 'Alle pagina\'s')

@section('content')
    <h1>Alle pagina's</h1>
    <a href="/admin/pagina/new">Nieuwe pagina maken</a>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Titel</th>
            <th>Subtitel</th>
            <th>Aangemaakt op</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($pages as $page)
            <tr>
                <th scope="row"><a href="/pagina/{{$page->id}}" target="_blank">{{$page->id}}</a></th>
                <td>{{$page->title}}</td>
                <td>{{$page->subtitle}}</td>
                <td>{{$page->created_at}}</td>
                <td>
                    <a href="/admin/pagina/{{$page->id}}">Bewerken</a>
                    <form action="/admin/pagina/{{$page->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" onclick="return confirm('Weet je zeker dat je de pagina \'{{$page->title}}\' wilt verwijderen?')">Verwijderen</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
