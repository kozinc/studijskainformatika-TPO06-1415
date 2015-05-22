@extends('app')

@section('content')
    <div class="form-group" style="width:700px; margin: auto; margin-top: 150px">

        <p style="font-size: 20px">Seznam vpisanih po različnih kriterijih</p>
        @if($leto_id>0)
            <p/> Leto: {{ str_replace('/20','-',$leta[$leto_id]) }} <p/>
        @endif
        @if($letnik_id>0)
            <p/> Letnik:
            {{ $letniki[$letnik_id].'.letnik' }}
            <p/>
        @endif
        @if($id_programa>0)
            <p/> <!-- Stud_Prog_ID: {{ $id_programa }} --> Študijski program: {{ $studProgrami[$id_programa] }} <p/>
        @endif
        @if($vrsteVpisa_id>0)
            <p/> <!-- VrsteVpisa: {{ $vrsteVpisa_id }} --> Vrsta studija: {{ $vrsteVpisa[$vrsteVpisa_id] }} <p/>
        @endif
        @if($nacinStudija_id>0)
            <p/> <!-- NaciniStudija_ID: {{ $nacinStudija_id }} --> Način študija: {{ $naciniStudija[$nacinStudija_id] }} <p/>
        @endif
        @if($modul_id>0)
            <p/> <!-- Modul_ID: {{ $modul_id }} --> Modul: {{ $moduli[$modul_id] }} <p/>
        @endif
        {!! Form::open(array('action' => 'ListStudentsController@getAdvSeznam')) !!}
            {!! Form::select('leta', str_replace('/20','-',$leta), $leto_id, array('class' => 'btn btn-default dropdown-toggle')) !!}
            <br/><br/>

            {!! Form::select('letniki', $letniki, $letnik_id, array('class' => 'btn btn-default dropdown-toggle')) !!}
            <br/><br/>
            {!! Form::select('studProgrami', $studProgrami, $id_programa, array('class' => 'btn btn-default dropdown-toggle')) !!}
            <br/><br/>
            {!! Form::select('vrsteVpisa', $vrsteVpisa, $vrsteVpisa_id, array('class' => 'btn btn-default dropdown-toggle')) !!}
            <br/><br/>
            {!! Form::select('naciniStudija', $naciniStudija, $nacinStudija_id, array('class' => 'btn btn-default dropdown-toggle')) !!}
            <br/><br/>
            {!! Form::select('moduli', $moduli, $modul_id, array('class' => 'btn btn-default dropdown-toggle')) !!}
            <br/><br/>
            {!! Form::submit('Izpiši študente', array('class' => 'btn btn-danger')) !!}
        @if(!empty($student_list))
            <input type="submit" class="btn" name="csv" value="Izvoz v CSV">
            <input type="submit" class="btn" name="pdf" value="Izvoz v PDF">
         @endif
        {!! Form::close() !!}
        <br/><br/>

        @if($student_list != '')
        <table class="table table-hover">
            <tr>
                <th><!--Zaporedna številka--></th>
                <th>Vpisna številka</th>
                <th>Priimek in ime</th>
                <th>Študijsko leto</th>
                <th>Letnik</th>
                <th>Študijski program</th>
                <th>Vrsta vpisa</th>
                <th>Način študija</th>
            </tr>
            @foreach($student_list as $s)
                <tr>
                    <!--<td>{{ $s->zaporedna }}</td>-->
                    <td>{{ $s->vpisna }}</td>
                    <td>{{ $s->priimek }} {{ $s->ime }} </td>
                    <td>{{ str_replace('/20','-',$s->studijsko_leto)  }}</td>
                    <td>{{ $s->letnik  }}.letnik</td>
                    <td>{{ $studProgrami[$s->id_programa] }}</td>
                    <td>{{ $vrsteVpisa[$s->vrstavpisa] }}</td>
                    <td>{{ $s->nacinstudija }}</td>
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