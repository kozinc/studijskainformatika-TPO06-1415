@extends('app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Podatki o študentu {{$student->ime}} {{$student->priimek}}</h3></div>
        <div class="panel-body">
            <div>
                <p>Vpisna številka: {{$student->vpisna}}</p>
                <p>Ime: {{ $student->ime }}</p>
                <p>Priimek: {{ $student->priimek }}</p>
                <p>Telefon: {{ $student->telefon }}</p>
                <p>Email: {{ $student->email }}</p>
                <p>Kartotečni list: <a href="{{ action('KartotecniListController@prikazKartotecniList',['id'=>$student->id]) }}">Klikni za ogled</a></p>
            </div>

            <hr>

            <table class="table">
                <h4>Sklepi</h4>
                <tr>
                    <th>Id</th>
                    <th>Datum</th>
                    <th>Organ</th>
                    <th>Vsebina</th>
                    @if (\Session::get('vloga') == "referent" )
                        <th>Uredi</th>
                    @endif
                </tr>
                @foreach($student->sklepi as $sklep)
                    <tr>
                        <td>{{ $sklep->id }}</td>
                        <td>{{ date('d.m.Y',strtotime($sklep->datum)) }}</td>
                        <td>{{ $sklep->organ->ime }}</td>
                        <td>{{ $sklep->vsebina }}</td>
                        @if (\Session::get('vloga') == "referent" )
                            <td><a href="{{ action('SklepController@edit', ['idStudenta'=>$student->id, 'idSklepa'=>$sklep->id]) }}">Uredi sklep</a></td>
                        @endif
                    </tr>
                @endforeach
            </table>
            @if (\Session::get('vloga') == "referent" )
                <a href="{{ action('SklepController@create',['idStudenta'=>$student->id]) }}" class="btn btn-danger">Nov sklep</a>
            @endif

            <hr>

            @if (\Session::get('vloga') == "referent" )
                <table class="table">
                    <h4>Programi</h4>
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
                                    Vloga še ni oddana.
                                @elseif(is_null($sp->vloga_potrjena))
                                    Vloga ni potrjena.
                                @else
                                    Vloga je potrjena.
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
                <a class="btn btn-danger" href="{{ action('StudentController@novZeton',['id'=>$student->id]) }}">Ustvari nov žeton</a>
        </div>
    </div>

            @elseif (\Session::get('vloga') == "ucitelj" )
                </div></div>

                <div class="panel panel-default">
                    <div class="panel-heading"><h3>Predmeti študenta {{$student->ime.' '.$student->priimek}} pri profesorju {{$ucitelj->ime.' '.$ucitelj->priimek}}</h3></div>
                    <div class="panel-body">
                        @if (!$predmeti->isEmpty())
                            @foreach($predmeti as $predmet)
                                <h4>Naziv predmeta: {{$predmet->predmet->naziv}}</h4>
                                <h4>Študijski program:
                                    @foreach($studentProgrami as $sp)
                                        @if ($sp->studijsko_leto == $predmet->studijsko_leto)
                                            {{$sp->studijski_program->ime}}</h4>
                                        @endif
                                    @endforeach
                                <h4>Študijsko leto: {{$predmet->studijsko_leto}}</h4>
                                <table class="table">
                                    <tr>
                                        <th width='200px'>Datum </th>
                                        <th width='200px'>Polaganje</th>
                                        <th width='200px'>Število točk izpita</th>
                                        <th width='200px'>Ocena</th>
                                        <th width='200px'>Vnos ocene</th>
                                    </tr>

                                    <?php $stevec=1; ?>

                                    @if ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortBy('datum')->isEmpty())
                                        <tr>
                                            <td>Pri predmetu še ni polaganj. </td>
                                        </tr>
                                    @else
                                        @foreach ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortBy('datum') as $polaganje)
                                            <tr>
                                                <td>{{date('d.m.Y',strtotime($polaganje->datum))}}</td>
                                                <td>{{$stevec++}}</td>
                                                <td>{{$polaganje->pivot->tocke_izpita}}</td>
                                                <td>{{$polaganje->pivot->ocena}}</td>
                                                @if ($polaganje->datum > date('Y-m-d',strtotime('-30 days')))
                                                    <td><a href="{{ action('PredmetiUciteljController@vnesiOceno',['id'=>$predmet->id_predmeta, 'id_studenta'=>$student->id]) }}">Vnos ocene</a></td>
                                                @else
                                                    <td>Vnos ocene ni mogoč.</td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @endif
                                </table><hr>
                            @endforeach
                            <p>Opozorilo: Ocene po pretečenih 30 dni od izpita ne morete več spreminjati.</p>
                        @else
                            <p>Študent pri tem profesorju še ni opravljal predmetov.</p>
                        @endif
                    </div>
                </div>

            @endif


@endsection