@extends('app')

@section('content')


    <table class="table">
        <tr>
            <th>Šifra</th>
            <th>Ime</th>
            <!-- <th>Tip</th> -->
            <th>Nosilec</th>
            <th>Kreditne točke</th>
        </tr>
            <tr>
                <td>{{ $predmet->sifra }}</td>
                <td>{{ $predmet->naziv }}</td>
                <!-- <td>{{ $predmet->tip }}</td> -->
                <td>

                    @foreach($predmetnosilci as $predmetnosilec)
                        @if($predmetnosilec->id_predmeta == $predmet->id )
                            <!--
                            <div>
                                {{ $predmetnosilec->studijsko_leto or "Manjkajoče leto"  }}

                                {{ isset($predmetnosilec->nosilec->ime) ? $predmetnosilec->nosilec->ime : "Error Nosilec1" }}
                                {{ isset($predmetnosilec->nosilec->priimek) ? $predmetnosilec->nosilec->priimek : "Error Nosilec1" }}
                                {{ isset($predmetnosilec->nosilec2->ime) ? ', '.$predmetnosilec->nosilec2->ime.' '.$predmetnosilec->nosilec2->priimek : "" }}
                                {{ isset($predmetnosilec->nosilec3->ime) ? ', '.$predmetnosilec->nosilec3->ime.' '.$predmetnosilec->nosilec3->priimek : "" }}
                            </div> -->
                            <div>
                            <?php
                            $studijsko_leto = $predmetnosilec->studijsko_leto;
                            $studijsko_leto = str_replace('/20','-',$studijsko_leto);
                            echo "$studijsko_leto: ";

                            if($predmetnosilec->id_nosilca != null){
                                if ($predmetnosilec->id_nosilca > 0) {
                                    $ime = $predmetnosilec->nosilec->ime;
                                    $priimek = $predmetnosilec->nosilec->priimek;
                                    echo "$ime $priimek";
                                }
                            }
                            if($predmetnosilec->id_nosilca2 != null){
                                if ($predmetnosilec->id_nosilca2 > 0) {
                                    $ime2 = $predmetnosilec->nosilec2->ime;
                                    $priimek2 = $predmetnosilec->nosilec2->priimek;
                                    echo ", $ime2 $priimek2";
                                }
                            }
                            if($predmetnosilec->id_nosilca3 != null){
                                if ($predmetnosilec->id_nosilca3 > 0) {
                                    $ime3 = $predmetnosilec->nosilec3->ime;
                                    $priimek3 = $predmetnosilec->nosilec3->priimek;
                                    echo ", $ime3 $priimek3";
                                }
                            }
                            ?>
                            </div>
                        @endif
                    @endforeach

                    <!-- <?php

                    if($predmetnosilec->id_nosilca != null){
                        if ($predmetnosilec->id_nosilca > 0) {
                            $ime = $predmetnosilec->nosilec->ime;
                            $priimek = $predmetnosilec->nosilec->priimek;
                            echo "$ime $priimek";
                        }
                    }
                    if($predmetnosilec->id_nosilca2 != null){
                        if ($predmetnosilec->id_nosilca2 > 0) {
                            $ime2 = $predmetnosilec->nosilec2->ime;
                            $priimek2 = $predmetnosilec->nosilec2->priimek;
                            echo ", $ime2 $priimek2";
                        }
                    }
                    if($predmetnosilec->id_nosilca3 != null){
                        if ($predmetnosilec->id_nosilca3 > 0) {
                            $ime3 = $predmetnosilec->nosilec3->ime;
                            $priimek3 = $predmetnosilec->nosilec3->priimek;
                            echo ", $ime3 $priimek3";
                        }
                    }
                    ?> -->



                </td>
                <td>{{ $predmet->KT }}</td>
            </tr>
    </table>

    <form action="{{ action('PredmetController@export') }}" method="post">
        <input class="btn" type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <input class="btn" type="hidden" name="target" value="predmet">
        <input class="btn" type="hidden" name="id" value="{{ $predmet->id }}">
        <a class="btn btn-default" href="{{ $predmet->id }}/edit">Spremeni</a>
        <input class="btn" type="submit" name="csv" value="Izvozi CSV">
        <input class="btn" type="submit" name="pdf" value="Izvozi PDF">
    </form>
@endsection