@extends('app')

@section('content')
    <div class="form-group" style="width:500px; margin: auto; margin-top: 200px">
        {!! Form::open(array('action' => 'ListStudentsController@getStudents')) !!}
            {!! Form::select('predmeti', $predmeti, $predmet_id) !!}
            <br/><br/>
            {!! Form::select('leta', $leta, $leto_id) !!}
            <br/><br/>
            {!! Form::submit('Izpiši študente', array('class' => 'btn btn-danger')) !!}
        {!! Form::close() !!}
        <br/><br/>

        @if($student_list != '')
        <table class="table">
            <tr>
                <th>Šifra</th>
                <th>Vpisna številka</th>
                <th>Ime</th>
                <th>Vrsta vpisa</th>
            </tr>
            @foreach($student_list as $s)
                <tr>
                    <td>{{ $s->id }}</td>
                    <td>{{ $s->vpisna }}</td>
                    <td>{{ $s->ime }} {{ $s->priimek }}</td>
                    <td>{{ $s->vrstavpisa }}</td>
                </tr>
            @endforeach
        </table>
        @endif
    </div>
@endsection