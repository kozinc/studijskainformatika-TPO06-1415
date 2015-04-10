@extends('app')

@section('content')
    <div>
        <p>Ime: {{ $student->ime }}</p>
        <p>Priimek: {{ $student->priimek }}</p>
        <p>Spol: {{ $student->spol }}</p>
        <p>Telefon: {{ $student->telefon }}</p>
        <p>Email: {{ $student->email }}</p>
        <p>Naslov: {{ $student->naslov }}</p>
        <p>Pošta: {{ $student->posta }}</p>
    </div>

    <a class="btn btn-danger" href="{{ action('StudentController@novZeton',['id'=>$student->id]) }}">Ustvari nov žeton</a>


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
            <th>Stanje</th>
            <th>Urejanje</th>
            <th>Elektronski indeks</th>
        </tr>
    @endif
    @foreach($studentProgrami as $sp)
        <tr>
            <td>{{ $sp->studijsko_leto }}</td>
            <td>{{ $sp->studijski_program->ime }}</td>
            <td>{{ $sp->letnik }}</td>
            <td>{{ $sp->nacin_studija }}</td>
            <td>
                @if(is_null($sp->vloga_oddana))
                    Vloga še ni oddana
                @elseif(is_null($sp->vloga_potrjena))
                    Vloga ni potrjena
                @else
                    Vloga je potrjena
                @endif
            </td>
            <td>
                @if($sp->studijsko_leto > date('Y',strtotime('-1 year')))
                    <a href="{{ action('VpisniListReferentController@prikaziStudenta',['id'=>$sp->id_studenta]) }}">Uredi žeton</a>
                @endif
            </td>
            <td><a href="{{ action('StudentController@elektronskiIndeks', ['idStudenta'=>$sp->id_studenta, 'idStudentPredmet'=>$sp->id]) }}">Elektronski indeks</a></td>
        </tr>

    @endforeach
    </table>
@endsection