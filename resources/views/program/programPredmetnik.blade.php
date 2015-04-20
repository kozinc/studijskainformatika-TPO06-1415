
@extends('app')

@section('content')
    <ul class="nav nav-pills">
    @foreach($program->letniki as $letnik)
        <li role="presentation" data-letnik="{{ $letnik->letnik }}" class="letnik-tab @if($letnik->letnik == 1){{ 'active' }}@endif">
            <a href="#">{{ $letnik->letnik.'. letnik' }}</a>
        </li>
    @endforeach
        <li role="presentation">
            <a href="#" class="letnik-tab" data-letnik="0">Prosto izbirni predmeti</a>
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
    </div>
@endsection