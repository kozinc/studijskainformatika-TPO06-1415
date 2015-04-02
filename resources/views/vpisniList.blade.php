@extends('app')

@section('content')

    <div class="container jumbotron">
        <div class="page-header">
            <h1>Vpisni list</h1>
        </div>

        {!! Form::open(array('action' => 'izbiraPredmetovController@vpisniListHandler', 'class' => 'form-horizontal')) !!}
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>Podatki o študentu</h2>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('vpisnaStevilka', 'Vpisna številka:') !!}
                            {!! Form::text('vpisnaStevilka', $student->vpisna, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('ime', 'Ime:') !!}
                            {!! Form::text('ime', $student->ime, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('priimek', 'Priimek:') !!}
                            {!! Form::text('priimek', $student->priimek, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('datum_rojstva', 'Datum rojstva:') !!}
                            {!! Form::text('datum_rojstva', $student->datum_rojstva, array('class' => 'form-control', 'placeholder' => 'LLLL-MM-DD')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('obcina_rojstva', 'Občina rojstva:') !!}
                            {!! Form::text('obcina_rojstva', $student->obcina_rojstva, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('drzava_rojstva', 'Država rojstva:') !!}
                            {!! Form::text('drzava_rojstva', $student->drzava_rojstva, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('emso', 'EMŠO:') !!}
                            {!! Form::text('emso', $student->emso, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('davcna', 'Davčna številka:') !!}
                            {!! Form::text('davcna', $student->davcna, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('spol', 'Spol:') !!}
                            {!! Form::text('spol', $student->spol, array('class' => 'form-control','placeholder' => 'ženski/moški')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('naslov', 'Naslov:') !!}
                            {!! Form::text('naslov', $student->naslov, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('kraj', 'Kraj:') !!}
                            {!! Form::text('kraj', $student->kraj, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('posta', 'Poštna številka:') !!}
                            {!! Form::text('posta', $student->posta, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('drzava', 'Država:') !!}
                            {!! Form::text('drzava', $student->drzava, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('drzavljanstvo', 'Državljanstvo:') !!}
                            {!! Form::text('drzavljanstvo', $student->drzavljanstvo, array('class' => 'form-control')) !!}
                        </div>
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
                        <div class="col-lg-3">
                            {!! Form::label('vrsta_vpisa', 'Vrsta vpisa:') !!}
                            {!! Form::text('vrsta_vpisa', $programStudenta->vrsta_vpisa, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('nacin_studija', 'Način študija:') !!}
                            {!! Form::text('nacin_studija', $programStudenta->nacin_studija, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('letnik', 'Letnik:') !!}
                            {!! Form::text('letnik', $programStudenta->letnik, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('datum_prvega_vpisa', 'Datum prvega vpisa v ta program:') !!}
                            {!! Form::text('datum_prvega_vpisa', $datum_prvega_vpisa, array('class' => 'form-control')) !!}
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



            @if (Session::has('error'))
                <div class="alert alert-info">{{ Session::get('error') }}</div>
            @endif
            {!! Form::submit('Pošlji vpisni list.', array('class' => 'btn btn-success')) !!}

        {!! Form::close() !!}

    </div>
@endsection