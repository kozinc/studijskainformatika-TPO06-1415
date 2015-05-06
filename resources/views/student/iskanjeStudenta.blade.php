@extends('app')

@section('content')
    <div class="panel panel-default">

        @if($vnosOcene == 1)
            <div class="panel-heading">
                <h2 style="color: #005580">Seznam študentov</h2>
                <h3>Predmet: {{$predmet->naziv}}</h3>
                <h3>Študijsko leto: {{$studijsko_leto}}</h3>
            </div>
            <div class="panel-body">
        @else
            <div class="panel-body">
            <form class="form" id="iskalnik_studentov_form" action="{{ action('StudentController@search') }}" method="post">
                <input type="hidden" id="_token" name="_token" value="{{ csrf_token() }}">

                <input type="text"  name="iskalnik_studentov" id="iskalnik_studentov" placeholder="Vpiši vpisno ali ime...">
                <input type="submit" value="Poišči" >
            </form>
             <br>
        @endif

            <table class="table table-hover">
                <tr>
                    <th>Vpisna</th>
                    <th>Ime</th>
                    <th>Priimek</th>
                    <th>Email</th>
                    <th>Telefonska številka</th>
                    <th>Kartotečni list</th>
                    @if($vnosOcene == 1)
                        <th>Ocena</th>
                        <th>Točke izpita</th>
                    @else
                        <th></th>
                    @endif
                    <th></th>
                </tr>

                @if(isset($studenti) && $studenti != null)
                    @foreach($studenti as $student)
                        <tr>
                            <td><a href="{{ action('StudentController@show',['id'=>$student->id]) }}">{{ $student->vpisna }}</a></td>
                            <td><a href="{{ action('StudentController@show',['id'=>$student->id]) }}">{{ $student->ime }}</a></td>
                            <td><a href="{{ action('StudentController@show',['id'=>$student->id]) }}">{{ $student->priimek }}</a></td>
                            <td>{{ $student->email }}</td>
                            <td>{{ $student->telefon }}</td>
                            <td><a href="{{ action('KartotecniListController@prikazKartotecniList',['id'=>$student->id]) }}">Klikni za ogled</a></td>
                            @if((\Session::get('vloga')  == 'referent' ))
                                <td><a href="{{ action('ListStudentsController@getPotrdilo',['id'=>$student->id]) }}">Natisni potrdilo o vpisu</a></td>
                                <td><a href="{{ action('ListStudentsController@natisniVpisniList',['id'=>$student->id]) }}">Natisni vpisni list</a></td>
                            @elseif($vnosOcene == 1)
                                <td>{{ ((\App\Models\StudentPredmet::where('id_studenta','=',$student->id)->where('id_predmeta','=',$predmet->id)->where('studijsko_leto','=',$studijsko_leto)->first()->ocena) == null) ?'':(\App\Models\StudentPredmet::where('id_studenta','=',$student->id)->where('id_predmeta','=',$predmet->id)->where('studijsko_leto','=',$studijsko_leto)->first()->ocena)}}</td>
                                <td>{{(\App\Models\StudentPredmet::where('id_studenta','=',$student->id)->where('id_predmeta','=',$predmet->id)->where('studijsko_leto','=',$studijsko_leto)->first()->tocke_izpita==null)?'':\App\Models\StudentPredmet::where('id_studenta','=',$student->id)->where('id_predmeta','=',$predmet->id)->where('studijsko_leto','=',$studijsko_leto)->first()->tocke_izpita}}</td>
                                <td><a href="{{ action('PredmetiUciteljController@vnesiOceno',['id'=>$predmet->id, 'id_studenta'=>$student->id]) }}">Vnos ocene</a></td>
                            @endif
                        </tr>
                    @endforeach
                @endif
            </table>

        </div>
    </div>


@endsection