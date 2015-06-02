@extends('app')

@section('content')
    @extends('response')

    <div class="container jumbotron">

        <div class="page-header">
            <h1>Vpisni list</h1>
            <h2>Obrazec za referenta</h2>
            <h3>Po vpisu študenta bo vpis samodejno potrjen.</h3>
        </div>
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {{$errors->first()}}
            </div>
        @endif
        @if($studentNajden == 0)
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-lg-3">
                            {!! Form::open( array('action' => 'VpisniListReferentController@searchStudent', 'method'=>'post', 'class' => 'form-horizontal')) !!}
                            {!! Form::label('iskalni_niz', 'Ime in priimek ali vpisna številka:') !!}
                            {!! Form::text('iskalni_niz', null, array('class' => 'form-control')) !!} <br>
                            {!! Form::submit('Išči.', array('class' => 'btn btn-default')) !!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        @else

            @if($empty == 1)

                {!! Form::open( array('action' => 'VpisniListReferentController@handlerVpisniList', 'method'=>'post', 'class' => 'form-horizontal')) !!}
                <input type="hidden" name="id" value="{{ $programStudenta->id }}">
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
                                {!! Form::label('drzavljanstvo', 'Državljanstvo:') !!}
                                {!! Form::text('drzavljanstvo', $student->drzavljanstvo, array('class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h2>Stalni naslov</h2>
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
                            <?php $kt=0; ?>
                            @foreach($predmetiObvezni as $predmet)
                                <?php $kt = $kt + $predmet->KT; ?>
                                <tr>
                                    <td class="obvezni" data-kt="{{ $predmet->KT }}">{{ '['.$predmet->sifra.'] '.$predmet->naziv.' ('.$predmet->KT.' KT)' }}</td>
                                </tr>
                            @endforeach
                        </table>
                        @if($programLetnik->stevilo_strokovnih_predmetov > 0)
                            <h3>Strokovni izbirni predmeti</h3>
                            <p>Število zahtevanih kreditnih točk: {{ $programLetnik->stevilo_strokovnih_predmetov*6 }}</p>
                            <select multiple="multiple" class="multi-select count_kt" id="strokovni-predmeti-select" name="strokovni-predmeti[]" >
                                @foreach($predmetiStrokovni as $predmet)
                                    <?php if(in_array($predmet->id,$izbraniPredmeti)){
                                        $kt = $kt + $predmet->KT;
                                    } ?>
                                    <option data-kt="{{ $predmet->KT }}" @if(in_array($predmet->id,$izbraniPredmeti)){{ 'selected' }}@endif value="{{ $predmet->id }}">{{ '['.$predmet->sifra.'] '.$predmet->naziv.' ('.$predmet->KT.' KT)' }}</option>
                                @endforeach
                            </select>
                        @endif
                        @if($programLetnik->stevilo_modulov > 0)
                            <h3>Modulski predmeti</h3>
                            <p>Število zahtevanih kreditnih točk: {{ $programLetnik->stevilo_modulov*3*6 }}</p>
                            <select multiple="multiple" class="multi-select count_kt" id="modulski-predmeti-select" name="modulski-predmeti[]" >
                                @foreach($moduli as $modul)
                                    <optgroup label="{{ $modul->ime }}">
                                        @foreach($modul->predmeti as $predmet)
                                            <?php if(in_array($predmet->id,$izbraniPredmeti)){
                                                $kt = $kt + $predmet->KT;
                                            } ?>
                                            <option data-kt="{{ $predmet->KT }}" @if(in_array($predmet->id,$izbraniPredmeti)){{ 'selected' }}@endif value="{{ $predmet->id }}">{{ '['.$predmet->sifra.'] '.$predmet->naziv.' ('.$predmet->KT.' KT)' }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        @endif
                        @if($programLetnik->stevilo_prostih_predmetov > 0)
                            <h3>Prosto izbirni predmeti</h3>
                            <p>Število zahtevanih kreditnih točk: {{ $programLetnik->stevilo_prostih_predmetov*6 }}</p>
                            <select multiple="multiple" class="multi-select count_kt" id="prosti-predmeti-select" name="prosti-predmeti[]" >
                                @foreach($predmetiProsti as $predmet)
                                    <?php if(in_array($predmet->id,$izbraniPredmeti)){
                                        $kt = $kt + $predmet->KT;
                                    } ?>
                                    <option data-kt="{{ $predmet->KT }}" @if(in_array($predmet->id,$izbraniPredmeti) && !in_array($predmet->id, $predmetiPrejsnjiLetnik)){{ 'selected' }}@endif value="{{ $predmet->id }}">{{ '['.$predmet->sifra.'] '.$predmet->naziv.' ('.$predmet->KT.' KT)' }}</option>
                                @endforeach
                                @foreach($predmetiDodatniProsti as $predmet)
                                        <?php if(in_array($predmet->id,$izbraniPredmeti)){
                                            $kt = $kt + $predmet->KT;
                                        } ?>
                                    <option data-kt="{{ $predmet->KT }}" @if(in_array($predmet->id,$izbraniPredmeti) && !in_array($predmet->id, $predmetiPrejsnjiLetnik)){{ 'selected' }}@endif value="{{ $predmet->id }}">{{ '['.$predmet->sifra.'] '.$predmet->naziv.' ('.$predmet->KT.' KT)' }}</option>
                                @endforeach
                            </select>
                        @endif
                        <br>
                        <div>
                            <p>Število kreditnih točk: <span data-obvezni="{{ $kt }}" id="kt_skupno">{{ $kt }}</span>/60</p>
                        </div>
                    </div>
                </div>

                @if (Session::has('error'))
                    <div class="alert alert-info">{{ Session::get('error') }}</div>
                @endif
            @if(!$potrditev)
                <input type="submit" name="poslji" class="btn btn-success" value="Pošlji vpisni list">
            @endif
                <input type="submit" name="potrdi" class="btn btn-success" value="Potrdi">
                <input type="submit" name="vrni" class="btn btn-danger" value="Vrni žeton">
                {!! Form::close() !!}

            @else
                @if ($sporocilo == "Žeton študenta za vpis je izkoriščen. Ali ponovno odprem vpis?")
                    {!!$sporocilo!!}
                    <form method="post" action="{{ action('VpisniListReferentController@ponoviVlogo',['id'=>$student->id]) }}" class="form-horizontal">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-success" value="Da.">
                    </form>
                @else
                    {!!$sporocilo!!}
                @endif
            @endif

        @endif

    </div>
@endsection