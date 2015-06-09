@extends('app')
@section('content')
    @include('response')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Razpisani izpitni roki v študijskem letu {{ str_replace('/20','-',$trenutno_leto) }} </h3>
            @if($referent)
                <p>Študent:{{ $student->ime.' '.$student->priimek }}</p>
                <p>Vpisna: {{ $student->vpisna }}</p>
                <p>Vrsta vpisa v študijskem letu {{ str_replace('/20','-',$trenutno_leto) }}: @if($redno) Prvi vpis v letnik @elseif($pavzer) Nevpisani @elseif($ponavljanje) Ponavljanje letnika @endif</p>
                <a href="{{ action('KartotecniListController@prikazKartotecniList', ['id'=>$student->id]) }}">Kartotečni list</a>
            @endif
        </div>
        <div class="panel-body">
            <form id="prijava_na_izpit" action="{{ action('IzpitController@prijava') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="action" id="action" value="">
                <input type="hidden" name="student_id" value="{{ $student->id }}">
                <input type="hidden" name="izpitni_rok_id" id="izpitni_rok_id" value="">
                <input type="hidden" name="placilo_izpita" id="placilo_izpita" value="0">
                <table class="table">
                    <tr>
                        <th>Letnik</th>
                        <th>Predmet</th>
                        <th>Izvajalec</th>
                        <th>Datum</th>
                        <th>Ura</th>
                        <th>Predavalnica</th>
                        @if($referent)
                            <th>Opozorilo</th>
                        @endif
                        <th></th>

                    </tr>
                    @foreach($izpitni_roki as $rok)
                        @if(!in_array($rok->id_predmeta, $opravljeni_predmeti) || $referent)
                            <tr>
                                <td>{{ $rok->letnik }}</td>
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
                                @if($referent)
                                    <td>
                                        <ul>
                                            @if(in_array($rok->id, $ocenjena_polaganja))
                                                <li>Ta izpit je že ocenjen, zato odjava ni mogoča.</li>
                                            @endif
                                            @if(in_array($rok->id_predmeta, $opravljeni_predmeti))
                                                <li>Študent že ima oceno pri tem predmetu</li>
                                            @endif
                                            @if($rok->datum <= date('Y-m-d',strtotime('+ 1 day')))
                                                @if(in_array($rok->id,$prijave))
                                                    <li>Rok za odjavo je potekel</li>
                                                @else
                                                    <li>Rok za prijavo je potekel</li>
                                                @endif
                                            @endif
                                            @if(in_array($rok->id_predmeta,$neocenjena_polaganja))
                                                @if(!in_array($rok->id,$prijave))
                                                    <li>Prijava na ta predmet že obstaja.</li>
                                                @endif
                                            @endif
                                            @if(isset($pavzerska_polaganja[$rok->id_predmeta]) && $pavzerska_polaganja[$rok->id_predmeta] >= 6)
                                                <li>Presegli ste dovoljeno skupno število opravljanj predmeta.</li>
                                            @elseif(isset($skupna_polaganja[$rok->id_predmeta]) && $skupna_polaganja[$rok->id_predmeta]  >= 6)
                                                <li>Presegli ste dovoljeno skupno število opravljanj predmeta.</li>
                                            @elseif(isset($redna_polaganja[$rok->id_predmeta]) && isset($pavzerska_polaganja[$rok->id_predmeta]) && ($redna_polaganja[$rok->id_predmeta] + $pavzerska_polaganja[$rok->id_predmeta]) >= 6)
                                                <li>Presegli ste dovoljeno skupno število opravljanj predmeta.</li>
                                            @elseif(isset($letosnja_polaganja[$rok->id_predmeta]) && $letosnja_polaganja[$rok->id_predmeta] >= 3)
                                                <li>Presegli ste dovoljeno število opravljanj v tem študijskem letu.</li>
                                                @if($rok->datum > date('Y-m-d',strtotime('+1 day')))
                                                    @if(isset($premalo_dni[$rok->id_predmeta]) && $premalo_dni[$rok->id_predmeta] > date('Y-m-d',strtotime('-10 days '.$rok->datum)) )
                                                        <li>Od zadnjega polaganja ni preteklo dovolj dni.</li>
                                                    @endif
                                                @endif
                                            @endif
                                        </ul>
                                    </td>
                                    <td>
                                    @if(in_array($rok->id,$prijave))
                                        @if(!in_array($rok->id,$ocenjena_polaganja) && !in_array($rok->id_predmeta, $opravljeni_predmeti))
                                            <input type="button" class="btn btn-danger izpitni_roki" data-action="odjava" data-referent="1" data-izpitni_rok_id="{{ $rok->id }}" value="Odjava">
                                        @endif
                                    @else
                                            <input type="button" class="btn btn-success izpitni_roki placljiv_izpit" data-referent="1" data-action="prijava" value="Prijava" data-izpitni_rok_id="{{ $rok->id }}" data-pavzer="{{ intval($pavzer) }}"
                                            @if($pavzer)
                                                @if(isset($pavzerska_polaganja[$rok->id_predmeta])){{ 'data-polaganje='.$pavzerska_polaganja[$rok->id_predmeta]}}
                                                        @else{{ 'data-polaganje=0' }}
                                                        @endif
                                                    @elseif($redno)
                                                @if(isset($polaganja_s_statusom[$rok->id_predmeta])){{ 'data-polaganje='.$polaganja_s_statusom[$rok->id_predmeta] }}
                                                        @else {{ 'data-polaganje=0' }}
                                                        @endif
                                                    @elseif($ponavljanje)
                                                @if(isset($letosnja_polaganja[$rok->id_predmeta])){{ 'data-polaganje='.$letosnja_polaganja[$rok->id_predmeta]}}
                                                        @else {{ 'data-polaganje=0' }}
                                                        @endif
                                                    @else {{ 'data-polaganje=0' }}
                                                   @endif
                                                   >
                                        @endif
                                    </td>
                                @else
                                    <td>
                                        @if($rok->datum <= date('Y-m-d',strtotime('+ 1 day')))
                                            @if(in_array($rok->id,$prijave))
                                                <p>Rok za odjavo je potekel</p>
                                            @else
                                                <p>Rok za prijavo je potekel</p>
                                            @endif
                                        @elseif(in_array($rok->id_predmeta,$neocenjena_polaganja))
                                            @if(in_array($rok->id,$prijave))
                                                <input type="button" class="btn btn-danger izpitni_roki" data-toggle="tooltip" data-referent="0" title="Odjavite se lahko do {{ date('d.m.Y 0:59',strtotime($rok->datum.' -1 day')) }}" data-action="odjava" data-izpitni_rok_id="{{ $rok->id }}" value="Odjava">
                                            @else
                                                <p>Prijava na ta predmet že obstaja.</p>
                                            @endif
                                        @elseif(isset($pavzerska_polaganja[$rok->id_predmeta]) && $pavzerska_polaganja[$rok->id_predmeta] >= 6)
                                            <p>Presegli ste dovoljeno skupno število opravljanj predmeta.</p>
                                        @elseif(isset($skupna_polaganja[$rok->id_predmeta]) && $skupna_polaganja[$rok->id_predmeta]  >= 6)
                                            <p>Presegli ste dovoljeno skupno število opravljanj predmeta.</p>
                                        @elseif(isset($redna_polaganja[$rok->id_predmeta]) && isset($pavzerska_polaganja[$rok->id_predmeta]) && ($redna_polaganja[$rok->id_predmeta] + $pavzerska_polaganja[$rok->id_predmeta]) >= 6)
                                            <p>Presegli ste dovoljeno skupno število opravljanj predmeta.</p>
                                        @elseif(isset($letosnja_polaganja[$rok->id_predmeta]) && $letosnja_polaganja[$rok->id_predmeta] >= 3)
                                            <p>Presegli ste dovoljeno število opravljanj v tem študijskem letu.</p>
                                        @elseif($rok->datum > date('Y-m-d',strtotime('+1 day')))
                                            @if(isset($premalo_dni[$rok->id_predmeta]) && $premalo_dni[$rok->id_predmeta] > date('Y-m-d',strtotime('-10 days '.$rok->datum)) )
                                                <p>Od zadnjega polaganja ni preteklo dovolj dni.</p>
                                            @elseif(in_array($rok->id,$prijave))
                                                <input type="button" class="btn btn-danger izpitni_roki" data-toggle="tooltip" data-referent="0" title="Prijavite se lahko do {{ date('d.m.Y 0:59',strtotime($rok->datum.' -1 day')) }}." data-action="odjava" data-izpitni_rok_id="{{ $rok->id }}" value="Odjava">
                                            @else
                                                <input type="button" class="btn btn-success izpitni_roki placljiv_izpit" data-toggle="tooltip" data-referent="0" data-action="prijava" data-izpitni_rok_id="{{ $rok->id }}" data-pavzer="{{ intval($pavzer) }}"
                                                @if($pavzer)
                                                    @if(isset($pavzerska_polaganja[$rok->id_predmeta]))
                                                       title="Prijavite se lahko do {{ date('d.m.Y 0:59',strtotime($rok->datum.' -1 day')) }}. To bo vaše {{ $pavzerska_polaganja[$rok->id_predmeta]+1 }}. polaganje. Izpit je plačljiv! " {{ 'data-polaganje='.$pavzerska_polaganja[$rok->id_predmeta]}}
                                                    @else title="Prijavite se lahko do {{ date('d.m.Y 0:59',strtotime($rok->datum.' -1 day')) }}. To bo vaše 1. polaganje. Izpit je plačljiv!" {{ 'data-polaganje=0' }}
                                                    @endif
                                                @elseif($redno)
                                                    @if(isset($polaganja_s_statusom[$rok->id_predmeta]))
                                                       title="Prijavite se lahko do {{ date('d.m.Y 0:59',strtotime($rok->datum.' -1 day')) }}. To bo vaše {{ $polaganja_s_statusom[$rok->id_predmeta]+1 }}. polaganje." {{ 'data-polaganje='.$polaganja_s_statusom[$rok->id_predmeta] }}
                                                    @else title="Prijavite se lahko do {{ date('d.m.Y 0:59',strtotime($rok->datum.' -1 day')) }}. To bo vaše 1. polaganje." {{ 'data-polaganje=0' }}
                                                    @endif
                                                @elseif($ponavljanje)
                                                    @if(isset($letosnja_polaganja[$rok->id_predmeta]))
                                                       title="Prijavite se lahko do {{ date('d.m.Y 0:59',strtotime($rok->datum.' -1 day')) }}. To bo vaše {{ $letosnja_polaganja[$rok->id_predmeta]+1 }} polaganje."{{ 'data-polaganje='.$letosnja_polaganja[$rok->id_predmeta]}}
                                                        @else title="Prijavite se lahko do {{ date('d.m.Y 0:59',strtotime($rok->datum.' -1 day')) }}. To bo vaše 1. polaganje." {{ 'data-polaganje=0' }}
                                                        @endif
                                                    @else title="Prijavite se lahko do {{ date('d.m.Y 0:59',strtotime($rok->datum.' -1 day')) }}. To bo vaše 1. polaganje." {{ 'data-polaganje=0' }}
                                                   @endif
                                                       value="Prijava">
                                            @endif
                                        @else
                                            @if(in_array($rok->id,$prijave))
                                                <p>Rok za odjavo je potekel</p>
                                            @else
                                                <p>Rok za prijavo je potekel</p>
                                            @endif
                                        @endif
                                    </td>
                                @endif
                            </tr>
                        @endif
                    @endforeach
                </table>
            </form>
        </div>
    </div>

@endsection