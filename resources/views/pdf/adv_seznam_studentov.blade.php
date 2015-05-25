<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-študij FRI</title>

    <style>
        h1, h2, h3, h4, h5, h6 {
            font-family:  DejaVu Sans; text-align: center;
        }
        p, div {
            font-family: DejaVu Sans; font-size: 11;
        }
        table {
            page-break-inside:auto;
            margin:0px;padding:0px;
            width:100%;
            border-collapse:collapse;
        }
        td {
            border-bottom: 0.5px solid #cccccc;
        }
    </style>

</head>
<body>
<script type="text/php">

if ( isset($pdf) ) {

  $size = 6;
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

  $text = "Stran: {PAGE_NUM} / {PAGE_COUNT}";

  // Center the text
  $pdf->page_text($w / 2 - $width / 2, $y, $text, $font, $size, $color);

}
</script>
<div>
    <h2>Seznam vpisanih za dane kriterije:</h2>
    <div style="text-align: center" >
        {!! HTML::image('http://www.culture.si/images/thumb/6/6c/Faculty_of_Computer_and_Information_Science_University_of_Ljubljana_%28logo%29.svg/576px-Faculty_of_Computer_and_Information_Science_University_of_Ljubljana_%28logo%29.svg.png', 'Logo - ni povezave', array( 'width' => 250, 'height' => 150 )) !!}
    </div>
    @if($leto_id>0)
        <p/> Leto: {{ str_replace('/20','-',$leta[$leto_id]) }} <p/>
    @endif
    @if($letnik_id>0)
        <p/> Letnik:
                    {{ $letniki[$letnik_id].'.letnik' }}
        <p/>
    @endif
    @if($id_programa>0)
        <p/> Študijski program: {{ $studProgrami[$id_programa] }} <p/>
    @endif
    @if($vrsteVpisa_id>0)
        <p/> Vrsta studija: {{ $vrsteVpisa[$vrsteVpisa_id] }} <p/>
    @endif
    @if($nacinStudija_id>0)
        <p/> Način študija: {{ $naciniStudija[$nacinStudija_id] }} <p/>
    @endif
    @if(isset($modul_id))
        @if($modul_id>0)
            <p/> Modul: {{ $moduli[$modul_id] }} <p/>
        @endif
    @endif

    <br><br><br><br><br>
    <div class="CSSTableGenerator">
        <table>
            <tr>
                <th></th>
                <th>Vpisna številka</th>
                <th>Priimek in ime</th>
                <th>Študijsko leto</th>
                <th>Letnik</th>
                <th>Študijski program</th>
                <th>Vrsta vpisa</th>
                <th>Način študija</th>
            </tr>
            @foreach($student_list as $student)
                <tr>
                    <td>{{ $student->zaporedna}}</td>

                    <td>{{ $student->vpisna }}</td>
                    <td>{{ $student->priimek }} {{ $student->ime }} </td>
                    <td>{{ str_replace('/20','-',$student->studijsko_leto)  }}</td>
                    <td>{{ $student->letnik  }}.letnik</td>
                    <td>{{ $studProgrami[$student->id_programa] }}</td>
                    <td>{{ $vrsteVpisa[$student->vrstavpisa] }}</td>
                    <td>{{ $student->nacinstudija }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>