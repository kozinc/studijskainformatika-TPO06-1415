@extends('app')

@section('content')

    <table class="table exportable">
        <tr>
            <th>Šifra</th>
            <th>Ime</th>
            <th>Nosilec</th>
            <th>KT</th>
        </tr>
        @foreach($predmeti as $predmet)
            <tr>
                <td>{{ $predmet->sifra }}</td>
                <td><a href="{{ action('PredmetController@show',['id'=>$predmet->id]) }}">{{ $predmet->naziv }}</a></td>
                <td>
                    {{$predmet->predmet->nosilec->ime}} {{$predmet->predmet->nosilec->priimek.' ['.$predmet->predmet->id_nosilca.']'}}
                    {{($predmet->predmet->nosilec2==null)?'':', '.($predmet->predmet->nosilec2->ime)}}
                    {{($predmet->predmet->nosilec2==null)?'':' '.($predmet->predmet->nosilec2->priimek).' ['.$predmet->predmet->id_nosilca2.']'}}
                    {{($predmet->predmet->nosilec3==null)?'':', '.($predmet->predmet->nosilec3->ime)}}
                    {{($predmet->predmet->nosilec3==null)?'':' '.($predmet->predmet->nosilec3->priimek).' ['.$predmet->predmet->id_nosilca3.']'}}

                </td>
                <td>{{ $predmet->KT }}</td>
            </tr>
        @endforeach
    </table>
    <form action="{{ action('PredmetController@export') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="target" value="predmeti">
        <input type="submit" name="csv" value="Izvozi CSV">
        <input type="submit" name="pdf" value="Izvozi PDF">
    </form>
@endsection