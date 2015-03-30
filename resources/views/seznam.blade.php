@extends('app')

@section('content')
    <div class="form-group" style="width:300px; margin: auto; margin-top: 200px">
        {!! Form::select('predmet', $predmet, Input::old('predmet')) !!}}
    </div>
@endsection