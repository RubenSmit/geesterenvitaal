@extends('layouts.admin')

@section('title', 'Alle uitdagingen\'s')

@section('content')
    <h1>Alle uitdagingen</h1>
    <a href="/admin/uitdaging/new">Nieuwe uitdaging maken</a>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Titel</th>
            <th>content</th>
            <th>start_time</th>
            <th>end_time</th>
            <th>location_name</th>
            <th>location_address</th>
            <th>registration_url</th>
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
                <td>{{$challenge->content}}</td>
                <td>{{$challenge->start_time}}</td>
                <td>{{$challenge->end_time}}</td>
                <td>{{$challenge->location_name}}</td>
                <td>{{$challenge->location_address}}</td>
                <td>{{$challenge->registration_url}}</td>
                <td>{{$challenge->latitude}}</td>
                <td>{{$challenge->longitude}}</td>
                <td><a href="/admin/uitdaging/{{$challenge->id}}">Bewerken</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
