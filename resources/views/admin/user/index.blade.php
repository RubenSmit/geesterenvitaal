@extends('layouts.admin')

@section('title', 'Alle gebruikers')

@section('content')
    <h1>Alle gebruikers</h1>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Naam</th>
            <th>Email</th>
            <th>Aangemaakt</th>
            <th>Geverifiëerd</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
