@extends('app')

@section('content')
    <div class="form-group" style="width:90%; margin: auto; margin-top: 100px">

        <h3>Seznam prijavljenih na izpit</h3>
        <p>Predmet: [{{$predmet->sifra}}] {{$predmet->naziv}}</p>
        <p>Izpraševalci: {{$nosilci}}</p>
        <p>Datum in ura: {{$datum}} ob {{ $ura  }}h</p>
        <p>Prostor: {{$prostor}}</p>
        <br><br>
        @if(!empty($studentje))
            <span class="label label-default">Seznam prijavljenih kandidatov</span>
            <a class="btn btn-default" href="{{ action('IzpitniRokController@izpisiSeznam',['id'=>$izpit_id, 'izvoz'=>2, 'status'=>0]) }}">CSV</a>
            <a class="btn btn-default" href="{{ action('IzpitniRokController@izpisiSeznam',['id'=>$izpit_id, 'izvoz'=>1, 'status'=>0]) }}">PDF</a>
            <br>
            <span class="label label-default">Izpis seznama z rezultati pisnega dela izpita</span>
            <a class="btn btn-default" href="{{ action('IzpitniRokController@izpisiSeznam',['id'=>$izpit_id, 'izvoz'=>3, 'status'=>0]) }}">PDF</a>
            <a class="btn btn-default" href="{{ action('IzpitniRokController@izpisiSeznam',['id'=>$izpit_id, 'izvoz'=>4, 'status'=>0]) }}">PDF brez imen</a>
            <a class="btn btn-default" href="{{ action('IzpitniRokController@izpisiSeznam',['id'=>$izpit_id, 'izvoz'=>5, 'status'=>0]) }}">CSV</a>
            <br>
            <span class="label label-default">Izpis seznama s končnimi ocenami</span>
            <a class="btn btn-default" href="{{ action('IzpitniRokController@izpisiSeznam',['id'=>$izpit_id, 'izvoz'=>6, 'status'=>0]) }}">PDF</a>
            <a class="btn btn-default" href="{{ action('IzpitniRokController@izpisiSeznam',['id'=>$izpit_id, 'izvoz'=>7, 'status'=>0]) }}">PDF brez imen</a>
            <a class="btn btn-default" href="{{ action('IzpitniRokController@izpisiSeznam',['id'=>$izpit_id, 'izvoz'=>8, 'status'=>0]) }}">CSV</a>
        @endif
        <br/><br/>
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
                        {!! Form::open(array('action' => 'IzpitniRokController@shraniOceno')) !!}
                        {!! Form::hidden('id_studenta', $student->id) !!}
                        {!! Form::hidden('id_izpita', $izpit_id) !!}
                        <td> {{$student->vpisna}} </td>
                        <td> {{$student->priimek}} {{$student->ime}} </td>
                        <td> {{$student->st_leto}} </td>
                        <td> {{$student->st_polaganj}} </td>
                        <td>{!! Form::text('tocke', $student->st_tock); !!}</td>
                        <td>{!! Form::select('ocene', ['/', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10'], $student->ocena, array('class' => 'btn btn-default dropdown-toggle')) !!}</td>
                        <td>{!! Form::submit('Shrani', array('class' => 'btn btn-danger'))!!}</td>
                        <td><a class="btn btn-info" href="{{ action('IzpitniRokController@vrniPrijavo',['id'=>$izpit_id, 'id_studenta'=>$student->id]) }}" onclick="if(!confirm('Ste prepričani, da želite vrniti prijavo na izpitni rok študentu {{ $student->ime }} {{ $student->priimek }} z vpisno številko {{ $student->vpisna }} ?')){return false;};">VP</a></td>
                        {!! Form::close() !!}
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