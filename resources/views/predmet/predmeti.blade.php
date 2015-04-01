@extends('app')

@section('content')

    <table class="table">
        <tr>
            <th>Šifra</th>
            <th>Ime</th>
            <th>Tip</th>
            <th>Nosilec</th>
        </tr>
        @foreach($predmeti as $predmet)
            <tr>
                <td>{{ $predmet->id }}</td>
                <td>{{ $predmet->naziv }}</td>
                <td>{{ $predmet->tip }}</td>
                <td>{{ $predmet->nosilec->ime }} {{$predmet->nosilec->priimek}}</td>
            </tr>
        @endforeach
    </table>
@endsection