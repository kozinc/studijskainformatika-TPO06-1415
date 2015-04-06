@extends('appLogin')

@section('content')
    <div class="form-group"  style="width:300px; margin: auto; margin-top: 200px">
        {!! Form::open(array('action' => 'LoginController@login_handler')) !!}
            <div class="form-group">
                {!! Form::label('username', 'E-mail:') !!}
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
            <a href="/password/email" class="btn btn-default">Pozabil Geslo?</a>
        {!! Form::close() !!}
    </div>
@endsection