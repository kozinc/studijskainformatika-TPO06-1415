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

    <form action="{{ action('PredmetController@export') }}" method="post">
        <input class="btn" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input class="btn" type="hidden" name="target" value="predmet">
        <input class="btn" type="hidden" name="id" value="{{ $predmet->id }}">
        <a class="btn btn-default" href="{{ $predmet->id }}/edit">Spremeni</a>
        <input class="btn" type="submit" name="csv" value="Izvozi CSV">
        <input class="btn" type="submit" name="pdf" value="Izvozi PDF">
    </form>
@endsection