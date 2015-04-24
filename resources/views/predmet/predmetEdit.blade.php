@extends('app')

@section('content')

    @if(isset($odgovor))
    <div class="panel panel-default">
        <div class="panel-body">
            {{ $odgovor }}
        </div>
    </div>
    @endif
    <div class="form-group">
        <h3>Urejanje predmeta</h3>
        <form action="" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <input type="hidden" name="id" value="{{ $predmet->id }}" >
        <div>
            {{ $predmet->id }}
        </div>
        <div class="form-group">
            <label for ="naziv">Naziv</label>
            <input type="text" name="naziv" id="naziv" value="{{ $predmet->naziv }}" >
        </div>
        <div class="form-group">
            <label for="nosilec">Nosilec</label>
            <select name="id_nosilca" id="nosilec">
                @foreach($nosilci as $nosilec)
                    <option value="{{ $nosilec->id }}" <?php if($predmet->nosilec->id == $nosilec->id) echo "selected";?> >{{ $nosilec->ime }} {{ $nosilec->priimek }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nosilec">Sekundarni nosilec</label>
            <select name="id_nosilca2" id="nosilec">
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
            <label for="nosilec">Terciarni nosilec</label>
            <select name="id_nosilca3" id="nosilec">
                <option value="0" <?php if($predmet->id_nosilca3 == 0) echo "selected";?> > </option>
                @foreach($nosilci as $nosilec3)
                    <option value="{{ $nosilec3->id }}"
                    <?php
                            if($predmet->id_nosilca3 > 0) { if($predmet->nosilec3->id == $nosilec3->id) echo "selected"; }
                            ?> >{{ $nosilec3->ime }} {{ $nosilec3->priimek }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="kt">Kreditne točke</label>
            <input id="kt" name="kt" value="{{ $predmet->KT }}">
        </div>
        <div class="form-group">
            <label for="tip">Tip predmeta</label>
            <select name="tip" id="tip">
                <option value="obvezni" @if($predmet->tip=='obvezni') {{ "selected" }} @endif>Obvezni</option>
                <option value="modulski"@if($predmet->tip=='modulski') {{ "selected" }} @endif>Modulski</option>
                <option value="strokovni-izbirni"@if($predmet->tip=='strokovni-izbirni') {{ "selected" }} @endif>Strokovni izbirni</option>
                <option value="prosto-izbirini"@if($predmet->tip=='prosto-izbirni') {{ "selected" }} @endif>Prosto izbirni</option>
            </select>
        </div>
        <div class="form-group">
            <label for="modul">Modul</label>
            <select name="id_modula" id="modul">
                <option value="0">--- izberi modul ---</option>
                @foreach($moduli as $modul)
                    <option value="{{ $modul->id }}">{{ $modul->ime }}</option>
                @endforeach
            </select>
        </div>
            <input type="submit" value="Shrani" >
        </form>
    </div>


@endsection