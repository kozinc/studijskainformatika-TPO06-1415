@extends('app')

@section('content')

    <h2>{{ $program->ime }}</h2>

    @for($i=1; $i<=$program->trajanje_leta; $i++)
        <h3>{{ $i.'. letnik' }}</h3>
        @foreach($ptogram->predmeti as $predmet)
            @if($predmet->pivot->letnik == $i)
                <select name="{{ $i.'-letnik' }}">

                </select>
            @endif
        @endforeach

        @foreach($predmeti as $predmet)
            <select>
                <o
            </select>
        @endforeach
    @endfor
@endsection