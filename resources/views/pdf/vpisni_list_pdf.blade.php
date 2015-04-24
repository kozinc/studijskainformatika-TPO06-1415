<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-študij FRI</title>

    <link href="{{ asset('bootstrap-3.3.4-dist/css/bootstrap.min.css') }}" rel="stylesheet">>
    <script scr="{{ asset('bootstrap-3.3.4-dist/js/bootstrap.min.js') }}"></script>

    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/jquery-te-1.4.0.css') }}" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
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

    <div>
        <div class="page-header">
            <h1>Vpisni list</h1>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <h2>Podatki o študentu</h2>
                <div class="form-group">
                    <div >
                        <label>Vpisna številka: </label>
                        <br>
                        <label>{{ $student->vpisna }}</label>
                    </div>
                </div>
                <div class="form-group">
                    <div>
                        <label>Ime: </label>
                        <br>
                        <label> {{$student->ime}} </label>
                    </div>
                    <div>
                        <label>Priimek: </label>
                        <br>
                        <label>{{$student->priimek}}</label>
                    </div>
                </div>
                     <div class="form-group">
                            <div>
                                <label>Datum rojstva:</label>
                                <br>
                                <label>{{ ($student->datum_rojstva=="0000-00-00")?'':date('d.m.Y',strtotime($student->datum_rojstva)) }}</label>
                            </div>
                            <div>
                                <label>Občina rojstva:</label>
                                <br>
                                <label>{{$student->obcina_rojstva}}</label>
                            </div>
                            <div>
                                <label>Država rojstva: </label>
                                <br>
                                <label>{{ $student->drzava_rojstva }}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label>Emšo: </label>
                                <br>
                                <label>{{$student->emso}}</label>
                            </div>
                            <div>
                                <label>Davčna številka: </label>
                                <br>
                                <label>{{$student->davcna}}</label>
                            </div>
                            <div>
                                <label>Spol:</label>
                                <br>
                                <label>{{$student->spol}}</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                <label>Državljanstvo: </label>
                                <br>
                                <label>{{$student->drzavljanstvo}}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Stalni naslov</h2>
                        <div class="form-group">
                            <div>
                                {!! Form::label('naslov', 'Naslov:') !!}
                                {!! Form::text('naslov', $student->naslov, array('class' => 'form-control')) !!}
                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('obcina', 'Občina:') !!}
                                {!! Form::text('obcina', $student->obcina, array('class' => 'form-control')) !!}
                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('posta', 'Poštna številka:') !!}
                                <input type="text" name="posta" value="{{ $student->posta?$student->posta:'' }}" class="form-control">
                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('drzava', 'Država:') !!}
                                {!! Form::text('drzava', $student->drzava, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Začasni naslov</h2>
                        <div class="form-group">
                            <div class="col-lg-3">
                                {!! Form::label('naslovZacasni', 'Naslov:') !!}
                                {!! Form::text('naslovZacasni', $student->naslovZacasni, array('class' => 'form-control')) !!}
                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('obcinaZacasni', 'Občina:') !!}
                                {!! Form::text('obcinaZacasni', $student->obcinaZacasni, array('class' => 'form-control')) !!}
                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('postaZacasni', 'Poštna številka:') !!}
                                {!! Form::text('postaZacasni', $student->postaZacasni, array('class' => 'form-control')) !!}
                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('drzavaZacasni', 'Država:') !!}
                                {!! Form::text('drzavaZacasni', $student->drzavaZacasni, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Naslov za pošiljanje</h3>
                        <div class="radio">
                            <label for="stalni"><input type="radio" id="stalni" name="posiljanje" value="0" @if($student->posiljanje==0){{ 'checked' }}@endif>Stalni</label>
                        </div>
                        <div class="radio">
                            <label for="zacasni"><input type="radio" id="zacasni" name="posiljanje" value="1"  @if($student->posiljanje==1){{ 'checked' }}@endif>Začasni</label>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Kontaktni podatki</h2>
                        <div class="form-group">
                            <div class="col-lg-3">
                                {!! Form::label('email', 'Email:') !!}
                                {!! Form::text('email', $student->email, array('class' => 'form-control')) !!}
                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('telefon', 'Telefonska številka:') !!}
                                {!! Form::text('telefon', $student->telefon, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Podatki o vpisu</h2>
                        <div class="form-group">
                            <div class="col-lg-6">
                                {!! Form::label('studijski_program', 'Študijski program:') !!}
                                {!! Form::text('studijski_program', $program->ime, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                {!! Form::label('oznaka', 'Oznaka:') !!}
                                {!! Form::text('oznaka', $program->oznaka, array('class' => 'form-control')) !!}
                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('stopnja', 'Stopnja:') !!}
                                {!! Form::text('stopnja', $program->stopnja, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                {!! Form::label('kraj_izvajanja', 'Kraj izvajanja:') !!}
                                {!! Form::text('kraj_izvajanja', $program->kraj_izvajanja, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-2">
                                {!! Form::label('vrsta_vpisa', 'Vrsta vpisa:') !!}
                                <div class="btn btn-default dropdown-toggle">
                                    <select name="vrsta_vpisa">
                                        @foreach($vrste_vpisa as $vp)
                                            <option value="{{ $vp->sifra }}" @if($vp->sifra == $programStudenta->vrsta_vpisa) {{ 'selected' }} @endif>
                                                {{ $vp->ime }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                {!! Form::label('nacin_studija', 'Način študija:') !!}
                                {!! Form::text('nacin_studija', $programStudenta->nacin_studija, array('class' => 'form-control')) !!}
                            </div>
                            <div class="col-lg-3">
                                {!! Form::label('letnik', 'Letnik:') !!}
                                <input type="text" name="letnik" value="{{ $programStudenta->letnik}}" class="form-control">

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-3">
                                {!! Form::label('datum_prvega_vpisa', 'Datum prvega vpisa v ta program:') !!}
                                {!! Form::text('datum_prvega_vpisa', ($datum_prvega_vpisa==null)?'':date('d.m.Y',strtotime($datum_prvega_vpisa)), array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Predmeti</h2>
                        <table class="table">
                            <tr>
                                <th>Obvezni predmeti</th>
                            </tr>
                            @foreach($predmetiObvezni->get() as $predmet)
                                <tr>
                                    <td>{{ $predmet->naziv }}</td>
                                </tr>
                            @endforeach
                        </table>
                        <table class="table">
                            <tr>
                                <th>Izbirni predmeti</th>
                            </tr>

                        </table>
                    </div>
                </div>
    </div>
</body>
</html>