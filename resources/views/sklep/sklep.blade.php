@extends('app')

@section('content')
    @if(isset($sklep))
        <h2>Sklep številka {{ $sklep->id }}</h2>
    @endif
    @if($errors->any())
        <div class="alert alert-danger" role="alert">
            {{$errors->first()}}
        </div>
    @endif
    @if(session()->has('odgovor'))
        <div class="alert alert-success" role="alert">
            {{ session('odgovor') }}
        </div>
    @endif
    <div>
        <h3>Študent: {{ $student->ime.' '.$student->priimek }}</h3>
    </div>
    <form class="form" action="@if(isset($sklep)){{ action('SklepController@update', ['idSklepa'=>$sklep->id, 'idStudenta'=>$student->id]) }}@else {{ action('SklepController@store', ['idStudenta'=>$student->id]) }}@endif" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
            <label for="datum">Datum</label>
            <br>
            <input type="text" id="datum" name="datum" value="{{ date('d.m.Y') }}">
        </div>


        <div class="form-group">
            <label for="vsebina">Vsebina</label>
            <br>
            <textarea class="form-cotrol" rows="10" cols="100" name="vsebina" id="vsebina">@if(isset($sklep)){{ $sklep->vsebina }}@endif</textarea>
        </div>
        <input type="submit" name="save" value="Shrani">
        <input type="submit" name="delete" value="Izbriši">
    </form>
@endsection