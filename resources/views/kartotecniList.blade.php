@extends('app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3 style="color: #005580">Kartotečni list osebe {{$student->ime}} {{$student->priimek}} ({{$student->vpisna}})</h3></div>
        <div class="panel-body">
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" id="zadnjePolaganje" class="btn btn-default">Samo zadnje polaganje</button>
                <button type="button" id="vsaPolaganja" class="btn btn-default">Vsa polaganja izpitov</button>
            </div><br><br>
            <div style="display:none">{{$ktSkupaj=0}}{{$ocenaSkupaj=0}}{{$steviloSkupaj=0}}</div>
            @foreach($programi as $program)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Šolsko leto {{ $program->studijsko_leto }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Program: {{ $program->studijski_program->ime }} <br><br>
                                Letnik: {{ $program->letnik }}.  <br><br>
                                Vrsta vpisa: {{ $program->vrstaVpisa->ime }}  <br><br>
                                Način študija: {{ $program->nacin_studija }}
                            </div>
                        </div>

                        <table class="zadnjePolaganjeT table">
                            <tr>
                                <th>Šifra predmeta</th>
                                <th>Ime predmeta</th>
                                <th>Nosilec [šifra]</th>
                                <th>KT</th>
                                <th>Datum polaganja</th>
                                <th>Polaganje</th>
                                <th>Polaganje v {{$program->studijsko_leto}}</th>
                                <th>Ocena</th>
                            </tr>
                            <div style="display:none">{{$kt=0}}{{$ocena=0}}{{$stevilo=0}}</div>
                            @foreach($predmeti->get() as $predmet)
                                @if($predmet->studijsko_leto == $program->studijsko_leto)
                                    <tr>
                                        <td>{{$predmet->predmet->sifra}}</td>
                                        <td>{{$predmet->predmet->naziv}}</td>
                                        <td>
                                            {{$predmet->predmet->nosilec->ime}} {{$predmet->predmet->nosilec->priimek.' ['.$predmet->predmet->id_nosilca.']'}}
                                            {{($predmet->predmet->nosilec2==null)?'':', '.($predmet->predmet->nosilec2->ime)}}
                                            {{($predmet->predmet->nosilec2==null)?'':' '.($predmet->predmet->nosilec2->priimek).' ['.$predmet->predmet->id_nosilca2.']'}}
                                            {{($predmet->predmet->nosilec3==null)?'':', '.($predmet->predmet->nosilec3->ime)}}
                                            {{($predmet->predmet->nosilec3==null)?'':' '.($predmet->predmet->nosilec3->priimek).' ['.$predmet->predmet->id_nosilca3.']'}}
                                        </td>
                                        <td>{{$predmet->predmet->KT}}</td>
                                        <div style="display:none">
                                            {{$stevec = 0}}
                                            {{$trenutniDatum=$student->polaganja()->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()->datum}}
                                            @foreach ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum') as $datumIzpita)
                                                @if ($datumIzpita <= $trenutniDatum)
                                                    {{$stevec++}}
                                                @endif
                                            @endforeach
                                        </div>
                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':date('d.m.Y',strtotime($student->polaganja()->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()->datum))}}</td>
                                        <td>{{$stevec}}</td>
                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->count()}}</td>
                                        @if ($predmet->ocena>5)
                                            <div style="display:none">{{$kt=$kt+$predmet->predmet->KT}}{{$ktSkupaj=$ktSkupaj+$predmet->predmet->KT}}</div>
                                            <div style="display:none">{{$ocena=$ocena+$predmet->ocena}}{{$ocenaSkupaj=$ocenaSkupaj+$predmet->ocena}}{{$stevilo++}}{{$steviloSkupaj++}}</div>
                                        @endif
                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()->pivot->ocena}}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </table>

                        <table class="vsaPolaganjaT table" style="display:none">
                            <tr>
                                <th>Šifra predmeta</th>
                                <th>Ime predmeta</th>
                                <th>Nosilec [šifra]</th>
                                <th>KT</th>
                                <th>Datum polaganja</th>
                                <th>Polaganje</th>
                                <th>Polaganje v {{$program->studijsko_leto}}</th>
                                <th>Ocena</th>
                            </tr>
                            <div style="display:none">{{$kt=0}}{{$ocena=0}}{{$stevilo=0}}</div>
                            @foreach($predmeti->get() as $predmet)
                                @if($predmet->studijsko_leto == $program->studijsko_leto)
                                    <tr>
                                        <td>{{$predmet->predmet->sifra}}</td>
                                        <td>{{$predmet->predmet->naziv}}</td>
                                        <td>
                                            {{$predmet->predmet->nosilec->ime}} {{$predmet->predmet->nosilec->priimek.' ['.$predmet->predmet->id_nosilca.']'}}
                                            {{($predmet->predmet->nosilec2==null)?'':', '.($predmet->predmet->nosilec2->ime)}}
                                            {{($predmet->predmet->nosilec2==null)?'':' '.($predmet->predmet->nosilec2->priimek).' ['.$predmet->predmet->id_nosilca2.']'}}
                                            {{($predmet->predmet->nosilec3==null)?'':', '.($predmet->predmet->nosilec3->ime)}}
                                            {{($predmet->predmet->nosilec3==null)?'':' '.($predmet->predmet->nosilec3->priimek).' ['.$predmet->predmet->id_nosilca3.']'}}
                                        </td>
                                        <td>{{$predmet->predmet->KT}}</td>
                                        <div style="display:none">
                                            {{$stevec = 0}}
                                            {{$trenutniDatum=$student->polaganja()->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()->datum}}
                                            @foreach ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum') as $datumIzpita)
                                                @if ($datumIzpita <= $trenutniDatum)
                                                    {{$stevec++}}
                                                @endif
                                            @endforeach
                                        </div>
                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':date('d.m.Y',strtotime($student->polaganja()->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()->datum))}}</td>
                                        <td>{{$stevec}}</td>
                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->count()}}</td>

                                        @if ($predmet->ocena>5)
                                            <div style="display:none">{{$kt=$kt+$predmet->predmet->KT}}{{$ktSkupaj=$ktSkupaj+$predmet->predmet->KT}}</div>
                                            <div style="display:none">{{$ocena=$ocena+$predmet->ocena}}{{$ocenaSkupaj=$ocenaSkupaj+$predmet->ocena}}{{$stevilo++}}{{$steviloSkupaj++}}</div>
                                        @endif
                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()->pivot->ocena}}</td>
                                    </tr>

                                    <div style="display:none">{{$i=$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->count()}}</div>
                                    <div style="display:none">{{$j=(($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'0':$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->count()}}</div>
                                    @foreach($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum') as $polaganje)
                                        @if ($i != $student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->count())
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{date('d.m.Y',strtotime($polaganje->datum))}}</td>
                                                <td>{{$i}}</td>
                                                <td>{{($j==0)?'':$j}}</td>
                                                <td>{{$polaganje->pivot->ocena}}</td>
                                            </tr>
                                        @endif
                                        <div style="display:none">{{$i--}}{{$j--}}</div>
                                    @endforeach
                                @endif
                            @endforeach
                        </table>

                        <div class="panel panel-default">
                            <div class="panel-body">
                                Povprečna ocena: {{($stevilo==0)?'':number_format((float)($ocena/$stevilo), 3, '.', '')}}<br><br>
                                Število KT: {{$kt}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="panel-footer">
                Skupno število KT: {{$ktSkupaj}} <br><br>
                Skupna povprečna ocena:  {{($steviloSkupaj==0)?'':number_format((float)($ocenaSkupaj/$steviloSkupaj), 3, '.', '')}}
            </div>
            <br>
            <form action="{{ action('KartotecniListController@export') }}" method="post">
                <input class="btn" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input class="btn" type="submit" name="csv" value="Izvozi CSV">
                <input class="btn" type="submit" name="pdf" value="Izvozi PDF">
            </form>

        </div>
    </div>
@endsection