@extends('app')

@section('content')
    <div class="form-group" style="width:700px; margin: auto; margin-top: 150px">

        <p style="font-size: 20px">Seznam vpisanih v predmet</p>
        <br><br>
        {!! Form::open(array('action' => 'ListStudentsController@getStudents')) !!}
            {!! Form::select('predmeti', $predmeti, $predmet_id, array('class' => 'btn btn-default dropdown-toggle')) !!}
            <br/><br/>
            {!! Form::select('leta', $leta, $leto_id, array('class' => 'btn btn-default dropdown-toggle')) !!}
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
                <th>Zaporedna številka</th>
                <th>Vpisna številka</th>
                <th>Priimek in ime</th>
                <th>Vrsta vpisa</th>
            </tr>
            @foreach($student_list as $s)
                <tr>
                    <td>{{ $s->vpisna }}</td>
                    <td>{{ $s->priimek }} {{ $s->ime }} </td>
                    <td>{{ $vrsteVpisa->get($s->vrstavpisa)->ime }}</td>
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