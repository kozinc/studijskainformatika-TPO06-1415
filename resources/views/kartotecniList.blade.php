@extends('app')
@section('content')
    <div class="panel panel-default">
        <div class="panel-heading"><h3 style="color: #005580">Kartotečni list osebe {{$student->ime}} {{$student->priimek}} ({{$student->vpisna}})</h3></div>
        <div class="panel-body">
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" id="zadnjePolaganje" class="btn btn-default">Samo zadnje polaganje</button>
                <button type="button" id="vsaPolaganja" class="btn btn-default">Vsa polaganja izpitov</button>
            </div><br><br>
            <?php
                $ktSkupaj=0;
                $ocenaSkupaj=0;
                $steviloSkupaj=0;
            ?>

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
                                <?php $i=1; ?>
                                @if(count($program->moduli($program->studijsko_leto,$program)->get()) == 0 && $program->letnik==3)
                                    <br><br>Modul 1: prosta izbira <br><br>
                                    Modul 2: prosta izbira
                                @endif
                                @foreach($program->moduli($program->studijsko_leto,$program)->get()as $modul)
                                    <br><br>{{ 'Modul '.$i.': '.$modul->ime }}
                                    <?php $i++;?>
                                @endforeach
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
                            <?php
                                $kt=0;
                                $ocena=0;
                                $stevilo=0;
                            ?>
                            @foreach($predmeti->get() as $predmet)
                                @if($predmet->studijsko_leto == $program->studijsko_leto)
                                    <tr>
                                        <td>{{$predmet->predmet->sifra}}</td>
                                        <td>{{$predmet->predmet->naziv}}</td>
                                        <td>
                                            {{$predmet->predmet->nosilec->ime}} {{$predmet->predmet->nosilec->priimek.' ['.$predmet->predmet->nosilec->id.']'}}
                                            {{($predmet->predmet->nosilec2==null)?'':', '.($predmet->predmet->nosilec2->ime)}}
                                            {{($predmet->predmet->nosilec2==null)?'':' '.($predmet->predmet->nosilec2->priimek).' ['.$predmet->predmet->id_nosilca2.']'}}
                                            {{($predmet->predmet->nosilec3==null)?'':', '.($predmet->predmet->nosilec3->ime)}}
                                            {{($predmet->predmet->nosilec3==null)?'':' '.($predmet->predmet->nosilec3->priimek).' ['.$predmet->predmet->id_nosilca3.']'}}
                                        </td>
                                        <td>{{$predmet->predmet->KT}}</td>
                                        <?php
                                            $stevec = 0;
                                            $trenutniDatum=$student->polaganja()->whereNull('datum_odjave')->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first();
                                            if($trenutniDatum!=null)
                                            {
                                                $trenutniDatum=$trenutniDatum->datum;
                                            }
                                            foreach ($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum') as $datumIzpita)
                                            {
                                                if ($trenutniDatum != null)
                                                {
                                                    if ($datumIzpita->datum <= $trenutniDatum)
                                                    {
                                                        $stevec++;
                                                    }
                                                }
                                            }
                                        ?>
                                        <?php
                                            $brez_polaganja = 0;
                                            //preverjanje za oceno brez polaganja
                                            $datum_zadnjega_vnosa = \App\Models\StudentPredmet::where('id_studenta','=',$student->id)->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->first()->datum_vnosa_ocene;
                                            $datum_vnosa_zadnjega_polaganja = $student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first();
                                            if (($datum_vnosa_zadnjega_polaganja != null) && ($datum_zadnjega_vnosa != null))
                                            {
                                                $datum_vnosa_zadnjega_polaganja = \DB::table('student_izpit')->where('id_studenta','=',$student->id)->where('id_izpitnega_roka','=',$datum_vnosa_zadnjega_polaganja->id)->first()->datum_vnosa_ocene;
                                                if ($datum_vnosa_zadnjega_polaganja != "0000-00-00")
                                                {
                                                    if ($datum_zadnjega_vnosa > $datum_vnosa_zadnjega_polaganja)
                                                    {
                                                        $brez_polaganja = 1;
                                                        $stevec++;
                                                    }
                                                }
                                            }
                                        ?>

                                        @if (($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null && $datum_zadnjega_vnosa != null)
                                            <td></td>
                                        @else
                                            @if($brez_polaganja == 0)
                                                <td>{{date('d.m.Y',strtotime($student->polaganja()->whereNull('datum_odjave')->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()->datum))}}</td>
                                            @else
                                                <td>{{date('d.m.Y',strtotime($datum_zadnjega_vnosa))}}*</td>
                                            @endif
                                        @endif

                                        <td>{{$stevec}}</td>

                                        @if($brez_polaganja == 0)
                                            <td>{{(($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':$student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->count()}}</td>
                                        @else
                                            <td>{{(($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':$student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->count() + 1}}</td>
                                        @endif

                                        <?php
                                        if (\App\Models\StudentPredmet::where('id_studenta','=',$student->id)->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->first() != null)
                                        //if ($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first() != null)
                                        {
                                            //if($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena > 5)
                                            $ocenaTemp = \App\Models\StudentPredmet::where('id_studenta','=',$student->id)->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->first()->ocena;

                                            if ($ocenaTemp > 5)
                                            {

                                                $kt=$kt+$predmet->predmet->KT;
                                                $ktSkupaj=$ktSkupaj+$predmet->predmet->KT;
                                                //$ocena=$ocena+$student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena;
                                                $ocena = $ocena + $ocenaTemp;
                                                //$ocenaSkupaj=$ocenaSkupaj+$student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena;
                                                $ocenaSkupaj = $ocenaSkupaj + $ocenaTemp;
                                                $stevilo++;
                                                $steviloSkupaj++;

                                            }

                                        }
                                        ?>
                                        @if($brez_polaganja == 0)
                                            <td>{{(($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':(($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena == 0)?'':$student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena)}}</td>
                                        @else
                                            <td>{{$ocenaTemp}}</td>
                                        @endif
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
                            <?php
                                $kt=0;
                                $ocena=0;
                                $stevilo=0;
                            ?>
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
                                        <?php
                                            $stevec = 0;
                                            $trenutniDatum=$student->polaganja()->whereNull('datum_odjave')->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first();
                                            if($trenutniDatum!=null)
                                            {
                                                $trenutniDatum=$trenutniDatum->datum;
                                            }
                                            foreach ($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum') as $datumIzpita)
                                            {
                                                if ($datumIzpita->datum <= $trenutniDatum)
                                                {
                                                    $stevec++;
                                                }
                                            }
                                        ?>
                                        <?php
                                        $brez_polaganja = 0;
                                        //preverjanje za oceno brez polaganja
                                        $datum_zadnjega_vnosa = \App\Models\StudentPredmet::where('id_studenta','=',$student->id)->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->first()->datum_vnosa_ocene;
                                        $datum_vnosa_zadnjega_polaganja = $student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first();
                                        if (($datum_vnosa_zadnjega_polaganja != null) && ($datum_zadnjega_vnosa != null))
                                        {
                                            $datum_vnosa_zadnjega_polaganja = \DB::table('student_izpit')->where('id_studenta','=',$student->id)->where('id_izpitnega_roka','=',$datum_vnosa_zadnjega_polaganja->id)->first()->datum_vnosa_ocene;
                                            if ($datum_vnosa_zadnjega_polaganja != "0000-00-00")
                                            {
                                                if ($datum_zadnjega_vnosa > $datum_vnosa_zadnjega_polaganja)
                                                {
                                                    $brez_polaganja = 1;
                                                    $stevec++;
                                                }
                                            }
                                        }
                                        ?>

                                        @if (($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)
                                            <td></td>
                                        @else
                                            @if($brez_polaganja == 0)
                                                <td>{{date('d.m.Y',strtotime($student->polaganja()->whereNull('datum_odjave')->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()->datum))}}</td>
                                            @else
                                                <td>{{date('d.m.Y',strtotime($datum_zadnjega_vnosa))}}*</td>
                                            @endif
                                        @endif

                                        <td>{{$stevec}}</td>

                                        @if($brez_polaganja == 0)
                                            <td>{{(($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':$student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->count()}}</td>
                                        @else
                                            <td>{{(($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':$student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->count() + 1}}</td>
                                        @endif

                                        <?php
                                        if (\App\Models\StudentPredmet::where('id_studenta','=',$student->id)->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->first() != null)
                                        {
                                            $ocenaTemp = \App\Models\StudentPredmet::where('id_studenta','=',$student->id)->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->first()->ocena;

                                            if ($ocenaTemp > 5)
                                            {
                                                $kt=$kt+$predmet->predmet->KT;
                                                $ocena = $ocena + $ocenaTemp;
                                                $stevilo++;
                                            }

                                        }
                                        ?>
                                        @if($brez_polaganja == 0)
                                            <td>{{(($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':(($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena == 0)?'':$student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena)}}</td>
                                        @else
                                            <td>{{$ocenaTemp}}</td>
                                        @endif
                                    </tr>


                                    <?php
                                        $i=$student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->count();
                                        $j=(($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'0':$student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->count();
                                        if($brez_polaganja == 1)
                                        {
                                            $i++;
                                        }
                                    ?>


                                    @foreach($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum') as $polaganje)
                                        @if ($i != $student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->count())
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>{{date('d.m.Y',strtotime($polaganje->datum))}}</td>

                                                <?php
                                                    $stevec = 0;
                                                    $trenutniDatum=$student->polaganja()->whereNull('datum_odjave')->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first();
                                                    if($trenutniDatum!=null)
                                                    {
                                                        $trenutniDatum=$trenutniDatum->datum;
                                                    }

                                                    foreach ($student->polaganja()->whereNull('datum_odjave')->where('id_predmeta','=',$predmet->id_predmeta)->get() as $datumIzpita)
                                                    {
                                                        if ($datumIzpita->datum <= $trenutniDatum && $polaganje->datum >= $datumIzpita->datum)
                                                        {
                                                            $stevec++;
                                                        }
                                                    }
                                                ?>
                                                <td>{{$stevec}}</td>
                                                <td>{{($j==0)?'':$j}}</td>
                                                <td>{{($polaganje->pivot->ocena == 0)?'':($polaganje->pivot->ocena)}}</td>
                                            </tr>
                                        @endif
                                        <?php
                                            $i--;
                                            $j--;
                                        ?>
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
                <input class="btn" type="hidden" id="id_studenta" name="id_studenta" value={{$student->id}}>
                <input class="btn" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input class="btn" id="vsa_polaganja" type="hidden" name="vsa_polaganja" value="0">
                <input class="btn" type="submit" name="csv" value="Izvozi CSV">
                <input class="btn" type="submit" name="pdf" value="Izvozi PDF">
            </form>

        </div>
    </div>
@endsection