@extends('app')

@section('content')
    <div class="panel-body">
    <div class="panel panel-default">
        <div class="panel-body">
    @if(isset($odgovor))

            {{ $odgovor }}

    @endif
    <div class="form-group">
        <h3>Urejanje predmeta</h3>
        <form action="" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="id" value="{{ $predmet->id }}" >
        <div>
            <!-- ID Predmeta {{ $predmet->id }} -->
        </div>
        <div class="form-group">
            <label for ="sifra">Šifra predmeta</label>
            <input type="text" name="sifra" id="sifra" class="form-control" value="{{ $predmet->sifra }}" >
        </div>
        <div class="form-group">
            <label for ="naziv">Naziv</label>
            <input type="text" name="naziv" id="naziv" class="form-control" value="{{ $predmet->naziv }}" >
        </div>
        <div class="panel panel-default panel-body">
            Trojke:
            @foreach($predmetnosilci as $predmetnosilec)
                @if($predmetnosilec->id_predmeta == $predmet->id )
                    <div>
                        <a href="{{ action('PredmetNosilecController@edit',['id'=>$predmetnosilec->id]) }}">
                            {{ $predmetnosilec->studijsko_leto or "Manjkajoče leto"  }}
                            <!-- {{ $predmetnosilec->id }} -->
                            {{ isset($predmetnosilec->nosilec->ime) ? $predmetnosilec->nosilec->ime : "Error Nosilec1" }}
                            {{ isset($predmetnosilec->nosilec->priimek) ? $predmetnosilec->nosilec->priimek : "Error Nosilec1" }}
                            {{ isset($predmetnosilec->nosilec2->ime) ? ', '.$predmetnosilec->nosilec2->ime.' '.$predmetnosilec->nosilec2->priimek : "" }}
                            {{ isset($predmetnosilec->nosilec3->ime) ? ', '.$predmetnosilec->nosilec3->ime.' '.$predmetnosilec->nosilec3->priimek : "" }}</a>

                    </div>
                @endif
            @endforeach
        </div>

        <!--
        <div class="panel panel-default panel-body">
            <div class="form-group">
                <label for="nosilec">1. Nosilec</label>
                <select name="id_nosilca" id="nosilec" class="form-control" >
                    @foreach($nosilci as $nosilec)
                        <option value="{{ $nosilec->id }}" <?php if($predmet->nosilec->id == $nosilec->id) echo "selected";?> >{{ $nosilec->ime }} {{ $nosilec->priimek }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nosilec">2. nosilec</label>
                <select name="id_nosilca2" id="nosilec"  class="form-control" >
                    <option value="0" <?php if($predmet->id_nosilca2 == 0) echo "selected";?> > </option>
                    @foreach($nosilci as $nosilec2)
                        <option value="{{ $nosilec2->id }}"
                            <?php
                                if($predmet->id_nosilca2 > 0) { if($predmet->nosilec2->id == $nosilec2->id) echo "selected"; }
                            ?> >{{ $nosilec2->ime }} {{ $nosilec2->priimek }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="nosilec">3. nosilec</label>
                <select name="id_nosilca3" id="nosilec" class="form-control" >
                    <option value="0" <?php if($predmet->id_nosilca3 == 0) echo "selected";?> > </option>
                    @foreach($nosilci as $nosilec3)
                        <option value="{{ $nosilec3->id }}"
                            <?php
                                if($predmet->id_nosilca3 > 0) { if($predmet->nosilec3->id == $nosilec3->id) echo "selected"; }
                            ?> >{{ $nosilec3->ime }} {{ $nosilec3->priimek }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        -->

        <div class="form-group">
            <label for="kt">Kreditne točke</label>
            <input id="kt" name="kt" value="{{ $predmet->KT }}"  class="form-control" >
        </div>
        <div class="form-group">
            <label for="tip">Tip predmeta</label>
            <select name="tip" id="tip" class="form-control" >
                <option value="obvezni" @if($predmet->tip=='obvezni') {{ "selected" }} @endif>Obvezni</option>
                <option value="modulski"@if($predmet->tip=='modulski') {{ "selected" }} @endif>Modulski</option>
                <option value="strokovni-izbirni"@if($predmet->tip=='strokovni-izbirni') {{ "selected" }} @endif>Strokovni izbirni</option>
                <option value="prosto-izbirini"@if($predmet->tip=='splošno-izbirni') {{ "selected" }} @endif>Prosto izbirni</option>
            </select>
        </div>
        <!--
        <div class="form-group">
            <label for="modul">Modul</label>
            <select name="id_modula" id="modul">
                <option value="0">--- izberi modul ---</option>
                @foreach($moduli as $modul)
                    <option value="{{ $modul->id }}">{{ $modul->ime }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="opis">Opis predmeta</label>
            <div class="editor-wapper">
                <textarea id="opis" name="opis" class="form-control" >{{ $predmet->opis }}</textarea>
            </div>
        </div>
        s-->
            <input type="submit" value="Shrani" >
        </form>
    </div>
    </div>



@endsection