@extends('app')

@section('content')
    <table class="table">
        <tr>
            <th>Šifra</th>
            <th>Ime</th>
            <th>Tip</th>
            <th>Nosilec</th>
            <th>Kreditne točke</th>
        </tr>

            <tr>
                <td>{{ $predmet->id }}</td>
                <td>{{ $predmet->naziv }}</td>
                <td>{{ $predmet->tip }}</td>
                <td>{{ $predmet->nosilec->ime }} {{$predmet->nosilec->priimek}}</td>
                <td>{{ $predmet->KT }}</td>
            </tr>

    </table>

    <a href="{{ $predmet->id }}/edit">Spremeni</a>
@endsection