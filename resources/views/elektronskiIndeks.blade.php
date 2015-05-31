@extends('app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading"><h3 style="color: #005580">Elektronski indeks študenta {{$student->ime}} {{$student->priimek}} ({{$student->vpisna}})</h3></div>
    <div class="panel-body">
        <div style="display:none">
            {{$Skupno1=0}}          <!-- Število opravljenih predmetov za vse programe, {{$steviloSkupajSkupaj=0}} {{$zaporednaTotal=0}} -->
            {{$Skupno2=0}}          <!-- Kreditne točke za vse programe {{$ktSkupajSkupaj=0}} -->
            {{$Skupno3=0}}          <!-- Vsota ocen za vse programe {{$ocenaSkupajSkupaj=0}} -->
        </div>
        @foreach($studProgrami as $stProg)
            <!-- ZA VSAK ŠTUD program -->
            <div class="panel panel-default panel-body">
                <div style="display:none">
                    {{$P1=0}}           <!-- Število opravljenih predmetov za vse v programu {{$steviloSkupaj=0}} -->
                    {{$P2=0}}           <!-- Kreditne točke za vse v programu {{$ktSkupaj=0}} -->
                    {{$P3=0}}           <!-- Vsota ocen za vse v programu {{$ocenaSkupaj=0}} -->
                    {{$zaporedna=0}}    <!-- Zaporedna številka -->
                </div>
                <div style="display:none">
                    @foreach($programi as $program)
                        <!-- ZA VSAK LETNIK/študijsko leto V PROGRAMU -->
                        @if($stProg->id == $program->id_programa)
                            <div style="display:none">
                                {{$STL1=0}}                   <!-- Število opravljenih predmetov za vse v štud letu {{$stevilo=0}} -->
                                {{$STL2=0}}                   <!-- Kreditne točke za vse v štud letu {{$kt=0}} -->
                                {{$STL3=0}}                   <!-- Vsota ocen za vse v štud letu {{$ocena=0}} -->
                                           <!-- Zaporedna številka -->
                            </div>

                            <!-- ZA VSAK PREDMET V LETNIKU -->
                            @foreach($predmeti->get() as $predmet)
                                @if($predmet->studijsko_leto == $program->studijsko_leto)
                                    <!-- nevidni izračun polaganj -->
                                    <div style="display:none">
                                        {{$stevec=0}}  <!-- Število polaganj za predmet -->
                                        <!-- Izračunajmo število polaganj -->
                                        {{$trenutniDatum=$student->polaganja()
                                            ->where('studijsko_leto','=',$program->studijsko_leto)
                                            ->where('id_predmeta','=',$predmet->id_predmeta)
                                            ->get()->sortByDesc('datum')->first()}} <!-- Datum zadnjega polaganja predmeta -->
                                        @if($trenutniDatum!=null)
                                            {{$trenutniDatum=$trenutniDatum->datum}}
                                        @endif
                                        @foreach ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum') as $datumIzpita)
                                            @if ($trenutniDatum != null)
                                                @if ($datumIzpita->datum <= $trenutniDatum)
                                                    {{$stevec++}}<!-- poveča število polaganj -->
                                                @endif
                                            @endif
                                        @endforeach
                                        @if($stevec >0)
                                            @if($student->Predmeti()
                                                        ->where('id_predmeta','=',$predmet->id_predmeta)
                                                        ->where('studijsko_leto','=',$program->studijsko_leto)
                                                        ->get()->sortByDesc('datum')->first()->pivot->ocena
                                                        >5)

                                                {{$STL1++}}<!-- poveča število opravljenih predmetov -->
                                                {{$STL2=$STL2+$predmet->predmet()->first()->KT}}
                                                <!-- $predmet->predmet()->first()->KT so kreditne točke predmeta -->
                                                {{$STL3=$STL3+$student->Predmeti()
                                                        ->where('id_predmeta','=',$predmet->id_predmeta)
                                                        ->where('studijsko_leto','=',$program->studijsko_leto)
                                                        ->get()->sortByDesc('datum')->first()->pivot->ocena}}
                                                <!-- $student->Predmeti()
                                                        ->where('id_predmeta','=',$predmet->id_predmeta)
                                                        ->where('studijsko_leto','=',$program->studijsko_leto)
                                                        ->get()->sortByDesc('datum')->first()->pivot->ocena
                                                     je končna ocena za predmet
                                                -->
                                            @endif
                                        @endif
                                    </div>
                                @endif
                            @endforeach
                            <div style="display:none">
                            {{$P1=$P1+$STL1}}
                            {{$P2=$P2+$STL2}}
                            {{$P3=$P3+$STL3}}
                            </div>
                        @endif
                        <!-- ZA VSAK LETNIK/študijsko leto V PROGRAMU KONEC--> <!-- KONEC ZANKE za trenutni letnik/študijsko leto -->
                    @endforeach
                </div>
                @if($P1>0)
                    <!-- $P1>0, V PROGRAMU je več kot 1 narejen predmet -->
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
                            <!-- ZA VSAK LETNIK/študijsko leto V PROGRAMU -->
                            @if($stProg->id == $program->id_programa)
                                <div class="panel-body">
                                    <div style="display:none">
                                        {{$STL1=0}}                   <!-- Število opravljenih predmetov za vse v štud letu {{$stevilo=0}} -->
                                        {{$STL2=0}}                   <!-- Kreditne točke za vse v štud letu {{$kt=0}} -->
                                        {{$STL3=0}}                   <!-- Vsota ocen za vse v štud letu {{$ocena=0}} -->
                                        <!--  Zaporedna številka -->
                                    </div>
                                    <!-- ZA VSAK PREDMET V LETNIKU -->
                                    @foreach($predmeti->get() as $predmet)
                                        @if($predmet->studijsko_leto == $program->studijsko_leto)
                                            <!-- nevidni izračun polaganj -->
                                            <div style="display:none">
                                                {{$stevec=0}}  <!-- Število polaganj za predmet -->
                                                <!-- Izračunajmo število polaganj -->
                                                {{$trenutniDatum=$student->polaganja()
                                                    ->where('studijsko_leto','=',$program->studijsko_leto)
                                                    ->where('id_predmeta','=',$predmet->id_predmeta)
                                                    ->get()->sortByDesc('datum')->first()}} <!-- Datum zadnjega polaganja predmeta -->
                                                @if($trenutniDatum!=null)
                                                    {{$trenutniDatum=$trenutniDatum->datum}}
                                                @endif
                                                @foreach ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum') as $datumIzpita)
                                                    @if ($trenutniDatum != null)
                                                        @if ($datumIzpita->datum <= $trenutniDatum)
                                                            {{$stevec++}}<!-- poveča število polaganj -->
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @if($stevec >0)
                                                    @if($student->Predmeti()
                                                                ->where('id_predmeta','=',$predmet->id_predmeta)
                                                                ->where('studijsko_leto','=',$program->studijsko_leto)
                                                                ->get()->sortByDesc('datum')->first()->pivot->ocena
                                                        >5)
                                                        {{$STL1++}}<!-- poveča število opravljenih predmetov -->
                                                        {{$STL2=$STL2+$predmet->predmet()->first()->KT}}
                                                        <!-- $predmet->predmet()->first()->KT so kreditne točke predmeta -->
                                                        {{$STL3=$STL3+$student->Predmeti()
                                                                ->where('id_predmeta','=',$predmet->id_predmeta)
                                                                ->where('studijsko_leto','=',$program->studijsko_leto)
                                                                ->get()->sortByDesc('datum')->first()->pivot->ocena}}
                                                        <!-- $student->Predmeti()
                                                                ->where('id_predmeta','=',$predmet->id_predmeta)
                                                                ->where('studijsko_leto','=',$program->studijsko_leto)
                                                                ->get()->sortByDesc('datum')->first()->pivot->ocena
                                                             je končna ocena za predmet
                                                        -->

                                                        <!--
                                                            IZPIS Predmetov
                                                        -->

                                                    @endif
                                                @endif
                                            </div>
                                            @if($stevec >0)
                                                @if($student->Predmeti()
                                                            ->where('id_predmeta','=',$predmet->id_predmeta)
                                                            ->where('studijsko_leto','=',$program->studijsko_leto)
                                                            ->get()->sortByDesc('datum')->first()->pivot->ocena
                                                    >5)
                                                    <tr>

                                                        <div style="display: none">{{$zaporedna++}}</div>
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

                                                        <!-- Tukaj se izpiše datum polaganja -->
                                                        <td>{{(($student->polaganja()
                                                                ->where('id_predmeta','=',$predmet->id_predmeta)
                                                                ->where('studijsko_leto','=',$program->studijsko_leto)
                                                                ->first()) == null)?
                                                                ''
                                                                :
                                                                date('d.m.Y',strtotime(
                                                                $student->polaganja()
                                                                ->where('studijsko_leto','=',$program->studijsko_leto)
                                                                ->where('id_predmeta','=',$predmet->id_predmeta)
                                                                ->get()->sortByDesc('datum')->first()->datum))}}</td>
                                                        <td>{{$stevec}}</td>

                                                        <td>{{$predmet->predmet->KT}}</td>
                                                        <!-- Tukaj se izpiše končna ocena -->
                                                        <td>{{$student->Predmeti()
                                                                ->where('id_predmeta','=',$predmet->id_predmeta)
                                                                ->where('studijsko_leto','=',$program->studijsko_leto)
                                                                ->get()->sortByDesc('datum')->first()->pivot->ocena}}</td>
                                                    </tr>
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            <!-- ZA VSAK LETNIK/študijsko leto V PROGRAMU KONEC-->
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
                                    <!-- ZA VSAK LETNIK/študijsko leto V PROGRAMU -->
                                    @if($stProg->id == $program->id_programa)
                                        <div style="display:none">
                                            {{$STL1=0}}                   <!-- Število opravljenih predmetov za vse v štud letu {{$stevilo=0}} -->
                                            {{$STL2=0}}                   <!-- Kreditne točke za vse v štud letu {{$kt=0}} -->
                                            {{$STL3=0}}                   <!-- Vsota ocen za vse v štud letu {{$ocena=0}} -->
                                            <!-- Zaporedna številka -->
                                        </div>

                                        <!-- ZA VSAK PREDMET V LETNIKU -->
                                        @foreach($predmeti->get() as $predmet)
                                            @if($predmet->studijsko_leto == $program->studijsko_leto)
                                                <!-- nevidni izračun polaganj -->
                                                <div style="display:none">
                                                    {{$stevec=0}}  <!-- Število polaganj za predmet -->
                                                    <!-- Izračunajmo število polaganj -->
                                                    {{$trenutniDatum=$student->polaganja()
                                                        ->where('studijsko_leto','=',$program->studijsko_leto)
                                                        ->where('id_predmeta','=',$predmet->id_predmeta)
                                                        ->get()->sortByDesc('datum')->first()}} <!-- Datum zadnjega polaganja predmeta -->
                                                    @if($trenutniDatum!=null)
                                                        {{$trenutniDatum=$trenutniDatum->datum}}
                                                    @endif
                                                    @foreach ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum') as $datumIzpita)
                                                        @if ($trenutniDatum != null)
                                                            @if ($datumIzpita->datum <= $trenutniDatum)
                                                                {{$stevec++}}<!-- poveča število polaganj -->
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                    @if($stevec >0)
                                                        @if($student->Predmeti()
                                                                    ->where('id_predmeta','=',$predmet->id_predmeta)
                                                                    ->where('studijsko_leto','=',$program->studijsko_leto)
                                                                    ->get()->sortByDesc('datum')->first()->pivot->ocena)
                                                            >5)
                                                            {{$STL1++}}<!-- poveča število opravljenih predmetov -->
                                                            {{$STL2=$STL2+$predmet->predmet()->first()->KT}}
                                                            <!-- $predmet->predmet()->first()->KT so kreditne točke predmeta -->
                                                            {{$STL3=$STL3+$student->Predmeti()
                                                                    ->where('id_predmeta','=',$predmet->id_predmeta)
                                                                    ->where('studijsko_leto','=',$program->studijsko_leto)
                                                                    ->get()->sortByDesc('datum')->first()->pivot->ocena}}
                                                            <!-- $student->Predmeti()
                                                                    ->where('id_predmeta','=',$predmet->id_predmeta)
                                                                    ->where('studijsko_leto','=',$program->studijsko_leto)
                                                                    ->get()->sortByDesc('datum')->first()->pivot->ocena
                                                                 je končna ocena za predmet
                                                            -->
                                                        @endif
                                                    @endif
                                                </div>
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td>{{$predmet->studijsko_leto }}</td>
                                            <td>{{$STL1}}</td>
                                            <td>{{$STL2}}</td>
                                            <td>{{($STL3==0)?'':number_format((float)($STL3/$STL1), 3, '.', '')}}</td>
                                        </tr>
                                    @endif
                                    <!-- ZA VSAK LETNIK/študijsko leto V PROGRAMU KONEC--> <!-- KONEC ZANKE za trenutni letnik/študijsko leto -->
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
                                    <td>{{$P2}} od {{$stProg->KT}}</td>
                                    <td>{{($P1==0)?'':number_format((float)($P3/$P1), 3, '.', '')}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                @endif
            </div>
            <div style="display:none">
                {{$Skupno1=$Skupno1+$P1}}
                {{$Skupno2=$Skupno2+$P2}}
                {{$Skupno3=$Skupno3+$P3}}
            </div>
            <!-- ZA VSAK ŠTUD program KONEC -->
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
                        <td>{{$Skupno1}}</td>
                        <td>{{$Skupno2}}</td>
                        <td>{{($Skupno1==0)?'':number_format((float)($Skupno3/$Skupno1), 3, '.', '')}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>
    </div>
</div>

@endsection