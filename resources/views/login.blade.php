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
                {!! Form::label('username', 'E-mail:') !!}
                {!! Form::text('username', null, array('class' => 'form-control')) !!}
            </div>
            <div class="form-group">
                <label for="password">Geslo:</label>
                <input type="password" id="password" name="password" class="form-control" value="">
            </div>
            @if (Session::has('error'))
                <div class="alert alert-info">{{ Session::get('error') }}</div>
            @endif
            {!! Form::submit('Prijava', array('class' => 'btn btn-danger')) !!}
            <input type="submit" name="password-reset" class="btn btn-default" value="Pozabil Geslo?"><br><br>
            Ob kliku na 'Pozabil geslo?' se vam na zgoraj napisani email pošlje novo geslo.
        {!! Form::close() !!}
    </div>
@endsection