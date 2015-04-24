@extends('app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="btn-group" role="group" aria-label="...">
                <button type="button" class="btn btn-default">Vsa polaganja izpitov</button>
                <button type="button" class="btn btn-default">Samo zadnje polaganje</button>
            </div><br><br>
            @foreach($programi->get() as $program)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Šolsko leto {{ $program->studijsko_leto }}</h3>
                    </div>
                    <div class="panel-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Program: {{ $program->studijski_program->ime }} <br><br>
                                Letnik: {{ $program->letnik }}.  <br><br>
                                Vrsta vpisa: {{ $program->vrstaVpisa->ime }}  <br><br>
                                Način študija: {{ $program->nacin_studija }}
                            </div>
                        </div>

                        <table class="table">
                            <tr>
                                <th>Šifra predmeta</th>
                                <th>Ime predmeta</th>
                                <th>Nosilci</th>
                                <th>Datum polaganja</th>
                                <th>Zaporedno število polaganja</th>
                                <th>Zaporedno število polaganja v tem študijskem letu</th>
                                <th>KT</th>
                                <th>Ocena</th>
                            </tr>
                            <div style="display:none">{{$kt=0}}{{$ocena=0}}{{$stevilo=0}}</div>
                            @foreach($predmeti->get() as $predmet)
                                @if($predmet->studijsko_leto == $program->studijsko_leto)
                                    <tr>
                                        <td>{{$predmet->predmet->sifra}}</td>
                                        <td>{{$predmet->predmet->naziv}}</td>
                                        <td>{{$predmet->predmet->nosilec->ime}} {{$predmet->predmet->nosilec->priimek}}</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>{{$predmet->predmet->KT}}</td>
                                        @if ($predmet->ocena!=0)
                                            <div style="display:none">{{$kt=$kt+$predmet->predmet->KT}}</div>
                                        @endif
                                        <td>{{($predmet->ocena==0)?'':$predmet->ocena}}</td>
                                        <div style="display:none">{{$ocena=$ocena+$predmet->ocena}}{{$stevilo++}}</div>
                                    </tr>
                                @endif
                            @endforeach
                        </table>
                        <div class="panel panel-default">
                            <div class="panel-body">
                                Povprečna ocena: {{($stevilo==0)?'':($ocena/$stevilo)}}<br><br>
                                Število KT: {{$kt}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <form action="{{ action('KartotecniListController@export') }}" method="post">
                <input class="btn" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                <input class="btn" type="submit" name="csv" value="Izvozi CSV">
                <input class="btn" type="submit" name="pdf" value="Izvozi PDF">
            </form>

        </div>
    </div>
@endsection