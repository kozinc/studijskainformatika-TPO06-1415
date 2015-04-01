@extends('app')

@section('content')

    <div class="panel panel-default">
    <div class="panel-heading">
        <h2> {{$predmet->naziv }}</h2>

    </div>

    <div class="panel-body">
        {{ $predmet->opis }}
    </div>

    <div>
        {{ $predmet->nosilec->ime }} {{ $predmet->nosilec->priimek }}
    </div>

    <div>
        {{ $predmet->id }}
    </div>
    <div>
        {{ $predmet->KT }}
    </div>
    </div>

    <table class="table">
        <tr>
            <th>Šifra</th>
            <th>Ime</th>
            <th>Tip</th>
            <th>Nosilec</th>
        </tr>

        <tr>
            <td>{{ $predmet->id }}</td>
            <td>{{ $predmet->naziv }}</td>
            <td>{{ $predmet->tip }}</td>
            <td>{{ $predmet->nosilec->ime }} {{$predmet->nosilec->priimek}}</td>
        </tr>

    </table>
@endsection