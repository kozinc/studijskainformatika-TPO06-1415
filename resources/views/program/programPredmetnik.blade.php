
@extends('app')

@section('content')
    @extends('response')
    <div class="program-info">
        <h3><a href="{{ action('StudijskiProgramController@show',['id'=>$program->id]) }}">{{ $program->ime }}</a></h3>
        <h3>Študijsko leto {{ str_replace('/20','-',$studijsko_leto) }}</h3>
    </div>
    <ul class="nav nav-pills">
    @foreach($program->letniki as $letnik)
        <li role="presentation" data-letnik="{{ $letnik->letnik }}" class="letnik-tab @if($letnik->letnik == 1){{ 'active' }}@endif">
            <a href="#">{{ $letnik->letnik.'. letnik' }}</a>
        </li>
    @endforeach
        <li role="presentation" data-letnik="0" class="letnik-tab">
            <a href="#">Prosto izbirni predmeti</a>
        </li>
    </ul>


    <div class="panel">
        <div class="panel-body panel-default">

    @foreach($program->letniki as $letnik)
        <div id="letnik-{{ $letnik->letnik }}" @if($letnik->letnik!=1)style="display:none"@endif>
            <div class="letnik-info">
                <p>Kreditne točke: {{ $letnik->KT }}</p>
                <p>Število KT obveznih predmetov: {{ $letnik->stevilo_obveznih_predmetov }}</p>
                <p>Število KT strokovno izbirnih predmetov: {{ $letnik->stevilo_strokovnih_predmetov }}</p>
                <p>Število KT prosto izbirnih predmetov: {{ $letnik->stevilo_strokovnih_predmetov }}</p>
                <p>Število modulov: {{ $letnik->stevilo_modulov }}</p>
                @if($letnik->stevilo_obveznih_predmetov != $program->obvezni_predmeti($studijsko_leto,$letnik->letnik )->sum('KT'))
                    <div class="alert alert-warning" role="alert">
                        Število KT obveznih predmetov se ne ujema!
                    </div>
                @endif
                @if($letnik->stevilo_modulov > $program->moduli($studijsko_leto,$letnik->letnik)->count())
                    <div class="alert alert-warning" role="alert">
                        Povečajte število modulov!
                    </div>
                @endif
                @if($letnik->stevilo_strokovnih_predmetov > $program->strokovni_predmeti($studijsko_leto,$letnik->letnik)->sum('KT'))
                    <div class="alert alert-warning" role="alert">
                        Povečajte število strokovnih predmetov!
                    </div>
                @endif
                @if($letnik->stevilo_prostih_predmetov > $program->prosti_predmeti($studijsko_leto)->sum('KT'))
                    <div class="alert alert-warning" role="alert">
                        Povečajte število prsto izbirnih predmetov predmetov!
                    </div>
                @endif
                @foreach($program->moduli as $modul)
                    @if($modul->letnik == $letnik->letnik && $modul->studijsko_leto==$studijsko_leto)
                        @if(count($modul->predmeti) == 0)
                            <div class="alert alert-warning" role="alert">
                                Modul {{ $modul->ime }} nima dodanega nobenega predmeta.
                            </div>
                        @endif
                    @endif

                @endforeach
            </div>
            <h3>Predmetnik</h3>
            <table class="table" class="predmeti">
                <tr>
                    <th>Šifra</th>
                    <th>Ime</th>
                    <th>Tip</th>
                    <th>Nosilec</th>
                    <th>Semester</th>
                    <th>Kreditne točke</th>
                    <th>Odstani</th>
                </tr>
                <tr>
                    <td colspan="7">Obvezni predmeti</td>
                </tr>
                @foreach($program->predmeti as $predmet)
                    @if($predmet->pivot->letnik == $letnik->letnik && $predmet->pivot->studijsko_leto == $studijsko_leto && $predmet->pivot->tip=='obvezni')
                    <tr>
                        <td>{{ $predmet->sifra }}</td>
                        <td><a href="{{ action('PredmetController@show', ['id'=>$predmet->id]) }}">{{ $predmet->naziv }}</a></td>
                        <td>{{ $predmet->pivot->tip }}</td>
                        <td>
                            <?php

                            if($predmet->id_nosilca != null){
                                if ($predmet->id_nosilca > 0) {
                                    $ime = $predmet->nosilec->ime;
                                    $priimek = $predmet->nosilec->priimek;
                                    echo "$ime $priimek";
                                }
                            }

                            if($predmet->id_nosilca2 != null){
                                if ($predmet->id_nosilca2 > 0) {
                                    $ime2 = $predmet->nosilec2->ime;
                                    $priimek2 = $predmet->nosilec2->priimek;
                                    echo ", $ime2 $priimek2";
                                }
                            }
                            if($predmet->id_nosilca3 != null){
                                if ($predmet->id_nosilca3 > 0) {
                                    $ime3 = $predmet->nosilec3->ime;
                                    $priimek3 = $predmet->nosilec3->priimek;
                                    echo ", $ime3 $priimek3";
                                }
                            }
                            ?>

                        </td>
                        <td>
                            @if($predmet->pivot->semester==1){{ 'Zimski' }}@else {{ 'Poletni' }} @endif
                        </td>
                        <td>{{ $predmet->KT }}</td>
                        <td>
                            <form method="post" action="{{ action('StudijskiProgramController@odstraniPredmet',['id'=>$program->id,'studijsko_leto'=>str_replace('/20','-',$studijsko_leto)]) }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="id_predmeta" value="{{ $predmet->id }}">
                                <input type="submit" class="btn btn-danger" value="X">
                            </form>
                        </td>
                    </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="7">Strokovni izbirni predmeti</td>
                </tr>
                @foreach($program->predmeti as $predmet)
                    @if($predmet->pivot->letnik == $letnik->letnik && $predmet->pivot->studijsko_leto == $studijsko_leto && $predmet->pivot->tip=='strokovni-izbirni')
                        <tr>
                            <td>{{ $predmet->sifra }}</td>
                            <td><a href="{{ action('PredmetController@show', ['id'=>$predmet->id]) }}">{{ $predmet->naziv }}</a></td>
                            <td>{{ $predmet->pivot->tip }}</td>
                            <td>{{ $predmet->nosilec->ime }} {{$predmet->nosilec->priimek}}</td>
                            <td>
                                @if($predmet->pivot->semester==1){{ 'Zimski' }}@else {{ 'Poletni' }} @endif
                            </td>
                            <td>{{ $predmet->KT }}</td>
                            <td>
                                <form method="post" action="{{ action('StudijskiProgramController@odstraniPredmet',['id'=>$program->id,'studijsko_leto'=>str_replace('/20','-',$studijsko_leto)]) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id_predmeta" value="{{ $predmet->id }}">
                                    <input type="submit" class="btn btn-danger" value="X">
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </table>
            <hr>
            <h3>Moduli</h3>
            <table class="table">
                <tr>
                    <th>Šifra</th>
                    <th>Ime</th>
                    <th>Tip</th>
                    <th>Nosilec</th>
                    <th>Semester</th>
                    <th>Kreditne točke</th>
                    <th>Odstrani</th>
                </tr>
                @foreach($program->moduli as $modul)
                    @if($modul->letnik == $letnik->letnik && $modul->studijsko_leto==$studijsko_leto)
                        <tr>
                            <td colspan="6">{{ $modul->ime }}</td>
                            <td>
                                <form method="post" action="{{ action('StudijskiProgramController@odstraniModul',['id'=>$program->id,'studijsko_leto'=>str_replace('/20','-',$studijsko_leto)]) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id_modula" value="{{ $modul->id }}">
                                    <input type="submit" class="btn btn-danger" value="X">
                                </form>
                            </td>
                        </tr>
                        @foreach($modul->predmeti as $predmet)
                        <tr>
                            <td>{{ $predmet->sifra }}</td>
                            <td><a href="{{ action('PredmetController@show', ['id'=>$predmet->id]) }}">{{ $predmet->naziv }}</a></td>
                            <td>{{ $predmet->pivot->tip }}</td>
                            <td>

                                <?php

                                if($predmet->id_nosilca != null){
                                    if ($predmet->id_nosilca > 0) {
                                        $ime = $predmet->nosilec->ime;
                                        $priimek = $predmet->nosilec->priimek;
                                        echo "$ime $priimek";
                                    }
                                }

                                if($predmet->id_nosilca2 != null){
                                    if ($predmet->id_nosilca2 > 0) {
                                        $ime2 = $predmet->nosilec2->ime;
                                        $priimek2 = $predmet->nosilec2->priimek;
                                        echo ", $ime2 $priimek2";
                                    }
                                }
                                if($predmet->id_nosilca3 != null){
                                    if ($predmet->id_nosilca3 > 0) {
                                        $ime3 = $predmet->nosilec3->ime;
                                        $priimek3 = $predmet->nosilec3->priimek;
                                        echo ", $ime3 $priimek3";
                                    }
                                }
                                ?>

                            </td>
                            <td>
                                @if($predmet->pivot->semester==1){{ 'Zimski' }}@else {{ 'Poletni' }} @endif
                            </td>
                            <td>{{ $predmet->KT }}</td>
                            <td>
                                <form method="post" action="{{ action('StudijskiProgramController@odstraniPredmet',['id'=>$program->id,'studijsko_leto'=>str_replace('/20','-',$studijsko_leto)]) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id_predmeta" value="{{ $predmet->id }}">
                                    <input type="submit" class="btn btn-danger" value="X">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                @endforeach
            </table>
        </div>


    @endforeach
        <div id="splošno-izbirni" style="display: none;">
            <h3>Prosto izbirni predmeti</h3>
            <table class="table" class="predmeti">
                <tr>
                    <th>Šifra</th>
                    <th>Ime</th>
                    <th>Tip</th>
                    <th>Nosilec</th>
                    <th>Semester</th>
                    <th>Kreditne točke</th>
                    <th>Odstrani</th>
                </tr>
                @foreach($program->predmeti as $predmet)
                    @if($predmet->pivot->tip=='splošno-izbirni' && $predmet->pivot->studijsko_leto == $studijsko_leto)
                        <tr>
                            <td>{{ $predmet->sifra }}</td>
                            <td><a href="{{ action('PredmetController@show', ['id'=>$predmet->id]) }}">{{ $predmet->naziv }}</a></td>
                            <td>{{ $predmet->pivot->tip }}</td>
                            <td>

                                <?php

                                if($predmet->id_nosilca != null){
                                    if ($predmet->id_nosilca > 0) {
                                        $ime = $predmet->nosilec->ime;
                                        $priimek = $predmet->nosilec->priimek;
                                        echo "$ime $priimek";
                                    }
                                }

                                if($predmet->id_nosilca2 != null){
                                    if ($predmet->id_nosilca2 > 0) {
                                        $ime2 = $predmet->nosilec2->ime;
                                        $priimek2 = $predmet->nosilec2->priimek;
                                        echo ", $ime2 $priimek2";
                                    }
                                }
                                if($predmet->id_nosilca3 != null){
                                    if ($predmet->id_nosilca3 > 0) {
                                        $ime3 = $predmet->nosilec3->ime;
                                        $priimek3 = $predmet->nosilec3->priimek;
                                        echo ", $ime3 $priimek3";
                                    }
                                }
                                ?>

                            </td>
                            <td>
                                @if($predmet->pivot->semester==1){{ 'Zimski' }}@else {{ 'Poletni' }} @endif
                            </td>
                            <td>{{ $predmet->KT }}</td>
                            <td>
                                <form method="post" action="{{ action('StudijskiProgramController@odstraniPredmet',['id'=>$program->id,'studijsko_leto'=>str_replace('/20','-',$studijsko_leto)]) }}">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" name="id_predmeta" value="{{ $predmet->id }}">
                                    <input type="submit" class="btn btn-danger" value="X">
                                </form>
                            </td>
                        </tr>
            @endif
            @endforeach
            </table>
        </div>
        <hr>
        <div class="dodaj-predmet">
            <a class="btn btn-success odpri-predmetnik-form">Dodaj predmet</a>
            <form action="{{ action('StudijskiProgramController@editPredmetnik', ['id'=>$program->id,'studijsko_leto'=>str_replace('/20','-',$studijsko_leto)]) }}" method="post" class="predmetnik-form" style="width:40%;display:none;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="letnik" value="{{ $letnik->letnik }}">
                <h3>Dodaj predmet v predmetnik</h3>
                <div class="form-group">
                    <label for="tip-select">Tip</label>
                    <select name="tip" id="tip-select" class="form-control">
                        <option value="obvezni">Obvezni</option>
                        <option value="strokovni-izbirni">Strokovni izbirni</option>
                        <option value="modulski">Modulski</option>
                        <option value="splošno-izbirni">Prosto izbirni</option>
                    </select>
                </div>
                <div class="modul" style="display:none">
                    <div class="form-group">
                        <label>Modul</label>
                        <select name="modul" class="form-control modul-select">
                            <option value="0">Izberi modul...</option>
                            <option value="new">Ustvari nov modul</option>
                            @foreach($program->moduli as $modul)
                                @if($modul->studijsko_leto==$studijsko_leto)
                                    <option value="{{ $modul->id }}">{{ $modul->ime }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="nov-modul" style="display:none;">
                        <div class="form-group">
                            <label for="ime_modula">Ime modula</label>
                            <input type="text" name="ime_modula" class="form-control" id="ime_modula" placeholder="Ime modula...">
                        </div>
                        <div class="form-group">
                            <label for="opis">Opis</label>
                            <textarea id="opis" name="opis_modula" clasS="form-control" placeholder="Opis modula..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group predmet">
                    <label for="predmet">Predmet</label>
                    <select name="predmet" id="predmet" class="form-control">
                        @foreach($predmeti->sortBy('sifra') as $predmet)
                            <option value="{{ $predmet->id }}">{{ '['.$predmet->sifra.'] '.$predmet->naziv }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group letnik">
                    <label for="letnik">Letnik</label>
                    <select name="letnik" id="letnik" class="form-control">
                        @foreach($program->letniki as $letnik)
                            <option value="{{ $letnik->letnik }}">{{ $letnik->letnik.'. letnik' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group predmet_kt">
                    <label for="KT">Kreditne točke</label>
                    <input type="number" name="KT" id="KT" value="6" class="form-control">
                </div>
                <div class="form-group predmet_semester">
                    <label for="semester">Semester</label>
                    <select name="semester" id="semester" class="form-control">
                        <option value="1">Zimski</option>
                        <option value="2">Poletni</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-success" value="Shrani">
            </form>
        </div>
        </div>
    </div>
@endsection