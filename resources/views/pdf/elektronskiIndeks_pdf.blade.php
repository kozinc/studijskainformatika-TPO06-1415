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

        tr:nth-child(even) {background: #EEE}
        tr:nth-child(odd)  {background: #FFF}
    </style>
</head>

<body style="font-family: Arial ">
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
</h3>

@foreach($programi as $program)
    @if($studProgram->id == $program->id_programa)
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

<body style="font-family: Arial ">
<div class="panel panel-default">
    <div class="panel-body" style="font-size: 8">

        <div style="display:none">{{$ktSkupaj=0}}{{$ocenaSkupaj=0}}{{$steviloSkupaj=0}}{{$zaporedna=0}}</div>
        <div style="display: none">{{$stOprIzpit=0}} </div>
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
                                                <div style="display:none">{{$kt=$kt+$predmet->predmet->KT}}{{$ktSkupaj=$ktSkupaj+$predmet->predmet->KT}}</div>
                                                <div style="display:none">{{$ocena=$ocena+$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena}}{{$ocenaSkupaj=$ocenaSkupaj+$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena}}{{$stevilo++}}{{$steviloSkupaj++}}</div>
                                            @endif
                                        @endif
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


                                        <td>{{(($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->first()) == null)?'':date('d.m.Y',strtotime($student->polaganja()->where('studijsko_leto','=',$program->studijsko_leto)->where('id_predmeta','=',$predmet->id_predmeta)->get()->sortByDesc('datum')->first()->datum))}}</td>
                                        <td>{{$stevec}}</td>


                                        <td>{{$predmet->predmet->KT}}</td>
                                        <td>{{$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena}}</td>
                                    </tr>
                                @endif
                            @endif
                            <div style="display:none">{{$stevilo}}</div>
                        @endif
                    @endforeach
                @endif
            @endforeach
        </table>
        <br/>



        <div class="panel-footer">
            <div class="panel-body">
                <h4>Povprečne ocene po študijskih letih</h4>
                <table class="table">
                    <tr>
                        <th>Študijsko leto</th>
                        <th>Število opravljenih izpitov</th>
                        <th>Kreditne točke</th>
                        <th>Skupna povprečna ocena</th>
                    </tr>
                    @foreach($programi as $program)
                        @if($studProgram->id == $program->id_programa)
                            <div style="display:none">{{$kt=0}}{{$ocena=0}}{{$stevilo=0}}</div>
                            <tr>
                                @foreach($predmeti->get() as $predmet)
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
                                        @if ($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first() != null)
                                            @if($student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena > 5)
                                                <div style="display:none">{{$kt=$kt+$predmet->predmet->KT}}</div>
                                                <div style="display:none">{{$ocena=$ocena+$student->polaganja()->where('id_predmeta','=',$predmet->id_predmeta)->where('studijsko_leto','=',$program->studijsko_leto)->get()->sortByDesc('datum')->first()->pivot->ocena}}{{$stevilo++}}</div>
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
        <br/>
        <div class="panel-footer">
            <div class="panel-body">
                <h4>Skupna povprečna ocena</h4>
                <table class="table">
                    <tr>
                        <th>Število opravljenih izpitov</th>
                        <th>Kreditne točke</th>
                        <th>Skupna povprečna ocena</th>
                    </tr>
                    <tr>
                        <td>{{$stOprIzpit}}</td>
                        <td>{{$ktSkupaj}}</td>
                        <td>{{($steviloSkupaj==0)?'':number_format((float)($ocenaSkupaj/$steviloSkupaj), 3, '.', '')}}</td>
                    </tr>
                </table>
            </div>
        </div>
        <br>

    </div>
</div>

</body>
</html>