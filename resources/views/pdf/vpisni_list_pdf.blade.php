<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-študij FRI</title>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <style>
        h1, h2, h3, h4, h5, h6 {
            font-family:  DejaVu Sans;
        }
        p, div {
            font-family: DejaVu Sans;
        }
        .crta {
            border-bottom: 0.5px solid rgba(0, 0, 0, 0.06);
        }
        table{
            width: 700px;
            border-collapse:collapse
        }
        .fixed_table {
            table-layout: fixed;
        }
    </style>
</head>
<body style="font-family: DejaVu Sans">
<div class="bla">
    <div class="">
        <div>
            {!! HTML::image('http://www.culture.si/images/thumb/6/6c/Faculty_of_Computer_and_Information_Science_University_of_Ljubljana_%28logo%29.svg/576px-Faculty_of_Computer_and_Information_Science_University_of_Ljubljana_%28logo%29.svg.png', 'Logo - ni povezave', array( 'width' => 250, 'height' => 150 )) !!}
        </div>
        <br><br>
        <label style="font-size: 20px"><b>VPISNI LIST {{ $studijsko_leto }}</b></label><br>
        <label style="font-size: 16px">za študente</label><br/>
        <label>Fakulteta za računalništvo in informatiko</label><br/>
        <br><br>
        <table class="fixed_table">
            <tr>
                <td class="sort" style="font-size: 12px">Vpisna številka</td>
                <td class="sort" style="font-size: 12px">Priimek in ime</td>
            </tr>
            <tr>
                <td class="sort" style="font-size: 18px"><b>{{ $student->vpisna }} </b></td>
                <td class="sort" style="font-size: 18px"><b>{{$student->priimek}} {{$student->ime}} </b></td>
            </tr>
        </table>
        <table class="fixed_table">
            <tr>
                <td class="sort" style="font-size: 12px">Datum rojstva</td>
                <td class="sort" style="font-size: 12px">Kraj rojstva</td>
                <td class="sort" style="font-size: 12px">Država, občina rojstva</td>
                <td class="sort" style="font-size: 12px">Državljanstvo</td>
            </tr>
            <tr>
                <td class="sort">{{ ($student->datum_rojstva=="0000-00-00")?'':date('d.m.Y',strtotime($student->datum_rojstva)) }}</td>
                <td class="sort">{{$student->obcina_rojstva}}</td>
                <td class="sort">{{$student->drzava_rojstva}}, {{$student->obcina_rojstva}}</td>
                <td class="sort">{{$student->drzavljanstvo}}</td>
            </tr>
        </table>
        <table class="fixed_table">
            <tr>
                <td class="sort" style="font-size: 12px">Spol</td>
                <td class="sort" style="font-size: 12px">EMŠO</td>
                <td class="sort" style="font-size: 12px">Davčna številka</td>
                <td></td>
            </tr>
            <tr>
                <td class="sort">{{$student->spol}}</td>
                <td class="sort">{{$student->emso}}</td>
                <td class="sort">{{$student->davcna}}</td>
                <td></td>
            </tr>
        </table>
        <table class="fixed_table">
            <tr>
                <td class="sort" style="font-size: 12px; width: 360px">e-pošta</td>
                <td class="sort" style="font-size: 12px">Prenosni telefon</td>
            </tr>
            <tr>
                <td class="sort">{{$student->email}}</td>
                <td class="sort">{{$student->telefon}}</td>
            </tr>
        </table>
        <table class="fixed_table">
            <tr>
                <td class="sort" style="font-size: 12px"></td>
                <td class="sort" style="font-size: 12px">Vročanje</td>
                <td class="sort" style="font-size: 12px">Naslov</td>
                <td class="sort" style="font-size: 12px">Država, občina</td>
            </tr>
            <tr>
                <td class="sort" style="font-size: 12px">Stalno bivališče</td>
                @if($student->posiljanje==0)
                    <td class="sort"><input type="checkbox" checked/></td>
                @else
                    <td class="sort"><input type="checkbox"/></td>
                @endif
                <td class="sort">{{$student->naslov}}, {{$student->postna}} {{$student->obcina}}</td>
                <td class="sort">{{$student->drzava}}, {{$student->obcina}}</td>
            </tr>
            <tr>
                <td class="sort" style="font-size: 12px">Začasno bivališče</td>
                @if($student->posiljanje==1)
                    <td class="sort"><input type="checkbox" checked/></td>
                @else
                    <td class="sort"><input type="checkbox"/></td>
                @endif
                @if($student->naslovZacasni)
                    <td class="sort">{{$student->naslovZacasni}}, {{$student->postnaZacasni}} {{$student->obcinaZacasni}}</td>
                    <td class="sort">{{$student->drzavaZacasni}}, {{$student->obcinaZacasni}}</td>
                @else
                    <td class="sort">/</td>
                    <td class="sort">/</td>
                @endif
            </tr>
        </table>
        <br><br><br>
        <div style="background-color: #9d9d9d">
            <label>PODATKI O VPISU</label>
        </div>
        <table class="fixed_table">
            <tr>
                <td class="sort" style="font-size: 12px">Študijski program</td>
            </tr>
            <tr>
                <td class="sort">{{$program->ime}}</td>
            </tr>
        </table>
        <table class="fixed_table">
            <tr>
                <td class="sort" style="font-size: 12px">Oznaka</td>
                <td class="sort" style="font-size: 12px">Stopnja</td>
            </tr>
            <tr>
                <td class="sort">{{$program->oznaka}}</td>
                <td class="sort">{{$program->stopnja}}</td>
            </tr>
        </table>
        <table class="fixed_table">
            <tr>
                <td class="sort" style="font-size: 12px">Kraj izvajanja</td>
            </tr>
            <tr>
                <td class="sort">{{$program->kraj_izvajanja}}</td>
            </tr>
        </table>
        <table class="fixed_table">
            <tr>
                <td class="sort" style="font-size: 12px">Vrsta vpisa</td>
            </tr>
            <tr>
                <td class="sort">{{ $program_student->vrsta_vpisa }}</td>
            </tr>
        </table>
        <table class="fixed_table">
            <tr>
                <td class="sort" style="font-size: 12px">Način študija</td>
                <td class="sort" style="font-size: 12px">Letnik</td>
            </tr>
            <tr>
                <td class="sort">{{ $program_student->nacin_studija }}</td>
                <td class="sort">{{ $program_student->letnik }}</td>
            </tr>
        </table>
        <table class="fixed_table">
            <tr>
                <td class="sort" style="font-size: 12px">Datum prvega vpisa v ta program</td>
            </tr>
            <tr>
                <td class="sort">{{ ($prvi_vpis == null)?'':date('d.m.Y',strtotime($prvi_vpis)) }}</td>
            </tr>
        </table>

        <br><br><br><br><br><br>
        <div style="background-color: #9d9d9d">
            <label>PRILOGA 1: PREDMETNIK</label>
        </div>
        <table class="table">
            <tr>
                <td class="crta" style="width: 170px; font-size: 12px">Učitelj</td>
                <td class="crta" style="width: 400px; font-size: 12px">Učna enota</td>
                <td class="crta" style="font-size: 12px">Število KT</td>
            </tr>
            @foreach($obvezni_predmeti as $predmet)
                <tr>
                    <td class="crta">{{ $predmet->n }}</td>
                    <td class="crta" style="width: 450px">{{ $predmet->naziv }}</td>
                    <td class="crta">{{ $predmet->KT }}</td>
                </tr>
            @endforeach
            @foreach($izbirni as $p)
                <tr>
                    <td class="crta">{{ $p->n }}</td>
                    <td class="crta" style="width: 360px">{{ $p->naziv }}</td>
                    <td class="crta">{{ $p->KT }}</td>
                </tr>
            @endforeach
            <tr>
                <td> </td>
                <td style="width: 360px"> </td>
                <td>{{ $skupne_KT }}</td>
            </tr>
        </table>
    </div>
</div>
</body>
</html>