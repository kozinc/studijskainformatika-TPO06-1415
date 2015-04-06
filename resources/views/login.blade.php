@extends('appLogin')

@section('content')
    @if(isset($msg))
        <div class="panel panel-primary">
            {{ $msg }}
        </div>
    @endif
    <div class="form-group"  style="width:300px; margin: auto; margin-top: 200px">
        {!! Form::open(array('action' => 'LoginController@login_handler')) !!}
            <div class="form-group">
                {!! Form::label('username', 'Vpisna številka:') !!}
                {!! Form::text('username', null, array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Geslo:') !!}
                {!! Form::text('password', null, array('class' => 'form-control')) !!}
            </div>
            @if (Session::has('error'))
                <div class="alert alert-info">{{ Session::get('error') }}</div>
            @endif
            {!! Form::submit('Prijava', array('class' => 'btn btn-danger')) !!}
            <input type="submit" name="password-reset" class="btn btn-default" value="Pozabil Geslo?">
        {!! Form::close() !!}
    </div>
@endsection