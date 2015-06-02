@extends('app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading"><h3 style="color: #005580">Stanje Vpisa</h3></div>
    <div class="panel-body">
        {!! Form::open(array('action' => 'StanjeVpisaController@StanjeVpisaZaPredmeteShow')) !!}
        {!! Form::select('leta', $leta, $leto_id, array('class' => 'btn btn-default dropdown-toggle')) !!}
        <br/><br/>

        {!! Form::select('letniki', $letniki, $letnik_id, array('class' => 'btn btn-default dropdown-toggle')) !!}
        <br/><br/>
        {!! Form::select('studProgrami', $studProgrami, $id_programa, array('class' => 'btn btn-default dropdown-toggle')) !!}
        <br/><br/>
        {!! Form::submit('Izpiši študente', array('class' => 'btn btn-danger')) !!}
        <input type="submit" class="btn" name="csv" value="Izvoz v CSV">
        <input type="submit" class="btn" name="pdf" value="Izvoz v PDF">
        {!! Form::close() !!}


        @if($stStudentov != '')
            <!-- Prikaz izbranih kriterijev -->
        <br/>
            <p/> Leto: {{ $leta[$leto_id] }} <p/>
            <p/> Letnik:
            {{ ($letnik_id==0) ? 'Ne glede' :  $letniki[$letnik_id].'.letnik'  }}
            <p/>
            <p/> <!-- Stud_Prog_ID: {{ $id_programa }} --> Študijski program: {{ $studProgrami[$id_programa] }} <p/>
        <br/>
            <h3> Število predmetov: {{count($stStudentov)}}</h3>
        <br/>
            <!-- Prikaz podatkov za predmete -->
            <table class="table table-hover">
                <tr>
                    <th><!--Zaporedna številka--></th>
                    <th>Šifra</th>
                    <th>Predmet</th>
                    <th>Nosilec</th>

                    <th>Študijsko leto</th>
                    <th>Letnik</th>
                    <th>Študijski program</th>

                    <th>Število vpisanih</th>
                </tr>
                <div style="display: none">{{$zaporedna=0}}</div>
                @foreach($stStudentov as $s)
                    <tr>
                        <div style="display: none">{{ $zaporedna++ }}</div>
                        <td>{{$zaporedna}}</td>
                        <td>{{ isset($predmeti->find($s->id_predmeta)->sifra) ? $predmeti->find($s->id_predmeta)->sifra : "Error" }}</td>
                        <td>{{ isset($predmeti->find($s->id_predmeta)->naziv) ? $predmeti->find($s->id_predmeta)->naziv : "Error" }} </td>
                        <th>{{ isset($predmetNosilec->find($s->id_predmeta)->nosilec->ime) ? $predmetNosilec->find($s->id_predmeta)->nosilec->ime : "Error Nosilec1" }}
                            {{ isset($predmetNosilec->find($s->id_predmeta)->nosilec->priimek) ? $predmetNosilec->find($s->id_predmeta)->nosilec->priimek : "Error Nosilec1" }}
                            {{ isset($predmetNosilec->find($s->id_predmeta)->nosilec2->ime) ? ', '.$predmetNosilec->find($s->id_predmeta)->nosilec2->ime.' '.$predmetNosilec->find($s->id_predmeta)->nosilec2->priimek : "" }}
                            {{ isset($predmetNosilec->find($s->id_predmeta)->nosilec3->ime) ? ', '.$predmetNosilec->find($s->id_predmeta)->nosilec2->ime.' '.$predmetNosilec->find($s->id_predmeta)->nosilec3->priimek : "" }}

                        </th>
                        <td>{{ $s->studijsko_leto }}</td>
                        <td>{{ ($s->letnik==0) ? '' : $s->letnik.'.letnik'  }}</td>
                        <td>{{ $studProgrami[$s->id_programa] }}</td>
                        <td>{{ $s->total}}</td>
                    </tr>
                @endforeach

            </table>
        @endif

    </div>
</div>
@endsection



























