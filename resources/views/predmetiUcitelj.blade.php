@extends('app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3 style="color: #005580">Predmeti nosilca {{$ucitelj->ime}} {{$ucitelj->priimek}} ({{$ucitelj->id}})</h3></div>
        <div class="panel-body">

        <table class="table">
            <tr>
                <th>Šifra predmeta</th>
                <th>Ime predmeta</th>
                <th>Seznam študentov</th>
            </tr>
            @foreach($predmeti->get() as $predmet)
                <tr>
                    <td>{{$predmet->sifra}}</td>
                    <td>{{$predmet->naziv}}</td>
                    <td>
                        <a href="{{ action('PredmetiUciteljController@vrniStudente',['id'=>$predmet->id]) }}">Klikni za ogled</a>
                    </td>
                </tr>
            @endforeach
        </table>

        </div>
    </div>
@endsection