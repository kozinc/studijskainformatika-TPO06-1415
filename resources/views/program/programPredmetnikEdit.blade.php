@extends('app')

@section('content')

    <h2>{{ $program->ime }}</h2>

    @for($i=1; $i<=$program->trajanje_leta; $i++)
        <h3>{{ $i.'. letnik' }}</h3>
        @foreach($ptogram->predmeti as $predmet)
            @if($predmet->pivot->letnik == $i)
                @P
            @endif
        @endforeach
        <select name="{{ $i.'.letnik' }}">

        </select>
    @endfor
@endsection