@extends('app')

@section('content')
    <div class="form-group" style="width:90%; margin: auto; margin-top: 100px">

        <h3>Vnos rezultatov</h3>
        <p>Predmet: [{{$predmet->sifra}}] {{$predmet->naziv}}</p>
        <p>Izpraševalci: {{$nosilci}}</p>
        <p>Datum in ura: {{$datum}} ob {{ $ura  }}h</p>
        <p>Prostor: {{$prostor}}</p>
        <br><br>
        <a class="btn btn-default" href="{{ action('IzpitniRokController@izpisiSeznam',['id'=>$izpit_id, 'izvoz'=>0, 'status'=>0]) }}"> << Nazaj na seznam prijavljenih</a>
        @if (Session::has('seznam_alert'))
            @if (Session::get('seznam_alert') != "")
                <div class="alert alert-info">{{ Session::get('seznam_alert') }}</div>
                <br/>
            @endif
        @endif
        <br/><br/>
        @if($studentje != '')
            {!! Form::open(array('action' => 'IzpitniRokController@shraniRezultat')) !!}
            {!! Form::submit('Shrani', array('class' => 'btn btn-danger')) !!}<br/><br/>
            {!! Form::hidden('izpit_id', $izpit_id) !!}
            <table class="table table-hover">
                <tr>
                    <th></th>
                    <th>Vpisna št.</th>
                    <th>Priimek in ime</th>
                    <th>Štud. leto</th>
                    <th>Št. vseh</th>
                    <th>Št. letos</th>
                    <th>Rezultat</th>
                    <th></th>
                </tr>
                @foreach($studentje as $student)
                    <tr>
                        <td> {{$student->vpisna}} </td>
                        <td> {{$student->priimek}} {{$student->ime}} </td>
                        <td> {{ substr($student->st_leto, 0, 5). substr($student->st_leto, 7, 9) }} </td>
                        <td> {{$student->st_vseh}} </td>
                        <td> {{$student->st_letos}} </td>
                        {!! Form::hidden('id'.$student->id, $student->id) !!}
                        <td><div class="col-lg-3"><input type="text" id={{"rezultati".$student->id}} name={{"rezultati".$student->id}} value="" class="form-control"></div></td>
                        <td><a class="btn btn-info" href="{{ action('IzpitniRokController@vrniPrijavo',['id'=>$izpit_id, 'id_studenta'=>$student->id, 'view'=>3]) }}" onclick="if(!confirm('Ste prepričani, da želite vrniti prijavo na izpitni rok študentu {{ $student->ime }} {{ $student->priimek }} z vpisno številko {{ $student->vpisna }} ?')){return false;};">VP</a></td>
                    </tr>
                @endforeach
            </table>
            {!! Form::close() !!}
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