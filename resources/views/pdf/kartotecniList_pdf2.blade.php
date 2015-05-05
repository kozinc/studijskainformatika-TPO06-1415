<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-študij FRI</title>

    <script src="{{ asset('js/jquery-te-1.4.0.min.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    <style>
        h1, h2, h3, h4, h5, h6 {
            font-family:  DejaVu Sans;
        }
        p, div {
            font-family: DejaVu Sans;
        }

    </style>

</head>

<body>

<div class="panel panel-default">
    <div class="panel-heading"><h3 style="color: #005580">Kartotečni list osebe {{$student->ime}} {{$student->priimek}} ({{$student->vpisna}})</h3></div>
    <div class="panel-body">

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
                    <br><br><hr>
                    <table class="vsaPolaganjaT table">
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
                                        {{$trenutniDatum=$student->polaganja()->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()}}
                                        @if($trenutniDatum!=null)
                                            {{$trenutniDatum=$trenutniDatum->datum}}
                                        @endif
                                        @foreach ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum') as $datumIzpita)
                                            @if ($datumIzpita->datum <= $trenutniDatum)
                                                {{$stevec++}}
                                            @endif
                                        @endforeach
                                    </div>
                                    <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':date('d.m.Y',strtotime($student->polaganja()->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()->datum))}}</td>
                                    <td>{{$stevec}}</td>
                                    <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->count()}}</td>
                                    @if ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first() != null)
                                        @if ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena > 5)
                                            <div style="display:none">{{$kt=$kt+$predmet->predmet->KT}}{{$ktSkupaj=$ktSkupaj+$predmet->predmet->KT}}</div>
                                            <div style="display:none">{{$ocena=$ocena+$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena}}{{$ocenaSkupaj=$ocenaSkupaj+$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena}}{{$stevilo++}}{{$steviloSkupaj++}}</div>
                                        @endif
                                    @endif
                                    <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->first()) == null)?'':$student->polaganja()->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()->pivot->ocena}}</td>
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

                                            <div style="display:none">
                                                {{$stevec = 0}}
                                                {{$trenutniDatum=$student->polaganja()->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()}}
                                                @if($trenutniDatum!=null)
                                                    {{$trenutniDatum=$trenutniDatum->datum}}
                                                @endif
                                                @foreach ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get() as $datumIzpita)
                                                    @if ($datumIzpita->datum <= $trenutniDatum && $polaganje->datum >= $datumIzpita->datum)
                                                        {{$stevec++}}
                                                    @endif
                                                @endforeach
                                            </div>
                                            <td>{{$stevec}}</td>
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
        <br><br><hr>
        <div class="panel-footer">
            Skupno število KT: {{$ktSkupaj}} <br><br>
            Skupna povprečna ocena:  {{($steviloSkupaj==0)?'':number_format((float)($ocenaSkupaj/$steviloSkupaj), 3, '.', '')}}
        </div>
        <br>

    </div>
</div>
</body>
</html>