@extends('app')

@section('content')
    <div class="form-group" style="width:90%; margin: auto; margin-top: 100px">

        <h3>Seznam prijavljenih na izpit</h3>
        <p>Predmet: [{{$predmet->sifra}}] {{$predmet->naziv}}</p>
        <p>Izpraševalci: {{$nosilci}}</p>
        <p>Datum in ura: {{$datum}} ob {{ $ura  }}h</p>
        <p>Prostor: {{$prostor}}</p>
        <br><br>
        <a class="btn btn-default" href="{{ action('IzpitniRokController@vnesiOcene',['id'=>$izpit_id]) }}">Vnesi ocene</a>
        @if (Session::has('seznam_alert'))
            @if (Session::get('seznam_alert') != "")
                <div class="alert alert-info">{{ Session::get('seznam_alert') }}</div>
                <br/>
            @endif
        @endif
        <br/><br/>
        @if($studentje != '')
            <table class="table table-hover">
                <tr>
                    <th></th>
                    <th>Vpisna številka</th>
                    <th>Priimek in ime</th>
                    <th>Študijsko leto poslušanja</th>
                    <th>Število polaganj</th>
                    <th>Število točk</th>
                    <th>Ocena</th>
                    <th></th>
                    <th></th>
                </tr>
                @foreach($studentje as $student)
                    <tr>
                        <td> {{$student->vpisna}} </td>
                        <td> {{$student->priimek}} {{$student->ime}} </td>
                        <td> {{$student->st_leto}} </td>
                        <td><a class="btn btn-info" href="{{ action('IzpitniRokController@vrniPrijavo',['id'=>$izpit_id, 'id_studenta'=>$student->id]) }}" onclick="if(!confirm('Ste prepričani, da želite vrniti prijavo na izpitni rok študentu {{ $student->ime }} {{ $student->priimek }} z vpisno številko {{ $student->vpisna }} ?')){return false;};">VP</a></td>
                    </tr>
                @endforeach
            </table>
            <script>
                var tables = document.getElementsByTagName('table');
                var table = tables[tables.length - 1];
                var rows = table.rows;
                for(var i = 1, td; i < rows.length; i++){
                    td = document.createElement('td');
                    td.appendChild(document.createTextNode(i));
                    rows[i].insertBefore(td, rows[i].firstChild);
                }
            </script>
        @endif
    </div>
@endsection