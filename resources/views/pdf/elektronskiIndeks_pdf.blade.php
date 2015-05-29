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
        body { font-family: Deja Vu Sans; }
        h1, h2, h3, h4, h5, h6 {
            font-family:  DejaVu Sans;
        }
        p, div {
            font-family: DejaVu Sans;
        }

        tr:nth-child(even) {background: #EEE}
        tr:nth-child(odd)  {background: #FFF}
    </style>
</head>

<body >
<script type="text/php">

if ( isset($pdf) ) {

  $size = 8;
  $color = array(0,0,0);
  if (class_exists('Font_Metrics')) {
    $font = Font_Metrics::get_font("helvetica");
    $text_height = Font_Metrics::get_font_height($font, $size);
    $width = Font_Metrics::get_text_width("Page 1 of 2", $font, $size);
  } elseif (class_exists('Dompdf\\FontMetrics')) {
    $font = $fontMetrics->getFont("helvetica");
    $text_height = $fontMetrics->getFontHeight($font, $size);
    $width = $fontMetrics->getTextWidth("Page 1 of 2", $font, $size);
  }

  $foot = $pdf->open_object();

  $w = $pdf->get_width();
  $h = $pdf->get_height();

  // Draw a line along the bottom
  $y = $h - $text_height - 24;
  $pdf->line(16, $y, $w - 16, $y, $color, 0.5);

  $pdf->close_object();
  $pdf->add_object($foot, "all");

  $text = "Stran: {PAGE_NUM} od {PAGE_COUNT}";

  // Center the text
  $pdf->page_text($w / 2 - $width / 2, $y, $text, $font, $size, $color);

}
</script>


<div style="font-size: 8; text-transform: uppercase;">
    <div>{{$student->priimek}} {{$student->ime}}</div>
    <div>{{$student->naslov}}</div>
    <div>{{$student->posta}} {{$student->obcina}}</div>
    <div>{{$student->drzava}}</div>
</div>
<div style="font-size: 8; text-align: right; position: absolute; top: 0px; right: 0px;">
    <div>Datum: {{$ldate = date('m.d.Y   H:i')}}</div>
    <div>Vpisna številka: {{$student->vpisna}}</div>
</div>

<h3>
    <div style="text-transform: uppercase;"> {{$student->priimek}}, {{$student->ime}} {{$student->vpisna}}</div>
    Elektronski indeks
    <div>{{$studProgram->ime}}</div>
</h3>

<div style="display:none">
    {{$P1=0}}           <!-- Število opravljenih predmetov za vse v programu {{$steviloSkupaj=0}} -->
    {{$P2=0}}           <!-- Kreditne točke za vse v programu {{$ktSkupaj=0}} -->
    {{$P3=0}}           <!-- Vsota ocen za vse v programu {{$ocenaSkupaj=0}} -->
    {{$zaporedna=0}}    <!-- Zaporedna številka -->
</div>

<div style="display:none">
    @foreach($programi as $program)
        <!-- ZA VSAK LETNIK/študijsko leto V PROGRAMU -->
        @if($studProgram->id == $program->id_programa)
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
<div class="CSSTableGenerator">
<table class="table">
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
        @if($studProgram->id == $program->id_programa)

            <div style="display:none">{{$kt=0}}{{$ocena=0}}{{$stevilo=0}}</div>
            @foreach($predmeti->get() as $predmet)
                @if($predmet->studijsko_leto == $program->studijsko_leto)
                    @if($studProgram->id == $program->id_programa)
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
                        </div>@if($stevec >0)
                            @if($student->Predmeti()
                                        ->where('id_predmeta','=',$predmet->id_predmeta)
                                        ->where('studijsko_leto','=',$program->studijsko_leto)
                                        ->get()->sortByDesc('datum')->first()->pivot->ocena
                                >5)
                                <tr style="font-size: 10pt">
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
                                    <td>{{$student->Predmeti()
                                                        ->where('id_predmeta','=',$predmet->id_predmeta)
                                                        ->where('studijsko_leto','=',$program->studijsko_leto)
                                                        ->get()->sortByDesc('datum')->first()->pivot->ocena}}</td>
                                </tr>
                            @endif
                        @endif
                    @endif
                    <div style="display:none">{{$stevilo}}</div>
                @endif
            @endforeach
        @endif
    @endforeach
</table>
</div>
<br/>

<div class="panel-footer">
    <div class="panel-body CSSTableGenerator">
        <h4>Povprečne ocene po študijskih letih za program</h4>
        <table class="table">
            <tr>
                <th>Študijsko leto</th>
                <th>Število opravljenih izpitov</th>
                <th>Kreditne točke</th>
                <th>Povprečna ocena</th>
            </tr>
            @foreach($programi as $program)
                <!-- ZA VSAK LETNIK/študijsko leto V PROGRAMU -->
                @if($studProgram->id == $program->id_programa)
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
    <div class="panel-body CSSTableGenerator">
        <h4>Skupna povprečna ocena</h4>
        <table class="table">
            <tr>
                <th>Število opravljenih izpitov</th>
                <th>Kreditne točke</th>
                <th>Skupna povprečna ocena</th>
            </tr>
            <tr>
                <td>{{$P1}}</td>
                <td>{{$P2}}</td>
                <td>{{($P1==0)?'':number_format((float)($P3/$P1), 3, '.', '')}}</td>
            </tr>
        </table>
    </div>
</div>

</body>
</html>