@extends('app')

@section('content')

    <table class="table exportable">
        <caption>Predmetnik</caption>
        <tr>
            <th>Šifra</th>
            <th>Ime</th>
            <th>Nosilec</th>
            <th>KT</th>
        </tr>
        @foreach($predmeti as $predmet)
            <tr>
                <td>{{ $predmet->id }}</td>
                <td><a href="{{ action('PredmetController@show',['id'=>$predmet->id]) }}">{{ $predmet->naziv }}</a></td>
                <td>{{ $predmet->nosilec->ime }} {{$predmet->nosilec->priimek}}</td>
                <td>{{ $predmet->KT }}</td>
            </tr>
        @endforeach
    </table>
    <a href="{{ action('PredmetController@seznamVpisanih',['id'=>$predmet->id, 'studijskoLeto'=>date('Y').'-'.date('Y',strtotime('+1 year'))]) }}" class="btn btn-default">Seznam vpisanih</a>
    <form action="{{ action('PredmetController@export') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="target" value="predmeti">
        <input type="submit" name="csv" value="Izvozi CSV">
        <input type="submit" name="pdf" value="Izvozi PDF">
    </form>
@endsection