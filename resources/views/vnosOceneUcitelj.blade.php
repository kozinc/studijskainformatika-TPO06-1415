@extends('app')

@section('content')
    <div class="container jumbotron">
        @if($errors->any())
            <div class="alert alert-danger" role="alert">
                {{$errors->first()}}
            </div>
        @endif

        {!! Form::open( array('action' => 'PredmetiUciteljController@obdelajObrazecOcena', 'method'=>'post', 'class' => 'form-horizontal')) !!}

        <div class="panel panel-heading"><h2 style="color: #005580">Vnos ocene</h2></div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="form-group">
                    <div class="col-lg-3">
                        <label for="vpisna">Vpisna številka študenta: </label>
                        <input type="text" id="vpisna" name="vpisna" value="{{($student->vpisna)}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <label for="student">Ime in priimek študenta: </label>
                        <input type="text" id="student" name="student" value="{{($student->ime)}} {{($student->priimek)}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <label for="predmet">Predmet </label>
                        <input type="text" id="predmet" name="predmet" value="{{($predmet->naziv)}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <label for="sifra">Šifra predmeta </label>
                        <input type="text" id="sifra" name="sifra" value="{{($predmet->sifra)}}" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <label for="sel1">Datum izpitnega roka </label>
                        <select class="form-control" id="sel1" name="datum">
                            <option>Vnos brez polaganja.</option>
                            @foreach($datumi as $datum)
                                <option role="presentation">{{date('d.m.Y',strtotime($datum))}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-lg-3">
                        <label for="ocena">Ocena: </label>
                        <input type="text" id="ocena" name="ocena" value="" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        {!! Form::submit('Vnesi oceno.', array('class' => 'btn btn-success')) !!}

        {!! Form::close() !!}
    </div>


@endsection