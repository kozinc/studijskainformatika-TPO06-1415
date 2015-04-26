@extends('app')

@section('content')
    @include('response')
    <div class="panel">
        <div class="panel-body panel-default">
            <table class="table">
                <tr>
                    <th>Id</th>
                    <th>Ime</th>
                    <th>Oznaka</th>
                    <th>Stopnja</th>
                    <th>Trajanje</th>
                    <th>Število semestrov</th>
                    <th>Kreditne točke</th>
                    <th>Klasius srv</th>
                </tr>

                <tr>
                    <td>{{ $program->id }}</td>
                    <td>{{ $program->ime }}</td>
                    <td>{{ $program->oznaka }}</td>
                    <td>{{ $program->stopnja }}</td>
                    <td>{{ $program->trajanje_leta }}</td>
                    <td>{{ $program->stevilo_semestrov }}</td>
                    <td>{{ $program->KT }}</td>
                    <td>{{ $program->klasius_srv }}</td>
                </tr>
            </table>
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
            <div class="btn-group-vertical">
                <a class="btn btn-danger" href="{{ action('StudijskiProgramController@editPredmetnik', ['id'=>$program->id]) }}">Spremeni</a>
                <br>
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