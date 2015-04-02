@extends('app')

@section('content')
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Ime</th>
            <th>Oznaka</th>
            <th>Stopnja</th>
            <th>Trajanje</th>
            <th>Število semestrov</th>
            <th>Kreditne točke</th>
            <th>Klasius srv</th>
        </tr>

        <tr>
            <td>{{ $program->id }}</td>
            <td>{{ $program->ime }}</td>
            <td>{{ $program->oznaka }}</td>
            <td>{{ $program->stopnja }}</td>
            <td>{{ $program->trajanje_leta }}</td>
            <td>{{ $program->stevilo_semestrov }}</td>
            <td>{{ $program->KT }}</td>
            <td>{{ $program->klasius_srv }}</td>
        </tr>
    </table>
    <a href="{{ action('StudijskiProgramController@edit_predmetnik', ['id'=>$program->id]) }}">Sprememni</a>
    <br>
    <a href="{{ $program->id }}/predmetnik">Predmetnik</a>

@endsection