@extends('app')

@section('content')

    <div class="container jumbotron">

        <div class="page-header">
            <h1>Žeton za vpis</h1>
        </div>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {{$errors->first()}}
            </div>
        @endif
        <form action="{{ action('StudentController@ustvariNovZeton',['id'=>$student->id]) }}" method="post" class="form-horizontal">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id_studenta" value="{{ $student->id }}">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h2>Podatki o študentu</h2>
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::label('vpisna_stevilka', 'Vpisna številka:') !!}
                            {!! Form::text('vpisna_stevilka', $student->vpisna, array('class' => 'form-control', 'disabled')) !!}
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
                            <label for="datum_rojstva">Datum rojstva:</label>
                            <input type="text" id="datum_rojstva" name="datum_rojstva" value="{{ ($student->datum_rojstva=="0000-00-00")?'':date('d.m.Y',strtotime($student->datum_rojstva)) }}" class="form-control" placeholder="DD.MM.LLLL" >
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
                    <label for="studijsko_leto">Študijsko leto</label>
                    <input type="text" id="studijsko_leto" name="studijsko_leto" placeholder="yyyy/yyyy">
                    <label for="studijski_program_ajax">Študijski program</label>
                        <select name="studijski_program" id="studijski_program_ajax">
                            <option value="0" data-oznaka="" data-stopnja="" data-kraj_izvajanja="" data-trajanje_leta="" >---izberi študijski program---</option>
                            @foreach($programi as $pr)
                                <option value="{{ $pr->id }}" data-oznaka="{{ $pr->oznaka }}" data-stopnja="{{ $pr->stopnja }}" data-trajanje_leta="{{ $pr->trajanje_leta }}" data-kraj_izvajanja="{{ $pr->kraj_izvajanja }}">
                                    {{ $pr->ime }}
                                </option>
                            @endforeach
                        </select>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>Oznaka:</label>
                            <span id="oznaka"></span>
                        </div>
                        <div class="col-lg-3">
                            <label>Stopnja:</label>
                            <span id="stopnja"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-3">
                            <label>Kraj izvajanja:</label>
                            <span id="kraj_izvajanja"></span>
                        </div>
                    </div>
                    <div class="form-group">
                       <label>Prosta izbira predmetov</label>
                        <input type="checkbox" name="prosta_izbira">
                    </div>
                    <div class="form-group">
                        <div class="col-lg-2">
                            {!! Form::label('vrsta_vpisa', 'Vrsta vpisa:') !!}
                            <div class="btn btn-default dropdown-toggle">
                                <select name="vrsta_vpisa">
                                    @foreach($vrste_vpisa as $vp)
                                        <option value="{{ $vp->sifra }}">
                                            {{ $vp->ime }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                         <select name="nacin_studija">
                             <option value="redni">Redni</option>
                             <option value="izredni">Izredni</option>
                         </select>
                        <label for="letnik">Letnik:</label>
                        <select name="letnik" id="letnik">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option id="letnik-3" value="3">3</option>
                        </select>

                    </div>
                </div>
            </div>

            @if (Session::has('error'))
                <div class="alert alert-info">{{ Session::get('error') }}</div>
            @endif
            <input type="submit" value="Shrani žeton" class="btn btn-success">
        </form>
    </div>

@endsection