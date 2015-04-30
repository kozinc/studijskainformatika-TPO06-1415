@extends('app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3>Kartotečni list osebe {{$student->ime}} {{$student->priimek}} ({{$student->vpisna}})</h3></div>
        <div class="panel-body">
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" id="zadnjePolaganje" class="btn btn-default">Samo zadnje polaganje</button>
                <button type="button" id="vsaPolaganja" class="btn btn-default">Vsa polaganja izpitov</button>
            </div><br><br>
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
                                <th>Nosilci</th>
                                <th>KT</th>
                                <th>Datum polaganja</th>
                                <th>Zaporedno število polaganja</th>
                                <th>Zaporedno število polaganja v {{$program->studijsko_leto}}</th>
                                <th>Ocena</th>
                            </tr>
                            <div style="display:none">{{$kt=0}}{{$ocena=0}}{{$stevilo=0}}</div>
                            @foreach($predmeti->get() as $predmet)
                                @if($predmet->studijsko_leto == $program->studijsko_leto)
                                    <tr>
                                        <td>{{$predmet->predmet->sifra}}</td>
                                        <td>{{$predmet->predmet->naziv}}</td>
                                        <td>{{$predmet->predmet->nosilec->ime}} {{$predmet->predmet->nosilec->priimek}}</td>
                                        <td>{{$predmet->predmet->KT}}</td>
                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id)->first()) == null)?'':date('d.m.Y',strtotime($student->polaganja()->where('id_predmeta','=',$predmet->id)->get()->sortByDesc('datum')->first()->datum))}}</td>
                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id)->get()->sortByDesc('datum')->count()}}</td>
                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->count()}}</td>
                                        @if ($predmet->ocena!=0)
                                            <div style="display:none">{{$kt=$kt+$predmet->predmet->KT}}</div>
                                        @endif
                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id)->get()->sortByDesc('datum')->first()->pivot->ocena}}</td>
                                        <div style="display:none">{{$ocena=$ocena+$predmet->ocena}}{{$stevilo++}}</div>
                                    </tr>
                                @endif
                            @endforeach
                        </table>

                        <table class="vsaPolaganjaT table" style="display:none">
                            <tr>
                                <th>Šifra predmeta</th>
                                <th>Ime predmeta</th>
                                <th>Nosilci</th>
                                <th>KT</th>
                                <th>Datum polaganja</th>
                                <th>Zaporedno število polaganja</th>
                                <th>Zaporedno število polaganja v {{$program->studijsko_leto}}</th>
                                <th>Ocena</th>
                            </tr>
                            <div style="display:none">{{$kt=0}}{{$ocena=0}}{{$stevilo=0}}</div>
                            @foreach($predmeti->get() as $predmet)
                                @if($predmet->studijsko_leto == $program->studijsko_leto)
                                    <tr>
                                        <td>{{$predmet->predmet->sifra}}</td>
                                        <td>{{$predmet->predmet->naziv}}</td>
                                        <td>{{$predmet->predmet->nosilec->ime}} {{$predmet->predmet->nosilec->priimek}}</td>
                                        <td>{{$predmet->predmet->KT}}</td>
                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id)->first()) == null)?'':date('d.m.Y',strtotime($student->polaganja()->where('id_predmeta','=',$predmet->id)->get()->sortByDesc('datum')->first()->datum))}}</td>
                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id)->get()->sortByDesc('datum')->count()}}</td>
                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->count()}}</td>

                                        @if ($predmet->ocena!=0)
                                            <div style="display:none">{{$kt=$kt+$predmet->predmet->KT}}</div>
                                        @endif
                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id)->first()) == null)?'':$student->polaganja()->where('id_predmeta','=',$predmet->id)->get()->sortByDesc('datum')->first()->pivot->ocena}}</td>
                                        <div style="display:none">{{$ocena=$ocena+$predmet->ocena}}{{$stevilo++}}</div>
                                    </tr>

                                    <div style="display:none">{{$i=$student->polaganja()->where('id_predmeta','=',$predmet->id)->get()->sortByDesc('datum')->count()}}</div>
                                    <div style="display:none">{{$j=(($student->polaganja()->where('id_predmeta','=',$predmet->id)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'0':$student->polaganja()->where('id_predmeta','=',$predmet->id)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->count()}}</div>
                                    @foreach($student->polaganja()->where('id_predmeta','=',$predmet->id)->get()->sortByDesc('datum') as $polaganje)
                                        @if ($i != $student->polaganja()->where('id_predmeta','=',$predmet->id)->get()->sortByDesc('datum')->count())
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
                                Povprečna ocena: {{($stevilo==0)?'':($ocena/$stevilo)}}<br><br>
                                Število KT: {{$kt}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <form action="{{ action('KartotecniListController@export') }}" method="post">
                <input class="btn" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input class="btn" type="submit" name="csv" value="Izvozi CSV">
                <input class="btn" type="submit" name="pdf" value="Izvozi PDF">
            </form>

        </div>
    </div>
@endsection