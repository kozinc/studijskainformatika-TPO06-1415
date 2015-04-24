@extends('app')

@section('content')

    <form class="form" id="iskalnik_studentov_form" action="{{ action('StudentController@search') }}" method="post">
        <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

        <input type="text"  name="iskalnik_studentov" id="iskalnik_studentov" placeholder="Vpiši vpisno ali ime...">
        <input type="submit" value="Poisci">
    </form>
    <br>
    <table class="table table-hover">
        <tr>
            <th>Vpisna</th>
            <th>Ime</th>
            <th>Priimek</th>
            <th>Email</th>
            <th>Telefonska številka</th>
            <th>Kartotečni list</th>
            <th></th>
        </tr>
        @if(isset($studenti))
            @foreach($studenti as $student)
                <tr>
                    <td><a href="{{ action('StudentController@show',['id'=>$student->id]) }}">{{ $student->vpisna }}</a></td>
                    <td><a href="{{ action('StudentController@show',['id'=>$student->id]) }}">{{ $student->ime }}</a></td>
                    <td><a href="{{ action('StudentController@show',['id'=>$student->id]) }}">{{ $student->priimek }}</a></td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->telefon }}</td>
                    <td><a href="{{ action('KartotecniListController@prikazKartotecniList',['id'=>$student->id]) }}">Klikni za ogled</a></td>
                    <td><a href="{{ action('ListStudentsController@getPotrdilo',['id'=>$student->id]) }}">Natisni potrdilo o vpisu</a></td>
                </tr>
            @endforeach
        @endif
    </table>

@endsection