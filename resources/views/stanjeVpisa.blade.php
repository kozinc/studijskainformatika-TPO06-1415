@extends('app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading"><h3 style="color: #005580">Stanje Vpisa</h3></div>
    <div class="panel-body">
        {!! Form::open(array('action' => 'StanjeVpisaController@export')) !!}
        {!! Form::select('leta', str_replace('/20','-',$leta), $leto_id, array('class' => 'btn btn-default dropdown-toggle')) !!}

        <input class="btn" type="submit" name="csv" value="Izvozi CSV">
        <input class="btn" type="submit" name="pdf" value="Izvozi PDF">
        {!! Form::close() !!}

    @foreach($leta as $leto)
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Študijsko leto: {{str_replace('/20','-',$leto)}}</h3>
                <table class="table table-hover">
                    <tr style="background: #F9f9f9">
                        <th>Program</th>
                        <th>Letnik</th>
                        <th></th>
                        <th>Število študentov</th>
                        <div style="display: none">{{$skupajTotal=0}}</div>
                    </tr>
                    @foreach($programi as $program)
                        <div style="display: none">{{$skupajTotalProgram=0}}</div>
                        @foreach($stStudentov as $row)
                            @if($row->studijsko_leto == $leto && $row->id_programa == $program->id)
                                <tr>
                                    <td>{{$programi->get($row->id_programa)->ime}}</td>
                                    <td style="width: 20%">{{$row->letnik}}.</td>
                                    <td style="width: 15%"></td>
                                    <td style="width: 20%">{{$row->total}}</td>
                                    <div style="display: none">{{$skupajTotal=$skupajTotal+$row->total}}{{$skupajTotalProgram=$skupajTotalProgram+$row->total}}</div>
                                </tr>
                                    @foreach($programLetniki as $programLetnik)
                                        @if($programLetnik->id_programa==$row->id_programa)
                                            @if($programLetnik->letnik==$row->letnik)
                                                @if($programLetnik->stevilo_modulov > 0)
                                                    <!-- Moduli -->
                                                    <tr>
                                                        <th></th>
                                                        <th>{{$row->letnik}}. letnik</th>
                                                        <th>Modul</th>
                                                        <th>Število Študentov</th>
                                                    </tr>
                                                    @foreach($moduli as $modul)
                                                        @if($modul_array[$modul->ime] > 0)
                                                            <tr>
                                                                <td></td>
                                                                <td></td>
                                                                <td>{{$modul->ime}}</td>
                                                                <td><!-- {{$programLetnik}} -->
                                                                    {{$modul_array[$modul->ime]}}
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                @endif
                                            @endif
                                        @endif
                                    @endforeach
                            @endif
                        @endforeach
                        @if($skupajTotalProgram > 0)
                            <tr style="background: #EEE">
                                <th>{{$program->ime}}</th>
                                <th>Skupno v programu:</th>
                                <th></th>
                                <th>{{$skupajTotalProgram}}</th>
                            </tr>
                        @endif
                    @endforeach

                    <tr style="background: #DDD">
                        <th></th>
                        <th>Skupno v študijskem letu: </th>
                        <th></th>
                        <th><b>{{$skupajTotal}}</b></th>
                    </tr>

                </table>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection



























