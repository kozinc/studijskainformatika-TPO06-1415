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
    <div>
        <a class="btn btn-default" href="{{ $program->id }}/predmetnik">Predmetnik</a>
        <a class="btn btn-default" href="{{ action('StudijskiProgramController@editPredmetnik', ['id'=>$program->id]) }}">Sprememni</a>
    </div>




@endsection