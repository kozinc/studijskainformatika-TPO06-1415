@extends('app')

@section('content')
    @include('response')
    @if(array_sum($program->letniki->lists('KT')) != $program->KT )
        <div class="alert alert-danger" role="alert">
            Število kreditnih točk programa se ne ujema z vsoto kreditnih točk v letniku.
        </div>
    @endif
    <div class="panel">
        <div class="panel-body panel-default">
            <h3>Informacije o programu</h3>
            <form action="{{ action('StudijskiProgramController@update',['id'=>$program->id]) }}" style="width:30%;">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="_method" value="put">
                <div class="form-group">
                    <label for="id_programa">Id</label>
                    <input type="number" disabled id="id_programa" name="id_programa" class="form-control" value="{{ $program->id }}">
                </div>
                <div class="form-group">
                    <label for="ime">Ime</label>
                    <input type="text" id="ime" name="ime" class="form-control" value="{{ $program->ime }}">
                </div>
                <div class="form-group">
                    <label for="oznaka">Oznaka</label>
                    <input type="text" id="oznaka" name="oznaka" class="form-control" value="{{ $program->oznaka }}">
                </div>
                <div class="form-group">
                    <label for="stopnja">Stopnja</label>
                    <select name="stopnja" id="stopnja">
                        @for($i=1; $i <= 3; $i++)
                            <option value="{{ $i }}" @if($program->stopnja == $i){{ 'selected' }}@endif>{{ $i.'.' }}</option>
                        @endfor
                    </select>
                </div>
                <div class="form-group">
                    <label for="leta">Trajanje [leta]</label>
                    <input type="number" disabled id="leta" name="leta" class="form-control" value="{{ $program->trajanje_leta }}">
                </div>
                <div class="form-group">
                    <label for="stevilo_semestrov">Število semestrov</label>
                    <input type="number" id="stevilo_semestrov" name="stevilo_semestrov" class="form-control" value="{{ $program->stevilo_semestrov }}">
                </div>
                <div class="form-group">
                    <label for="KT">Število kreditnih točk</label>
                    <input type="number" disabled id="KT" name="KT" class="form-control" value="{{ $program->KT }}">
                </div>
                <div class="form-group">
                    <label for="klasius">Klasius</label>
                    <input type="text" id="klasius" name="klasius" class="form-control" value="{{ $program->klasius_srv }}">
                </div>
                <input type="submit" value="Shrani" class="btn btn-danger">
            </form>
            <br>
            <a class="btn btn-danger" id="struktura-open">Prikaži strukturo po letnikih</a>
            <div class="small" id="struktura" style="width:30%;display:none;">
                <h3>Struktura programa</h3>
                <form method="post" action="{{ action('StudijskiProgramController@spremeni_strukturo', ['id'=>$program->id]) }}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    @foreach($program->letniki as $letnik)
                        <h4>{{ $letnik->letnik.'. letnik' }}</h4>
                        <div class="form-group">
                            <label for="KT_{{ $letnik->letnik }}">Kreditne točke</label>
                            <input type="number" min="0" id="KT_{{ $letnik->letnik }}" name="KT_{{ $letnik->letnik }}" class="form-control" value="{{ $letnik->KT }}">
                        </div>
                        <div class="form-group">
                            <label for="obvezni_predmeti_{{ $letnik->letnik }}">Število obveznih predmetov</label>
                            <input type="number" min="0" id="obvezni_predmeti_{{ $letnik->letnik }}" name="obvezni_predmeti_{{ $letnik->letnik }}" class="form-control" value="{{ $letnik->stevilo_obveznih_predmetov }}">
                        </div>
                        <div class="form-group">
                            <label for="strokovni_predmeti_{{ $letnik->letnik }}">Število strokovnih predmetov</label>
                            <input type="number" min="0" id="strokovni_predmeti_{{ $letnik->letnik }}" name="strokovni_predmeti_{{ $letnik->letnik }}" class="form-control" value="{{ $letnik->stevilo_strokovnih_predmetov }}">
                        </div>
                        <div class="form-group">
                            <label for="prosti_predmeti_{{ $letnik->letnik }}">Število prosto izbirnih predmetov</label>
                            <input type="number" min="0" id="prosti_predmeti_{{ $letnik->letnik }}" name="prosti_predmeti_{{ $letnik->letnik }}" class="form-control" value="{{ $letnik->stevilo_prostih_predmetov }}">
                        </div>
                        <div class="form-group">
                            <label for="moduli_{{ $letnik->letnik }}">Število modulov</label>
                            <input type="number" min="0" id="moduli_{{ $letnik->letnik }}" name="moduli_{{ $letnik->letnik }}" class="form-control" value="{{ $letnik->stevilo_modulov }}">
                        </div>
                    @endforeach
                    <h4>Skupaj</h4>
                    <div class="form-group">
                        <label for="KT_skupaj">Kreditne točke</label>
                        <input type="number" id="KT_skupaj" class="form-control" disabled value="{{ array_sum($program->letniki->lists('KT')) }}">
                        <label for="obvezni_skupaj">Število obveznih predmetov</label>
                        <input type="number" id="obvezni_skupaj" class="form-control" disabled value="{{ array_sum($program->letniki->lists('stevilo_obveznik_skupaj')) }}">
                        <label for="strokovni_skupaj">Število strokovnih predmetov</label>
                        <input type="number" id="strokovni_skupaj" class="form-control" disabled value="{{ array_sum($program->letniki->lists('stevilo_strokovnih_predmetov')) }}">
                        <label for="prosti_skupaj">Število prostih predmetov</label>
                        <input type="number" id="prosti_skupaj" class="form-control" disabled value="{{ array_sum($program->letniki->lists('stevilo_prostih_predmetov')) }}">
                        <label for="moduli_skupaj">Število modulv</label>
                        <input type="number" id="moduli_skupaj" class="form-control" disabled value="{{ array_sum($program->letniki->lists('stevilo_modulov')) }}">
                        <input type="submit" class="btn btn-danger" value="Shrani">
                    </div>
                </form>
            </div>
            <br>
            <div class="btn-group-vertical">
            @foreach($studijska_leta as $leto)
                    <a class="btn btn-default" href="{{ $program->id }}/predmetnik-{{ $leto }}">Predmetnik {{ $leto }}</a>
                @endforeach
                @if(!in_array(date('Y').'-'.date('y',strtotime('+1 year')),$studijska_leta))
                    <a class="btn btn-default" href="{{ $program->id }}/predmetnik-{{ date('Y').'-'.date('y',strtotime('+1 year')) }}">Predmetnik {{ date('Y').'-'.date('y',strtotime('+1 year')) }}</a>
                @endif
            </div>
        </div>
    </div>

@endsection