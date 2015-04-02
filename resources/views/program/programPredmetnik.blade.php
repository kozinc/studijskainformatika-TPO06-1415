
@extends('app')

@section('content')
    <h3>Predmetnik</h3>
    <table class="table">
        <tr>
            <th>Letnik</th>
            <th>Šifra</th>
            <th>Ime</th>
            <th>Tip</th>
            <th>Nosilec</th>
            <th>Kreditne točke</th>
        </tr>
        @foreach($program->predmeti as $predmet)
            <tr>
                <td>{{ $predmet->pivot->letnik }}</td>
                <td>{{ $predmet->id }}</td>
                <td><a href="{{ action('PredmetController@show', ['id'=>$predmet->id]) }}">{{ $predmet->naziv }}</a></td>
                <td>{{ $predmet->tip }}</td>
                <td>{{ $predmet->nosilec->ime }} {{$predmet->nosilec->priimek}}</td>
                <td>{{ $predmet->KT }}</td>
            </tr>
        @endforeach
    </table>

    <hr>
    <h3>Moduli</h3>
    <table class="table">
        <tr>
            <th>Letnik</th>
            <th>Ime</th>
        </tr>
        @foreach($program->moduli as $modul)
            <tr>
                <td>{{ $modul->pivot->letnik }}</td>
                <td>{{ $modul->ime }}</td>
            </tr>
        @endforeach
    </table>

@endsection