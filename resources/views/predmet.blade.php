@extends('app')

@section('content')
<<<<<<< HEAD

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

=======
>>>>>>> 2583c8480fe054be4386f5a71bf6ead22ffcef38
    <table class="table">
        <tr>
            <th>Šifra</th>
            <th>Ime</th>
            <th>Tip</th>
            <th>Nosilec</th>
            <th>Kreditne točke</th>
        </tr>

<<<<<<< HEAD
        <tr>
            <td>{{ $predmet->id }}</td>
            <td>{{ $predmet->naziv }}</td>
            <td>{{ $predmet->tip }}</td>
            <td>{{ $predmet->nosilec->ime }} {{$predmet->nosilec->priimek}}</td>
        </tr>
=======
            <tr>
                <td>{{ $predmet->id }}</td>
                <td>{{ $predmet->naziv }}</td>
                <td>{{ $predmet->tip }}</td>
                <td>{{ $predmet->nosilec->ime }} {{$predmet->nosilec->priimek}}</td>
                <td>{{ $predmet->KT }}</td>
            </tr>
>>>>>>> 2583c8480fe054be4386f5a71bf6ead22ffcef38

    </table>
@endsection