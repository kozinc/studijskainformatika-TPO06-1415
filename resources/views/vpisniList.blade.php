@extends('app')

@section('content')
    <div class="form-group"  style="width:300px; margin: auto; margin-top: 200px">
        {!! Form::open(array('action' => 'VpisniListController@vpisniList_handler')) !!}
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
        {!! Form::close() !!}
    </div>
@endsection