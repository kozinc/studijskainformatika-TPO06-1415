@extends('app')

@section('content')
    <div class="panel-body">
        <div class="panel panel-default">
            <div class="panel-body">
                @if(isset($odgovor))

                    {{ $odgovor }}

                @endif
                <div class="form-group">
                    <h2>Urejanje predmeta</h2>
                    <h3>Dodajanje trojke</h3>



                    <form action="" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

                        <div>
                            <!-- ID Predmeta {{ $idp }} -->

                            <div class="panel panel-default panel-body">
                                ID predmeta: {{ $idp }}
                                @foreach($predmeti as $predmet)
                                    @if( $predmet->id == $idp)
                                        <div>Predmet: {{ $predmet->naziv }}</div>
                                        <div>Opis predmeta: {{ $predmet->opis  }}</div>
                                    @endif
                                @endforeach

                                <input type="hidden" name="id_predmeta" value="{{ $idp }}" >
                            </div>
                        </div>

                        <!-- Študijsko leto -->
                        <div class="form-group">
                            Študijsko Leto trojke:
                            <input type="text" name="studijsko_leto" id="studijsko_leto" class="form-control" value="" >
                        </div>

                        <!-- Nosilci -->
                        <div class="panel panel-default panel-body">
                            <div class="form-group">
                                <label for="nosilec">1. Nosilec</label>
                                <select name="id_nosilca" id="nosilec" class="form-control" >
                                    @foreach($nosilci as $nosilec)
                                        <option value="{{ $nosilec->id }}" >{{ $nosilec->ime }} {{ $nosilec->priimek }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nosilec">2. nosilec</label>
                                <select name="id_nosilca2" id="nosilec"  class="form-control" >
                                    <option value="0"  > </option>
                                    @foreach($nosilci as $nosilec2)
                                        <option value="{{ $nosilec2->id }}" >{{ $nosilec2->ime }} {{ $nosilec2->priimek }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nosilec">3. nosilec</label>
                                <select name="id_nosilca3" id="nosilec"  class="form-control" >
                                    <option value="0" > </option>
                                    @foreach($nosilci as $nosilec3)
                                        <option value="{{ $nosilec3->id }}" >{{ $nosilec3->ime }} {{ $nosilec3->priimek }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>



                        <input type="submit" value="Shrani" >
                    </form>
                </div>
            </div>



@endsection