@extends('app')

@section('content')

    <div class="form-group"  style="width:500px; margin: auto; margin-top: 200px">

        <label>{{ $opis }}</label>
        <br><br>

        {!! Form::open(array('action' => 'IzbirniPredmetController@spremeniIzbirnePredmete')) !!}
        {!! Form::select('modul1', $moduli, $modul1_id, array('class' => 'btn btn-default dropdown-toggle')) !!}
        <br> <br>
        {!! Form::select('modul2', $moduli, $modul2_id, array('class' => 'btn btn-default dropdown-toggle')) !!}
        <br> <br>
        {!! Form::select('izbirni1', $prosto_izbirni, 0, array('class' => 'btn btn-default dropdown-toggle')) !!}
        <br> <br>
        {!! Form::select('izbirni2', $prosto_izbirni, 0, array('class' => 'btn btn-default dropdown-toggle')) !!}
        <br> <br>
        {!! Form::submit('Shrani', array('class' => 'btn btn-danger')) !!}
        {!! Form::close() !!}

    </div>

@endsection