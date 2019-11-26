@extends('layouts.admin')

@section('title', 'Alle uitdagingen\'s')

@section('content')
    <h1>Categorieën</h1>
    <a href="/admin/uitdaging-categorie/new">Nieuwe categorie maken</a>
    <table>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th></th>
        </tr>
        <tbody>
        @foreach ($categories as $category)
            <tr>
                <th scope="row">{{$category->id}}</th>
                <td>{{$category->name}}</td>
                <td>
                    <a href="/admin/uitdaging-categorie/{{$category->id}}">Bewerken</a>
                    <form action="/admin/uitdaging-categorie/{{$category->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" onclick="return confirm('Weet je zeker dat je de categorie \'{{$category->name}}\' wilt verwijderen?')">Verwijderen</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <h1>Alle uitdagingen</h1>
    <a href="/admin/uitdaging/new">Nieuwe uitdaging maken</a>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Titel</th>
            <th>location_name</th>
            <th>Categorie</th>
            <th>latitude</th>
            <th>longitude</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($challenges as $challenge)
            <tr>
                <th scope="row"><a href="/uitdaging/{{$challenge->id}}" target="_blank">{{$challenge->id}}</a></th>
                <td>{{$challenge->title}}</td>
                <td>{{$challenge->location_name}}</td>
                <td>{{$challenge->category->name}}</td>
                <td>{{$challenge->latitude}}</td>
                <td>{{$challenge->longitude}}</td>
                <td>
                    <a href="/admin/uitdaging/{{$challenge->id}}">Bewerken</a>
                    <form action="/admin/uitdaging/{{$challenge->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" onclick="return confirm('Weet je zeker dat je de uitdaging \'{{$challenge->title}}\' wilt verwijderen?')">Verwijderen</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
