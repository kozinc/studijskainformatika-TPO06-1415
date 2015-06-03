@extends('app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading"><h3 style="color: #005580">Stanje Vpisa</h3></div>
    <div class="panel-body">
        {!! Form::open(array('action' => 'StanjeVpisaController@export')) !!}
        {!! Form::select('leta', str_replace('/20','-',$leta), $leto_id, array('class' => 'btn btn-default dropdown-toggle')) !!}

        <input class="btn" type="submit" name="csv" value="Izvozi CSV">
        <input class="btn" type="submit" name="pdf" value="Izvozi PDF">
		@if (\Session::get('vloga') == "referent" )
			<a class="btn panel-default" href="{{ action('StanjeVpisaController@StanjeVpisaZaPredmeteShow') }}">Stanje vpisa po predmetih</a>
		@endif
        {!! Form::close() !!}

        <br/>
    @foreach($leta as $leto)
        <div class="panel panel-default">
            <div class="panel-body">
                <h3>Študijsko leto: {{str_replace('/20','-',$leto)}}</h3>
                <table class="table table-hover">
                    <tr style="background: #EEEEEE">
                        <th>Program</th>
                        <th><!--Letnik--></th>
                        <th></th>
                        <th><!--Število študentov--></th>
                        <div style="display: none">{{$skupajTotal=0}}</div>
                    </tr>
                    @foreach($programi as $program)
                        <div style="display: none">{{$skupajTotalProgram=0}}</div>
                        @foreach($stStudentov as $row)
                            @if($row->studijsko_leto == $leto && $row->id_programa == $program->id)
                                <div style="display: none">{{$skupajTotalProgram=$skupajTotalProgram+$row->total}}</div>
                            @endif
                        @endforeach

                            <tr><td></td><td></td><td></td><td></td></tr>
                            <tr style="background: #F9f9f9">
                                <th>{{$program->ime}}</th>
                                <th>Letnik</th>
                                <th></th>
                                <th>Število študentov</th>
                            </tr>

                        <div style="display: none">{{$skupajTotalProgram=0}}</div>
                        @for($i=1;$i<4;$i++)
                            <div style="display: none">{{$stStudentovImaLetnik=false}}</div>
                            @foreach($stStudentov as $row)
                                @if($i == $row->letnik && $row->studijsko_leto == $leto && $row->id_programa == $program->id)
                                    <div style="display: none">{{$stStudentovImaLetnik=true}}</div>
                                    <!-- true -> $stStudentov ima število študentov za ta letnik -->
                                    @if($row->letnik == $i && $row->studijsko_leto == $leto && $row->id_programa == $program->id)
                                        <tr>
                                            <td></td>
                                            <td style="width: 20%">{{$row->letnik}}.</td>
                                            <td style="width: 15%">
                                                @if (\Session::get('vloga') == "referent" )
                                                    <div style="display: none">
                                                        <!-- creating parameters for StanjeVpisaZaPredmeteShow -->
                                                        <?php
                                                            $paramArray = array();
                                                            $leto_id = array_search($leto, $leta);
                                                            $paramArray['leta'] = $leto_id;
                                                            $paramArray['letniki'] = $row->letnik-1;
                                                            $paramArray['studProgrami'] = $row->id_programa;

                                                        ?>
                                                    </div>
                                                    <?php echo link_to_action('StanjeVpisaController@StanjeVpisaZaPredmeteShow', 'Stanje vpisa - predmeti', $paramArray); ?>
                                                @endif
                                            </td>
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
                                @endif
                            @endforeach
                            @if($stStudentovImaLetnik==false)
                                <tr>
                                    <td></td>
                                    <td style="width: 20%">{{$i}}.</td>
                                    <td style="width: 15%">
                                        @if (\Session::get('vloga') == "referent" )
                                            <div style="display: none">
                                                <!-- creating parameters for StanjeVpisaZaPredmeteShow -->
                                                <?php
                                                $paramArray = array();
                                                $leto_id = array_search($leto, $leta);
                                                $paramArray['leta'] = $leto_id;
                                                $paramArray['letniki'] = $i-1;
                                                $paramArray['studProgrami'] = $row->id_programa;

                                                ?>
                                                {{ action('StanjeVpisaController@StanjeVpisaZaPredmeteShow', $paramArray)  }}
                                            </div>
                                            <?php echo link_to_action('StanjeVpisaController@StanjeVpisaZaPredmeteShow', 'Stanje vpisa - predmeti', $paramArray); ?>
                                        @endif
                                    </td>
                                    <td style="width: 20%">0</td>
                                </tr>
                            @endif
                        @endfor

                            <tr style="background: #EEE">
                                <th>{{$program->ime}}</th>
                                <th>Skupno v programu:</th>
                                <th>
                                    @if (\Session::get('vloga') == "referent" )
                                        <div style="display: none">
                                            <!-- creating parameters for StanjeVpisaZaPredmeteShow -->
                                            <?php
                                            $paramArray = array();
                                            $leto_id = array_search($leto, $leta);
                                            $paramArray['leta'] = $leto_id;
                                            $paramArray['letniki'] = 0;
                                            $paramArray['studProgrami'] = $program->id;

                                            ?>
                                            {{ action('StanjeVpisaController@StanjeVpisaZaPredmeteShow', $paramArray)  }}
                                        </div>
                                        <?php echo link_to_action('StanjeVpisaController@StanjeVpisaZaPredmeteShow', 'Stanje vpisa - predmeti', $paramArray); ?>
                                    @endif
                                </th>
                                <th>{{$skupajTotalProgram}}</th>
                            </tr>

                    @endforeach
                    <tr><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr>
                    <tr style="background: #DDD">
                        <th></th>
                        <th>Skupno v študijskem letu: </th>
                        <th>
                            @if (\Session::get('vloga') == "referent" )
                                <div style="display: none">
                                    <!-- creating parameters for StanjeVpisaZaPredmeteShow -->
                                    <?php
                                    $paramArray = array();
                                    $leto_id = array_search($leto, $leta);
                                    $paramArray['leta'] = $leto_id;
                                    $paramArray['letniki'] = 0;
                                    $paramArray['studProgrami'] = 0;

                                    ?>
                                    {{ action('StanjeVpisaController@StanjeVpisaZaPredmeteShow', $paramArray)  }}
                                </div>
                                <?php echo link_to_action('StanjeVpisaController@StanjeVpisaZaPredmeteShow', 'Stanje vpisa - predmeti', $paramArray); ?>
                            @endif
                        </th>
                        <th><b>{{$skupajTotal}}</b></th>
                    </tr>

                </table>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection



























