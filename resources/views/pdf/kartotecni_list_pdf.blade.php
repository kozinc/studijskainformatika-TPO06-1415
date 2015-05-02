<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-študij FRI</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <style>
        h1, h2, h3, h4, h5, h6 {
            font-family:  DejaVu Sans;
        }
        p, div {
            font-family: DejaVu Sans;
        }

    </style>
</head>
<body style="font-family: DejaVu Sans">
<div class="panel panel-default">
    <div class="panel-heading"><h3>Kartotečni list osebe {{$student->ime}} {{$student->priimek}} ({{$student->vpisna}})</h3></div>
    <div class="panel-body">
        <br><br>
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
    </div>
</div>
</body>
</html>