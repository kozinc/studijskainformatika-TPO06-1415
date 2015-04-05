@extends('app')

@section('content')
    <h2>Študijski programi</h2>

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

        @foreach($programi as $program)
            <tr>
                <td>{{ $program->id }}</td>
                <td><a href="programi/{{ $program->id }}">{{ $program->ime }}</a></td>
                <td>{{ $program->oznaka }}</td>
                <td>{{ $program->stopnja }}</td>
                <td>{{ $program->trajanje_leta }}</td>
                <td>{{ $program->stevilo_semestrov }}</td>
                <td>{{ $program->KT }}</td>
                <td>{{ $program->klasius_srv }}</td>
            </tr>
        @endforeach
    </table>
@endsection