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
                <td>{{ $predmet->nosilec->ime }} {{$predmet->nosilec->priimek}}

                    <?php
                        if ($predmet->id_nosilca2 > 0) {
                            $ime2 = $predmet->nosilec2->ime;
                            $priimek2 = $predmet->nosilec2->priimek;
                            echo ", $ime2 $priimek2";
                        }
                        if ($predmet->id_nosilca3 > 0) {
                            $ime3 = $predmet->nosilec3->ime;
                            $priimek3 = $predmet->nosilec3->priimek;
                            echo ", $ime3 $priimek3";
                        }
                    ?>

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