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
                    <tr>
                        <th>Program</th>
                        <th>Letnik</th>
                        <th>Število študentov</th>
                        <div style="display: none">{{$skupajTotal=0}}</div>
                    </tr>
                    @foreach($stStudentov as $row)
                        @if($row->studijsko_leto == $leto)
                            <tr>
                                <td>{{$programi->get($row->id_programa)->ime}}</td>
                                <td style="width: 30%">{{$row->letnik}}.</td>
                                <td style="width: 20%">{{$row->total}}</td>
                                <div style="display: none">{{$skupajTotal=$skupajTotal+$row->total}}</div>
                                @foreach($programLetniki as $programLetnik)
                                    @if($programLetnik->id_programa==$row->id_programa)
                                        @if($programLetnik->letnik==$row->letnik)
                                            @if($programLetnik->stevilo_modulov > 0)
                                                <!-- Moduli -->
                                                </tr> <tr>
                                                    <th></th>
                                                    <th>Modul</th>
                                                    <th>Število Študentov</th>
                                                    @foreach($moduli as $modul)
                                                        @if($modul_array[$modul->ime] > 0)
                                                            </tr> <tr>
                                                            <td></td>
                                                            <td>{{$modul->ime}}</td>
                                                            <td><!-- {{$programLetnik}} -->
                                                                {{$modul_array[$modul->ime]}}
                                                            </td>
                                                        @endif
                                                    @endforeach
                                            @endif
                                        @endif
                                    @endif
                                @endforeach
                            </tr>
                        @endif
                    @endforeach
                    <th> </th><th>Skupno v študijskem letu: </th> <th> <b>{{$skupajTotal}}</b> </th>
                </table>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection



























