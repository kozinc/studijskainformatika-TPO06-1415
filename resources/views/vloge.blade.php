@extends('app')

@section('content')
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
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Student</th>
            <th>Program</th>
            <th>Letnik</th>
            <th>Predmetnik</th>
            <th>Vrsta vpisa</th>
            <th>Nacin studija</th>
            <th>Studijsko leto</th>
            <th>Vloga oddana</th>
            <th>Vloga potrjena</th>
            <th>Stanje</th>
        </tr>

        @foreach($vloge as $vloga)
            <tr>
                <td>{{ $vloga->id }}</td>
                <td><a href="{{ action('StudentController@show', ['id'=>$vloga->student->id]) }}">{{ $vloga->student->ime }} {{ $vloga->student->priimek }}</a></td>
                <td><a href="{{ action('StudijskiProgramController@show', ['id'=>$vloga->studijski_program->id])}}">{{ $vloga->studijski_program->ime }}</a></td>
                <td>{{ $vloga->letnik }}</td>
                <td><a href="{{ action('StudentController@predmetnik', ['id'=>$vloga->student->id]) }}">Ogled predmetnika</a></td>
                <td>{{ $vloga->vrstaVpisa->ime }}</td>
                <td>{{ $vloga->nacin_studija }}</td>
                <td>{{ $vloga->studijsko_leto }}</td>
                <td>{{ $vloga->vloga_oddana }}</td>
                <td>{{ $vloga->vloga_potrjena }}</td>
                <td>
                    @if(!is_null($vloga->vloga_oddana) && is_null($vloga->vloga_potrjena))
                        <a href="{{ action('VpisniListController@potrdiVlogo', ['id'=>$vloga->id]) }}">Potrdi</a>
                    @elseif(is_null($vloga->vloga_oddana))
                        <p>Vloga ni oddana</p>
                    @else
                        <p>Potrjeno</p>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>

@endsection