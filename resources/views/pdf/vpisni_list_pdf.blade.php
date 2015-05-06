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

        td{
            width: 350px;
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
        <h2>VPISNI LIST 2014/15</h2>
        <br>
        <table>
            <tr>
                <td class="levo">Vpisna številka: </td>
                <td class="desno">{{ $student->vpisna }}</td>
            </tr>
            <tr>
                <td class="levo">Priimek: </td>
                <td class="desno"> {{$student->priimek}} </td>
            </tr>
            <tr>
                <td class="levo">Ime: </td>
                <td class="desno">{{$student->ime}}</td>
            </tr>
            <tr>
                <td class="levo">Emšo: </td>
                <td class="desno">{{$student->emso}}</td>
            </tr>
            <tr>
                <td class="levo">Davčna številka: </td>
                <td class="desno">{{$student->davcna}}</td>
            </tr>
        </table>
        <br>
        <h4>NASLOV STALNEGA BIVALIŠČA</h4>
        <table>
            <tr>
                <td class="levo">Naslov:</td>
                <td class="desno">{{$student->naslov}}</td>
            </tr>
            <tr>
                <td class="levo">Občina:</td>
                <td class="desno">{{$student->obcina}}</td>
            </tr>
            <tr>
                <td class="levo">Poštna številka:</td>
                <td class="desno">{{$student->posta}}</td>
            </tr>
            <tr>
                <td class="levo">Država: </td>
                <td class="desno">{{ $student->drzava }}</td>
            </tr>
            <tr>
                <td class="levo">Naslov za pošiljanje: </td>
                <td>
                    @if($student->posiljanje==0)
                        <input type="checkbox" checked/>
                    @else
                        <input type="checkbox"/>
                    @endif
                </td>
            </tr>
        </table>
        <br>
        <h4>NASLOV ZAČASNEGA BIVALIŠČA</h4>
        <table>
            <tr>
                <td>Naslov:</td>
                @if($student->naslovZacasni)
                    <td>{{$student->naslovZacasni}}</td>
                @else
                    <td> &nbsp;</td>
                @endif
            </tr>
            <tr>
                <td>Občina:</td>
                @if($student->naslovZacasni)
                    <label class="desno">{{$student->obcinaZacasni}}</label>
                @else
                    <label class="desno"> &nbsp;</label>
                @endif
            </tr>
            <tr>
                <td>Poštna številka:<td>
                @if($student->naslovZacasni)
                    <td>{{$student->postaZacasni}}<td>
                @else
                    <td> &nbsp;<td>
                @endif
            </tr>
            <tr>
                <td>Država: </td>
                @if($student->naslovZacasni)
                    <td>{{$student->drzavaZacasni}}</td>
                @else
                    <td> &nbsp;</td>
                @endif
            </tr>
            <tr>
                <td>Naslov za pošiljanje: </td>
                <td>@if($student->posiljanje==1)
                        <input type="checkbox" checked/>
                    @else
                        <input type="checkbox"/>
                    @endif</td>
            </tr>
        </table>
        <br>
        <h4>OSEBNI PODATKI</h4>
        <table>
            <tr>
                <td>Spol:</td>
                <td class="desno">{{$student->spol}}</td>
            </tr>
            <tr>
                <td class="levo">Datum rojstva:</td>
                <td class="desno">{{ ($student->datum_rojstva=="0000-00-00")?'':date('d.m.Y',strtotime($student->datum_rojstva)) }}</td>
            </tr>
            <tr>
                <td class="levo">Občina rojstva:</td>
                <td class="desno">{{$student->obcina_rojstva}}</td>
            </tr>
            <tr>
                <td class="levo">Država rojstva: </td>
                <td class="desno">{{ $student->drzava_rojstva }}</td>
            </tr>
            <tr>
                <td class="levo">Državljanstvo: </td>
                <td class="desno">{{$student->drzavljanstvo}}</td>
            </tr>
        </table>
        <br>
        <h4>KONTAKTNI PODATKI</h4>
        <table>
            <tr>
                <td>Email:</td>
                <td>{{$student->email}}</td>
            </tr>
            <tr>
                <td>Telefonska številka:</td>
                <td>{{ $student->telefon }}</td>
            </tr>
        </table>
        <br>
        <h4>PODATKI O VPISU</h4>
        <table>
            <tr>
                <td class="levo">Študijski program:</td>
                <td class="desno">{{$program -> ime}}</td>
            </tr>
            <tr>
                <td class="levo">Oznaka:</td>
                <td class="desno">{{ $program->oznaka }}</td>
            </tr>
            <tr>
                <td class="levo">Stopnja:</td>
                <td class="desno">{{ $program->stopnja }}</td>
            </tr>
            <tr>
                <td class="levo">Kraj izvajanja:</td>
                <td class="desno">{{ $program->kraj_izvajanja }}</td>
            </tr>
            <tr>
                <td class="levo">Vrsta vpisa:</td>
                <td class="desno">{{ $program_student->vrsta_vpisa }}</td>
            </tr>
            <tr>
                <td class="levo">Način študija:</td>
                <td class="desno">{{ $program_student->nacin_studija }}</td>
            </tr>
            <tr>
                <td class="levo">Letnik:</td>
                <td class="desno">{{ $program_student->letnik }}</td>
            </tr>
            <tr>
                <td class="levo">Datum prvega vpisa v ta program:</td>
                <td class="desno">{{ ($prvi_vpis == null)?'':date('d.m.Y',strtotime($prvi_vpis)) }}</td>
            </tr>
        </table>
        <br>
        <h4>PREDMETI</h4>
        <table class="table">
            <tr>
                <td><b>Obvezni predmeti</b></td>
            </tr>
            @foreach($obvezni_predmeti->get() as $predmet)
                <tr>
                    <td>{{ $predmet->naziv }}</td>
                </tr>
            @endforeach
        </table>
        <table class="table">
            <tr>
                <td><b>Izbirni predmeti</b></td>
            </tr>
            @foreach($izbirni as $predmet)
                <tr>
                    <td>{{ $predmet }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>