@extends('app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading"><h3 style="color: #005580">Elektronski indeks študenta {{$student->ime}} {{$student->priimek}} ({{$student->vpisna}})</h3></div>
    <div class="panel-body">
        <div style="display:none">{{$ktSkupajSkupaj=0}}{{$ocenaSkupajSkupaj=0}}{{$steviloSkupajSkupaj=0}}{{$zaporednaTotal=0}}{{$stOprIzpit=0}}</div>
        @foreach($studProgrami as $stProg)
            <div class="panel panel-default panel-body">
                <div style="display:none">{{$stevilo=0}}{{$zaporedna=0}}{{$ktSkupaj=0}}{{$ocenaSkupaj=0}}{{$steviloSkupaj=0}}{{$zaporedna=0}}
                @foreach($programi as $program)
                    @if($stProg->id == $program->id_programa)
                        <div class="display:none">
                            <div style="display:none">{{$stevilo=0}}</div>
                            @foreach($predmeti->get() as $predmet)
                                @if($predmet->studijsko_leto == $program->studijsko_leto)
                                    <div style="display:none">
                                        {{$stevec = 0}}
                                        {{$trenutniDatum=$student->polaganja()
                                            ->where('studijsko_leto','=',$program->studijsko_leto)
                                            ->where('id_predmeta','=',$predmet->id_predmeta)
                                            ->get()->sortByDesc('datum')->first()}}
                                        @if($trenutniDatum!=null)
                                            {{$trenutniDatum=$trenutniDatum->datum}}
                                        @endif
                                        @foreach ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum') as $datumIzpita)
                                            @if ($trenutniDatum != null)
                                                @if ($datumIzpita->datum <= $trenutniDatum)
                                                    {{$stevec++}}
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                    @if($stevec >0 && ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena)>5)
                                        @if ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first() != null)
                                            @if($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena > 5)
                                                <div style="display:none">{{$stevilo++}}</div>
                                            @endif
                                        @endif
                                    @endif
                                @endif
                                <div style="display:none">{{$stevilo}}</div>
                            @endforeach
                        </div>
                    @endif
                @endforeach
                </div>
                @if($stevilo>0)
                    <h2>{{$stProg->ime}}</h2>

                    <form action="{{ action('ElektronskiIndeksController@export') }}" method="post">
                        <input class="btn" type="hidden" id="id_studenta" name="id_studenta" value={{$student->id}}>
                        <input class="btn" type="hidden" id="id_programa" name="id_programa" value={{$stProg->id}}>
                        <input class="btn" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input class="btn" type="submit" name="csv" value="Izvozi CSV">
                        <input class="btn" type="submit" name="pdf" value="Izvozi PDF">
                    </form>


                    <table class="table table-hover">
                        <tr>
                            <th></th>
                            <th>Šifra</th>
                            <th>Predmet</th>
                            <th>Ocenil</th>
                            <th>Letnik</th>
                            <th>Datum polaganja</th>
                            <th>Polaganje</th>
                            <th>KT</th>
                            <th>Ocena</th>
                        </tr>
                        @foreach($programi as $program)
                            @if($stProg->id == $program->id_programa)
                                <div class="panel-body">
                                    <div style="display:none">{{$kt=0}}{{$ocena=0}}{{$stevilo=0}}</div>
                                    @foreach($predmeti->get() as $predmet)
                                        @if($predmet->studijsko_leto == $program->studijsko_leto)
                                            <div style="display:none">
                                                {{$stevec = 0}}
                                                {{$trenutniDatum=$student->polaganja()
                                                    ->where('studijsko_leto','=',$program->studijsko_leto)
                                                    ->where('id_predmeta','=',$predmet->id_predmeta)
                                                    ->get()->sortByDesc('datum')->first()}}
                                                @if($trenutniDatum!=null)
                                                    {{$trenutniDatum=$trenutniDatum->datum}}
                                                @endif
                                                @foreach ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum') as $datumIzpita)
                                                    @if ($trenutniDatum != null)
                                                        @if ($datumIzpita->datum <= $trenutniDatum)
                                                            {{$stevec++}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </div>
                                            @if($stevec >0 && ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena)>5)
                                                <tr>
                                                    <div style="display:none">{{$stOprIzpit++}}</div>
                                                    @if ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first() != null)
                                                        @if($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena > 5)
                                                            <div style="display:none">{{$kt=$kt+$predmet->predmet->KT}}{{$ktSkupaj=$ktSkupaj+$predmet->predmet->KT}}{{$ktSkupajSkupaj=$ktSkupajSkupaj+$predmet->predmet->KT}}</div>
                                                            <div style="display:none">{{$ocena=$ocena+$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena}}{{$ocenaSkupaj=$ocenaSkupaj+$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena}}{{$ocenaSkupajSkupaj=$ocenaSkupajSkupaj+$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena}}{{$stevilo++}}{{$steviloSkupaj++}}{{$steviloSkupajSkupaj++}}</div>
                                                        @endif
                                                    @endif
                                                    <div style="display: none">{{$zaporedna++}}{{$zaporednaTotal++}}</div>
                                                    <td>{{$zaporedna}}</td>
                                                    <td>{{$predmet->predmet->sifra}}</td>
                                                    <td>{{$predmet->predmet->naziv}}</td>
                                                    <td>
                                                        {{$predmet->predmet->nosilec->ime}} {{$predmet->predmet->nosilec->priimek}}
                                                        {{($predmet->predmet->nosilec2==null)?'':', '.($predmet->predmet->nosilec2->ime)}}
                                                        {{($predmet->predmet->nosilec2==null)?'':' '.($predmet->predmet->nosilec2->priimek)}}
                                                        {{($predmet->predmet->nosilec3==null)?'':', '.($predmet->predmet->nosilec3->ime)}}
                                                        {{($predmet->predmet->nosilec3==null)?'':' '.($predmet->predmet->nosilec3->priimek)}}
                                                    </td>
                                                    <td>{{ $program->letnik }}.</td>


                                                    <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':date('d.m.Y',strtotime($student->polaganja()->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()->datum))}}</td>
                                                    <td>{{$stevec}}</td>


                                                    <td>{{$predmet->predmet->KT}}</td>
                                                    <td>{{$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena}}</td>
                                                </tr>
                                            @endif
                                        @endif
                                        <div style="display:none">{{$stevilo}}</div>
                                    @endforeach
                                </div>
                            @endif
                        @endforeach
                    </table>

                    <div class="panel-footer">
                        <div class="panel-body">
                            <h4>Povprečne ocene po študijskih letih za program</h4>
                            <table class="table table-hover">
                                <tr>
                                    <th>Študijsko leto</th>
                                    <th>Število opravljenih izpitov</th>
                                    <th>Kreditne točke</th>
                                    <th>Povprečna ocena</th>
                                </tr>
                                @foreach($programi as $program)
                                    @if($stProg->id == $program->id_programa)
                                        <div style="display:none">{{$kt=0}}{{$ocena=0}}{{$stevilo=0}}</div>
                                        <tr>
                                            @foreach($predmeti->get() as $predmet)
                                                @if($predmet->studijsko_leto == $program->studijsko_leto)
                                                    <div style="display:none">
                                                        {{$stOprIzpit++}}
                                                        {{$stevec = 0}}
                                                        {{$trenutniDatum=$student->polaganja()
                                                            ->where('studijsko_leto','=',$program->studijsko_leto)
                                                            ->where('id_predmeta','=',$predmet->id_predmeta)
                                                            ->get()->sortByDesc('datum')->first()}}
                                                        @if($trenutniDatum!=null)
                                                            {{$trenutniDatum=$trenutniDatum->datum}}
                                                        @endif
                                                        @foreach ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum') as $datumIzpita)
                                                            @if ($trenutniDatum != null)
                                                                @if ($datumIzpita->datum <= $trenutniDatum)
                                                                    {{$stevec++}}
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                    @if($stevec >0 && ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena)>5)
                                                        @if ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first() != null)
                                                            @if($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena > 5)
                                                                <div style="display:none">{{$kt=$kt+$predmet->predmet->KT}}</div>
                                                                <div style="display:none">{{$ocena=$ocena+$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena}}{{$stevilo++}}</div>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endif
                                                <div style="display:none">{{$stevilo}}</div>
                                            @endforeach
                                            <td>{{ $predmet->studijsko_leto }}</td>
                                            <td>{{$stevilo}}</td>
                                            <td>{{$kt}}</td>
                                            <td>{{($stevilo==0)?'':number_format((float)($ocena/$stevilo), 3, '.', '')}}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </table>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <div class="panel-body">
                            <h4>Skupna povprečna ocena</h4>
                            <table class="table table-hover">
                                <tr>
                                    <th>Število opravljenih izpitov</th>
                                    <th>Kreditne točke</th>
                                    <th>Skupna povprečna ocena</th>
                                </tr>
                                <tr>
                                    <td>{{$zaporedna}}</td>
                                    <td>{{$ktSkupaj}}</td>
                                    <td>{{($steviloSkupaj==0)?'':number_format((float)($ocenaSkupaj/$steviloSkupaj), 3, '.', '')}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach

        <br/>
        <br/>
        <div class="panel-footer">
            <div class="panel-body">
                <h4>Skupna povprečna ocena</h4>
                <table class="table table-hover">
                    <tr>
                        <th>Število opravljenih izpitov</th>
                        <th>Kreditne točke</th>
                        <th>Skupna povprečna ocena</th>
                    </tr>
                    <tr>
                        <td>{{$zaporednaTotal}}</td>
                        <td>{{$ktSkupajSkupaj}}</td>
                        <td>{{($steviloSkupajSkupaj==0)?'':number_format((float)($ocenaSkupajSkupaj/$steviloSkupajSkupaj), 3, '.', '')}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
    </div>
</div>
@endsection