@extends('app')

@section('content')

    <div class="form-group">
        <h3>Ustvarjanje predmeta</h3>
        <form action="" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <div>
        </div>
        <div class="form-group">
            <label for ="naziv">Naziv</label>
            <input type="text" name="naziv" id="naziv" value="" class="form-control" >
        </div>
        <div class="form-group">
            <label for ="sifra">Šifra predmeta</label>
            <input type="text" name="sifra" id="sifra" class="form-control" value="" >
        </div>
        <div class="form-group">
            <label for="nosilec">Nosilec</label>
            <select name="id_nosilca" id="nosilec" class="form-control" >
                @foreach($nosilci as $nosilec)
                    <option value="{{ $nosilec->id }}">{{ $nosilec->ime }} {{ $nosilec->priimek }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nosilec">Sekundarni nosilec</label>
            <select name="id_nosilca2" id="nosilec" class="form-control" >
                <option value="0"> </option>
                @foreach($nosilci as $nosilec)
                    <option value="{{ $nosilec->id }}">{{ $nosilec->ime }} {{ $nosilec->priimek }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nosilec">Terciarni nosilec</label>
            <select name="id_nosilca3" id="nosilec" class="form-control" class="form-control" >
                <option value="0"> </option>
                @foreach($nosilci as $nosilec)
                    <option value="{{ $nosilec->id }}">{{ $nosilec->ime }} {{ $nosilec->priimek }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="KT">Kreditne točke</label>
            <input id="KT" name="KT" value="" class="form-control" >
        </div>
        <div class="form-group">
            <label for="tip">Tip predmeta</label>
            <select name="tip" id="tip">
                <option value="obvezni">Obvezni</option>
                <option value="modulski">Modulski</option>
                <option value="strokovni-izbirni">Strokovni izbirni</option>
                <option value="prosto-izbirini">Prosto izbirni</option>
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
        <div class="form-group">
            <label for="opis">Opis predmeta</label>
            <div class="editor-wapper">
                <textarea id="opis" name="opis" class="form-control" ></textarea>
            </div>
        </div>
            <input type="submit" value="Shrani" >
        </form>
    </div>

@endsection