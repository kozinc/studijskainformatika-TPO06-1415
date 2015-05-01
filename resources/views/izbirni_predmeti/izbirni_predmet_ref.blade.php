@extends('app')

@section('content')

    <div class="form-group"  style="width:725px; margin: auto; margin-top: 100px">

        <h4 style="color:#9d9d9d">{{ $opis }}</h4>
        <br><br>

        {!! Form::open(array('action' => 'IzbirniPredmetController@spremeniIzbirnePredmete')) !!}

        <div style="border-radius: 5px 5px 5px 5px; background-color: rgba(220, 221, 222, 0.38)">
            <div style="padding: 10px">
                @if($prosta_izbira_modulskih_predmetov == 1)
                    <label style="color:#9d9d9d">Modulski izbirni predmeti</label>
                    <br><br>
                    @for($i = 0; $i < $st_modulov * 3; $i++)
                        {!! Form::select('modulski'.$i, $modulski, 0, array('class' => 'btn btn-default dropdown-toggle')) !!}
                        <br><br>
                    @endfor
                @else
                    <label style="color:#9d9d9d">Moduli</label>
                    <br><br>
                    @for($i = 0; $i < $st_modulov; $i++)
                        {!! Form::select('modul'.$i, $moduli, 0, array('class' => 'btn btn-default dropdown-toggle')) !!}
                        <br><br>
                    @endfor
                @endif
            </div>
        </div>
        <br>
        @if($st_strokovno > 0)
        <div style="border-radius: 5px 5px 5px 5px; background-color: rgba(220, 221, 222, 0.38)">
            <div style="padding: 10px">
                <label style="color:#9d9d9d">Strokovno izbirni predmeti</label>
                <br><br>
                @for($i = 0; $i <$st_strokovno; $i++)
                    {!! Form::select('strokovno'.$i, $strokovno_izbirni, 0, array('class' => 'btn btn-default dropdown-toggle')) !!}
                    <br><br>
                @endfor
            </div>
        </div>
        @endif
        <br>
        @if($st_prosto > 0)
        <div style="border-radius: 5px 5px 5px 5px; background-color: rgba(220, 221, 222, 0.38)">
            <div style="padding: 10px">
                <label style="color:#9d9d9d">Prosto izbirni predmeti (vsota kreditnih točk mora biti vsaj {{$st_prosto * 6 }} kreditnih točk)</label>
                <br><br>
                @for($i = 0; $i < $st_prosto * 2; $i++)
                    {!! Form::select('prosto'.$i, $prosto_izbirni, 0, array('class' => 'btn btn-default dropdown-toggle')) !!}
                    <br><br>
                @endfor
            </div>
        </div>
        @endif
        <br>
        <br>
        {!! Form::submit('Shrani', array('class' => 'btn btn-danger', 'style' => 'float: right; width: 150px')) !!}
        {!! Form::close() !!}

    </div>

@endsection