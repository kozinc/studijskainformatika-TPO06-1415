@extends('app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            @include('response')
            <div>
                <h3>Študent: {{ $student->ime.' '.$student->priimek }}</h3>
            </div>
            <form class="form" action="@if(isset($sklep)){{ action('SklepController@update', ['idSklepa'=>$sklep->id, 'idStudenta'=>$student->id]) }}@else {{ action('SklepController@store', ['idStudenta'=>$student->id]) }}@endif" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label for="datum_izdaje">Datum izdaje</label>
                    <br>
                    <input type="text" id="datum_izdaje" name="datum_izdaje" value="{{ date('d.m.Y') }}">
                </div>
                <div class="form-group">
                    <label for="datum_veljavnosti">Datum veljavnosti</label>
                    <br>
                    <input type="text" id="datum_veljavnosti" name="datum_veljavnosti" value="@if(isset($sklep) && !is_null($sklep->datum_veljavnosti)){{ date('d.m.Y',strtotime($sklep->datum_veljavnosti)) }}@endif" placeholder="dd.mm.LLLL">
                </div>
                <div class="form-group">
                    <label for="organ">Organ</label>
                    <select id="organ" name="organ" class="form-control" style="width:20%;">
                        <option value="0">Izberi organ...</option>
                        @foreach($organi as $organ)
                            <option value="{{ $organ->id }}" @if(isset($sklep) && $sklep->id_organa == $organ->id){{ 'selected' }}@endif>
                                {{ $organ->ime }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="vsebina">Vsebina</label>
                    <br>
                    <textarea class="form-cotrol" rows="10" cols="100" name="vsebina" id="vsebina">@if(isset($sklep)){{ $sklep->vsebina }}@endif</textarea>
                </div>
                <input type="submit" class="" name="save" value="Shrani">
                <input type="submit" name="delete" value="Izbriši">
            </form>
            <br><br>
            <a href="{{ action('StudentController@show', ['id'=>$student->id]) }}" class="btn btn-danger">Nazaj</a>
        </div>
    </div>
@endsection