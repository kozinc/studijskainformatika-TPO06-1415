@extends('app')

@section('content')
    <h3>{{ $student->ime }} {{ $student->priimek }}</h3>
    @if(!is_null($program))
        <p>Trenutno vpisan v : {{ $program->naziv }}</p>
    @else
        <p>Študent trenutno ni vpisan v noben program.</p>
    @endif

@endsection