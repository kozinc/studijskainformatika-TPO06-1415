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
                            {!! Form::text('vpisnaStevilka', $vpisnaStevilka, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('ime', 'Ime:') !!}
                            {!! Form::text('ime', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('priimek', 'Priimek:') !!}
                            {!! Form::text('priimek', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('datum_rojstva', 'Datum rojstva:') !!}
                            {!! Form::text('datum_rojstva', null, array('class' => 'form-control', 'placeholder' => 'LLLL-MM-DD')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('obcina_rojstva', 'Občina rojstva:') !!}
                            {!! Form::text('obcina_rojstva', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('drzava_rojstva', 'Država rojstva:') !!}
                            {!! Form::text('drzava_rojstva', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('emso', 'EMŠO:') !!}
                            {!! Form::text('emso', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('davcna', 'Davčna številka:') !!}
                            {!! Form::text('davcna', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('spol', 'Spol:') !!}
                            {!! Form::text('spol', null, array('class' => 'form-control','placeholder' => 'ženski/moški')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('kraj', 'Kraj:') !!}
                            {!! Form::text('kraj', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('posta', 'Poštna številka:') !!}
                            {!! Form::text('posta', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('drzava', 'Država:') !!}
                            {!! Form::text('drzava', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('drzavljanstvo', 'Državljanstvo:') !!}
                            {!! Form::text('drzavljanstvo', null, array('class' => 'form-control')) !!}
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
                            {!! Form::text('email', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('telefon', 'Telefonska številka:') !!}
                            {!! Form::text('telefon', null, array('class' => 'form-control')) !!}
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
                            {!! Form::text('studijski_program', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('oznaka', 'Oznaka:') !!}
                            {!! Form::text('oznaka', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('stopnja', 'Stopnja:') !!}
                            {!! Form::text('stopnja', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('kraj_izvajanja', 'Kraj izvajanja:') !!}
                            {!! Form::text('kraj_izvajanja', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('vrsta_vpisa', 'Vrsta vpisa:') !!}
                            {!! Form::text('vrsta_vpisa', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('nacin_studija', 'Način študija:') !!}
                            {!! Form::text('nacin_studija', null, array('class' => 'form-control')) !!}
                        </div>
                        <div class="col-lg-3">
                            {!! Form::label('letnik', 'Letnik:') !!}
                            {!! Form::text('letnik', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('datum_prvega_vpisa', 'Leto prvega vpisa v ta program:') !!}
                            {!! Form::text('datum_prvega_vpisa', null, array('class' => 'form-control')) !!}
                        </div>
                    </div>
                </div>
            </div>



            @if (Session::has('error'))
                <div class="alert alert-info">{{ Session::get('error') }}</div>
            @endif
            {!! Form::submit('Vpis', array('class' => 'btn btn-success')) !!}

        {!! Form::close() !!}

    </div>
@endsection