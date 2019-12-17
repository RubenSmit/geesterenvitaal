@extends('layouts.admin')

@section('title', 'Alle acties\'s')

@section('content')
    <h1>Categorieën</h1>
    <a href="/admin/actie-categorie/new">Nieuwe categorie maken</a>
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
                    <a href="/admin/actie-categorie/{{$category->id}}">Bewerken</a>
                    @if($category->actions_count == 0)
                        <form action="/admin/actie-categorie/{{$category->id}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit"
                                    onclick="return confirm('Weet je zeker dat je de categorie \'{{$category->name}}\' wilt verwijderen?')">
                                Verwijderen
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <h1>Acties</h1>
    <a href="/admin/actie/new">Nieuwe actie maken</a>
    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Titel</th>
            <th>Categorie</th>
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
                <td>{{$action->category->name}}</td>
                <td>{{$action->old_price}}</td>
                <td>{{$action->new_price}}</td>
                <td>{{$action->points_required}}</td>
                <td class="table-options">
                    <a href="/admin/actie/{{$action->id}}">Bewerken</a>
                    <form action="/admin/actie/{{$action->id}}" method="POST" >
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                                onclick="return confirm('Weet je zeker dat je de actie \'{{$action->title}}\' wilt verwijderen?')">Verwijderen
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
