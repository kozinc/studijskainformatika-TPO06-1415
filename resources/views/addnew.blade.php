@extends('app')

@section('content')

    <div class="form-group" style="width:300px; margin: auto; margin-top: 200px">
        {!! Form::open(array('action' => 'AddStudentsController@addFromText', 'files' => true)) !!}
            <label for="exampleInputFile">Vnesi nove študente iz tekstovne datoteke</label>
            <br/><br/>
            {!! Form::file('file') !!}
            <p class="help-block"> IME 30 znakov </p>
            <p class="help-block"> PRIIMEK 30 znakov </p>
            <p class="help-block"> PROGRAM 7 znakov </p>
            <p class="help-block"> E_MAIL 30 znakov </p>
            <br/>
            {!! Form::submit('Dodaj v bazo', array('class' => 'btn btn-default')) !!}
        {!! Form::close() !!}
        <br/>
        @if (Session::has('debug'))
            <div class="alert alert-info">{{ Session::get('debug') }}</div>
        @endif
    </div>
@endsection