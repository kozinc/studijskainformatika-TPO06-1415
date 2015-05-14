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
                    <h3>Urejanje trojke</h3>



                    <form action="" method="post">
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                        <input type="hidden" name="id" value="{{ $trojka->id }}" >
                        <div>
                            <!-- ID trojke {{ $trojka->id }} -->
                        </div>
                        <div>
                            <!-- ID Predmeta {{ $trojka->id_predmeta }} -->

                            <div class="panel panel-default panel-body">
                                ID predmeta: {{ $trojka->id_predmeta }}
                                @foreach($predmeti as $predmet)
                                    @if( $predmet->id == $trojka->id_predmeta)
                                        <div>Predmet: {{ $predmet->naziv }}</div>
                                        <div>Opis predmeta: {{ $predmet->opis  }}</div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <!-- Študijsko leto -->
                        <div class="form-group">
                            Študijsko Leto trojke:
                            <input type="text" name="studijsko_leto" id="studijsko_leto" class="form-control" value="{{ $trojka->studijsko_leto }}" >
                        </div>

                        <!-- Nosilci -->
                        <div class="panel panel-default panel-body">
                            <div class="form-group">
                                <label for="nosilec">1. Nosilec</label>
                                <select name="id_nosilca" id="nosilec" class="form-control" >
                                    @foreach($nosilci as $nosilec)
                                        <option value="{{ $nosilec->id }}" <?php if($trojka->nosilec->id == $nosilec->id) echo "selected";?> >{{ $nosilec->ime }} {{ $nosilec->priimek }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nosilec">2. nosilec</label>
                                <select name="id_nosilca2" id="nosilec"  class="form-control" >
                                    <option value="0" <?php if($trojka->id_nosilca2 == 0) echo "selected";?> > </option>
                                    @foreach($nosilci as $nosilec2)
                                        <option value="{{ $nosilec2->id }}"
                                        <?php
                                                if($trojka->id_nosilca2 > 0) { if($trojka->nosilec2->id == $nosilec2->id) echo "selected"; }
                                                ?> >{{ $nosilec2->ime }} {{ $nosilec2->priimek }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nosilec">3. nosilec</label>
                                <select name="id_nosilca3" id="nosilec"  class="form-control" >
                                    <option value="0" <?php if($trojka->id_nosilca3 == 0) echo "selected";?> > </option>
                                    @foreach($nosilci as $nosilec3)
                                        <option value="{{ $nosilec3->id }}"
                                        <?php
                                                if($trojka->id_nosilca3 > 0) { if($trojka->nosilec3->id == $nosilec3->id) echo "selected"; }
                                                ?> >{{ $nosilec3->ime }} {{ $nosilec3->priimek }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <input type="submit" value="Shrani" >
                    </form>
                </div>
            </div>



@endsection