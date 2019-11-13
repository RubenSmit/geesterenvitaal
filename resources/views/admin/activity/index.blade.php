@extends('layouts.admin')

@section('title', 'Alle activiteiten\'s')

@section('content')
    <h1>Alle activiteiten</h1>
    <a href="/admin/activiteit/new">Nieuwe activiteit maken</a>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Titel</th>
            <th>Subtitel</th>
            <th>Starttijd</th>
            <th>Eindtijd</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($activities as $activity)
            <tr>
                <th scope="row"><a href="/activiteit/{{$activity->id}}" target="_blank">{{$activity->id}}</a></th>
                <td>{{$activity->title}}</td>
                <td>{{$activity->subtitle}}</td>
                <td>{{$activity->start_time}}</td>
                <td>{{$activity->end_time}}</td>
                <td>
                    <a href="/admin/activiteit/{{$activity->id}}">Bewerken</a>
                    <form action="/admin/activiteit/{{$activity->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" onclick="return confirm('Weet je zeker dat je de activiteit \'{{$activity->title}}\' wilt verwijderen?')">Verwijderen</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
