@extends('layouts.admin')

@section('title', 'Alle acties\'s')

@section('content')
    <h1>Alle acties</h1>
    <a href="/admin/actie/new">Nieuwe actie maken</a>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Titel</th>
            <th>Starttijd</th>
            <th>Eindtijd</th>
            <th>Oude prijs</th>
            <th>Nieuwe prijs</th>
            <th>Benodigd aantal punten</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($actions as $action)
            <tr>
                <th scope="row"><a href="/actie/{{$action->id}}" target="_blank">{{$action->id}}</a></th>
                <td>{{$action->title}}</td>
                <td>{{$action->start_time}}</td>
                <td>{{$action->end_time}}</td>
                <td>{{$action->old_price}}</td>
                <td>{{$action->new_price}}</td>
                <td>{{$action->points_required}}</td>
                <td>
                    <a href="/admin/actie/{{$action->id}}">Bewerken</a>
                    <form action="/admin/actie/{{$action->id}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" onclick="return confirm('Weet je zeker dat je de actie \'{{$action->title}}\' wilt verwijderen?')">Verwijderen</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
