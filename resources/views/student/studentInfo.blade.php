@extends('app')

@section('content')
    <form class="form" action="" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="id" value="{{ $student->id }}">

        <label for="ime">Ime:</label>
        <input type="text" id="ime" name="ime" value="{{ $student->ime }}">

        <label for="priimek">Priimek:</label>
        <input type="text" name="priimek" id="priimek" value="{{ $student->priimek }}">


    </form>
    <table class="table">
        <caption>Programi</caption>
    @if(empty($studentProgrami))
        <tr>
            <td>Študent ni bil vpisan v noben program.</td>
        </tr>
    @else
        <tr>
            <th>Študijsko leto</th>
            <th>Naziv programa</th>
            <th>Letnik</th>
            <th>Način študija</th>
            <th>Elektronski indeks</th>
        </tr>
    @endif
    @foreach($studentProgrami as $sp)
        <tr>
            <td>{{ $sp->studijsko_leto }}</td>
            <td>{{ $sp->studijski_program->ime }}</td>
            <td>{{ $sp->letnik }}</td>
            <td>{{ $sp->nacin_studija }}</td>
            <td><a href="{{ action('StudentController@elektronskiIndeks', ['idStudenta'=>$sp->id_studenta, 'idStudentPredmet'=>$sp->id]) }}">Elektronski indeks</a></td>
        </tr>

    @endforeach
    </table>
@endsection