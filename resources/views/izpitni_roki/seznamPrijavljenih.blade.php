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
            <a class="btn btn-default" href="{{ action('IzpitniRokController@izpisiSeznam',['id'=>$izpit_id, 'izvoz'=>1, 'status'=>0]) }}">PDF</a>
            <a class="btn btn-default" href="{{ action('IzpitniRokController@izpisiSeznam',['id'=>$izpit_id, 'izvoz'=>2, 'status'=>0]) }}">CSV</a>
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
        <a class="btn btn-default" href="{{ action('IzpitniRokController@vnesiRezultat',['id'=>$izpit_id]) }}">Vnesi rezultate</a>
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
                    <th>Vpisna št.</th>
                    <th>Priimek in ime</th>
                    <th>Štud. leto</th>
                    <th>Št. vseh</th>
                    <th>Št. letos</th>
                    <th>Plačilo</th>
                    <th></th>
                </tr>
                @foreach($studentje as $student)
                    <tr>
                        <td> {{$student->vpisna}} </td>
                        <td> {{$student->priimek}} {{$student->ime}} </td>
                        <td> {{ substr($student->st_leto, 0, 5). substr($student->st_leto, 7, 9)}} </td>
                        <td> {{$student->st_vseh}} </td>
                        <td> {{$student->st_letos}} </td>
                        <td> {{$student->placilo}} </td>
                        <td><a class="btn btn-info" href="{{ action('IzpitniRokController@vrniPrijavo',['id'=>$izpit_id, 'id_studenta'=>$student->id, 'view'=>1]) }}" onclick="if(!confirm('Ste prepričani, da želite vrniti prijavo na izpitni rok študentu {{ $student->ime }} {{ $student->priimek }} z vpisno številko {{ $student->vpisna }} ?')){return false;};">VP</a></td>
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