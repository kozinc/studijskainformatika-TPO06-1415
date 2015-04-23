
@extends('app')

@section('content')
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
    <h3>Predmetnik</h3>
    <div>
    @foreach($program->letniki as $letnik)
        <div id="letnik-{{ $letnik->letnik }}" @if($letnik->letnik!=1)style="display:none"@endif>
            <table class="table" class="predmeti">
                <tr>
                    <th>Šifra</th>
                    <th>Ime</th>
                    <th>Tip</th>
                    <th>Nosilec</th>
                    <th>Semester</th>
                    <th>Kreditne točke</th>
                </tr>
                <tr>
                    <td colspan="6">Obvezni predmeti</td>
                </tr>
                @foreach($program->predmeti as $predmet)
                    @if($predmet->pivot->letnik == $letnik->letnik && $predmet->pivot->tip=='obvezni')
                    <tr>
                        <td>{{ $predmet->id }}</td>
                        <td><a href="{{ action('PredmetController@show', ['id'=>$predmet->id]) }}">{{ $predmet->naziv }}</a></td>
                        <td>{{ $predmet->pivot->tip }}</td>
                        <td>{{ $predmet->nosilec->ime }} {{$predmet->nosilec->priimek}}</td>
                        <td>
                            @if($predmet->semester==0){{ 'Zimski' }}@else {{ 'Poletni' }} @endif
                        </td>
                        <td>{{ $predmet->KT }}</td>
                    </tr>
                    @endif
                @endforeach
                <tr>
                    <td colspan="6">Strokovni izbirni predmeti</td>
                </tr>
                @foreach($program->predmeti as $predmet)
                    @if($predmet->pivot->letnik == $letnik->letnik && $predmet->pivot->tip=='strokovni-izbirni')
                        <tr>
                            <td>{{ $predmet->id }}</td>
                            <td><a href="{{ action('PredmetController@show', ['id'=>$predmet->id]) }}">{{ $predmet->naziv }}</a></td>
                            <td>{{ $predmet->pivot->tip }}</td>
                            <td>{{ $predmet->nosilec->ime }} {{$predmet->nosilec->priimek}}</td>
                            <td>
                                @if($predmet->semester==0){{ 'Zimski' }}@else {{ 'Poletni' }} @endif
                            </td>
                            <td>{{ $predmet->KT }}</td>
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
                </tr>
                @foreach($program->moduli as $modul)
                    @if($modul->letnik == $letnik->letnik && $modul->studijsko_leto=='2014/2015')
                        <tr>
                            <td colspan="6">{{ $modul->ime }}</td>
                        </tr>
                        @foreach($modul->predmeti as $predmet)
                        <tr>
                            <td>{{ $predmet->id }}</td>
                            <td><a href="{{ action('PredmetController@show', ['id'=>$predmet->id]) }}">{{ $predmet->naziv }}</a></td>
                            <td>{{ $predmet->pivot->tip }}</td>
                            <td>{{ $predmet->nosilec->ime }} {{$predmet->nosilec->priimek}}</td>
                            <td>
                                @if($predmet->semester==0){{ 'Zimski' }}@else {{ 'Poletni' }} @endif
                            </td>
                            <td>{{ $predmet->KT }}</td>
                        </tr>
                        @endforeach
                    @endif
                @endforeach
            </table>
        </div>


    @endforeach
        <div id="prosto-izbirni">
            <h3>Prosto izbirni predmeti</h3>
            <table class="table" class="predmeti">
                <tr>
                    <th>Šifra</th>
                    <th>Ime</th>
                    <th>Tip</th>
                    <th>Nosilec</th>
                    <th>Semester</th>
                    <th>Kreditne točke</th>
                </tr>
                @foreach($program->predmeti as $predmet)
                    @if($predmet->pivot->tip=='prosto-izbirni')
                        <tr>
                            <td>{{ $predmet->id }}</td>
                            <td><a href="{{ action('PredmetController@show', ['id'=>$predmet->id]) }}">{{ $predmet->naziv }}</a></td>
                            <td>{{ $predmet->pivot->tip }}</td>
                            <td>{{ $predmet->nosilec->ime }} {{$predmet->nosilec->priimek}}</td>
                            <td>
                                @if($predmet->semester==0){{ 'Zimski' }}@else {{ 'Poletni' }} @endif
                            </td>
                            <td>{{ $predmet->KT }}</td>
                        </tr>
            @endif
            @endforeach
            </table>
        </div>
        <div class="dodaj-predmet">
            <a class="btn btn-success odpri-predmetnik-form">Dodaj predmet</a>
            <form action="" method="post" class="predmetnik-form" style="width:40%;display:none;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="letnik" value="{{ $letnik->letnik }}">
                <h3>Dodaj nov predmet</h3>
                <div class="form-group">
                    <label for="predmet">Predmet</label>
                    <select name="predmet" id="predmet" class="form-control">
                        @foreach($predmeti as $predmet)
                            <option value="{{ $predmet->id }}">{{ $predmet->naziv }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tip-select">Tip</label>
                    <select name="tip" id="tip-select" class="form-control">
                        <option value="obvezni">Obvezni</option>
                        <option value="strokovni-izbirni">Strokovni izbirni</option>
                        <option value="modulski">Modulski</option>
                        <option value="prosto-izbirni">Prosto izbirni</option>
                    </select>
                </div>
                <div class="modul" style="display:none">
                    <div class="form-group">
                        <label>Modul</label>
                        <select name="modul" class="form-control modul-select">
                            <option value="0">Izberi modul...</option>
                            <option value="new">Ustvari nov modul</option>
                            @foreach($program->moduli as $modul)
                                @if($modul->studijsko_leto=='2014/2015')
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
                            <textarea id="opis" name="opis" clasS="form-control" placeholder="Opis modula..."></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-group letnik">
                    <label for="letnik">Letnik</label>
                    <select name="letnik" id="letnik" class="form-control">
                        @foreach($program->letniki as $letnik)
                            <option value="{{ $letnik->letnik }}">{{ $letnik->letnik.'. letnik' }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="KT">Kreditne točke</label>
                    <input type="number" name="KT" id="KT" value="6" class="form-control">
                </div>
                <div class="form-group">
                    <label for="semester">Semester</label>
                    <select name="semester" id="semester" class="form-control">
                        <option value="zimski">Zimski</option>
                        <option value="poletni">Poletni</option>
                    </select>
                </div>
                <input type="submit" class="btn btn-success" value="Shrani">
            </form>
        </div>

    </div>
@endsection