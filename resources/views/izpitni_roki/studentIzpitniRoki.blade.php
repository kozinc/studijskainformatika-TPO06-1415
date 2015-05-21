@extends('app')
@section('content')
    @include('response')
    <h3>Razpisani izpitni roki</h3>
    <form id="prijava_na_izpit" action="{{ action('IzpitController@prijava') }}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="hidden" name="action" id="action" value="">
        <input type="hidden" name="student_id" value="{{ $student->id }}">
        <input type="hidden" name="izpitni_rok_id" id="izpitni_rok_id" value="">
        <table class="table">
            <tr>
               <th>Letnik</th>
               <th>Predmet</th>
               <th>Izvajalec</th>
               <th>Datum</th>
               <th>Ura</th>
               <th>Predavalnica</th>
               <th></th>
            </tr>
            @foreach($izpitni_roki as $roki_za_predmet)
                @foreach($roki_za_predmet as $rok)
                    @if(!in_array($rok->id_predmeta, $opravljeni_predmeti))
                    <tr>
                        <td></td>
                        <td>{{ $rok->predmet->naziv }}</td>
                        <td>
                            @if(isset($rok->predmet->predmet_nosilec->nosilec))
                             {{ $rok->predmet->predmet_nosilec->nosilec->ime.' '.$rok->predmet->predmet_nosilec->nosilec->priimek }}
                            @else
                                {{ $rok->predmet->nosilec->ime.' '.$rok->predmet->nosilec->priimek }}
                            @endif

                            @if(isset($rok->predmet->predmet_nosilec->nosilec2))
                                {{ ', '.$rok->predmet->predmet_nosilec->nosilec2->ime.' '.$rok->predmet->predmet_nosilec->nosilec2->priimek }}
                            @endif
                            @if(isset($rok->predmet->predmet_nosilec->nosilec3))
                                {{ ', '.$rok->predmet->predmet_nosilec->nosilec3->ime.' '.$rok->predmet->predmet_nosilec->nosilec3->priimek }}
                            @endif
                        </td>
                        <td>{{ date('d.m.Y',strtotime($rok->datum)) }}</td>
                        <td>{{ $rok->ura_izpita }}</td>
                        <td>{{ $rok->predavalnice }}</td>
                        <td>
                            @if(in_array($rok->id_predmeta,$neocenjena_polaganja))
                                @if(in_array($rok->id,$prijave))
                                    <input type="button" class="btn btn-danger izpitni_roki" data-action="odjava" data-izpitni_rok_id="{{ $rok->id }}" value="Odjava">
                                @else
                                  <p>Prijava na ta predmet že obstaja.</p>
                                @endif
                            @elseif(isset($stevilo_polaganj[$rok->id_predmeta]) && $stevilo_polaganj[$rok->id_predmeta] >= 3 && $stevilo_polaganj[$rok->id_predmeta] < 6)
                                <input type="button" class="btn btn-success izpitni_roki placljiv_izpit" data-action="prijava"  data-izpitni_rok_id="{{ $rok->id }}" value="Prijava">
                            @elseif($rok->datum > date('Y-m-d',strtotime('+1 day')))
                                @if(in_array($rok->id,$prijave))
                                    <input type="button" class="btn btn-danger izpitni_roki" data-action="odjava" data-izpitni_rok_id="{{ $rok->id }}" value="Odjava">
                                @else
                                    <input type="button" class="btn btn-success izpitni_roki" data-action="prijava" data-izpitni_rok_id="{{ $rok->id }}" value="Prijava">
                                @endif
                            @else
                                @if(in_array($rok->id,$prijave))
                                    <p>Rok za odjavo je potekel</p>
                                @else
                                    <p>Rok za prijavo je potekel</p>
                                @endif
                            @endif
                        </td>
                    </tr>
                    @endif
                @endforeach
            @endforeach
        </table>
    </form>

@endsection