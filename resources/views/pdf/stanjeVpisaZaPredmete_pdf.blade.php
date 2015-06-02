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


<div class="panel panel-default">
    <div class="panel-heading"><h3 style="color: #005580">Stanje Vpisa</h3></div>
    <div class="panel-body">

        @if($stStudentov != '')
            <!-- Prikaz izbranih kriterijev -->
            <br/>
                <p/> Leto: {{ $leta[$leto_id] }} <p/>
                <p/> Letnik:
                {{ ($letnik_id==0) ? 'Ne glede' :  $letniki[$letnik_id].'.letnik'  }}
                <p/>
                <p/> <!-- Stud_Prog_ID: {{ $id_programa }} --> Študijski program: {{ $studProgrami[$id_programa] }} <p/>
            <br/>
                <h3> Število predmetov: {{count($stStudentov)}}</h3>
            <br/>
                <!-- Prikaz podatkov za predmete -->
                <table class="table table-hover" style="font-size: 12px">
                    <tr>
                        <th><!--Zaporedna številka--></th>
                        <th>Šifra</th>
                        <th>Predmet</th>
                        <th>Nosilec</th>

                        <th>Študijsko leto</th>
                        <th>Letnik</th>
                        <th>Študijski program</th>

                        <th>Število vpisanih</th>
                    </tr>
                    <div style="display: none">{{$zaporedna=0}}</div>
                    @foreach($stStudentov as $s)
                        <tr>
                            <div style="display: none">{{ $zaporedna++ }}</div>
                            <td>{{$zaporedna}}</td>
                            <td>{{ isset($predmeti->find($s->id_predmeta)->sifra) ? $predmeti->find($s->id_predmeta)->sifra : "Error" }}</td>
                            <td>{{ isset($predmeti->find($s->id_predmeta)->naziv) ? $predmeti->find($s->id_predmeta)->naziv : "Error" }} </td>
                            <th>{{ isset($predmetNosilec->find($s->id_predmeta)->nosilec->ime) ? $predmetNosilec->find($s->id_predmeta)->nosilec->ime : "Error Nosilec1" }}
                                {{ isset($predmetNosilec->find($s->id_predmeta)->nosilec->priimek) ? $predmetNosilec->find($s->id_predmeta)->nosilec->priimek : "Error Nosilec1" }}
                                {{ isset($predmetNosilec->find($s->id_predmeta)->nosilec2->ime) ? ', '.$predmetNosilec->find($s->id_predmeta)->nosilec2->ime.' '.$predmetNosilec->find($s->id_predmeta)->nosilec2->priimek : "" }}
                                {{ isset($predmetNosilec->find($s->id_predmeta)->nosilec3->ime) ? ', '.$predmetNosilec->find($s->id_predmeta)->nosilec2->ime.' '.$predmetNosilec->find($s->id_predmeta)->nosilec3->priimek : "" }}

                            </th>
                            <td>{{ $s->studijsko_leto }}</td>
                            <td>{{ ($s->letnik==0) ? '' : $s->letnik.'.letnik'  }}</td>
                            <td>{{ $studProgrami[$s->id_programa] }}</td>
                            <td style="text-align: center">{{ $s->total}}</td>
                        </tr>
                    @endforeach

                </table>
        @endif

    </div>
</div>



</body>
</html>


























