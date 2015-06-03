<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-študij FRI</title>

    <script src="{{ asset('js/jquery-te-1.4.0.min.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>
    <style>
        h1, h2, h3, h4, h5, h6 {
            font-family:  DejaVu Sans;
        }
        p, div {
            font-family: DejaVu Sans;
        }
        tr:nth-child(even) {background: #E9E9E9}
        tr:nth-child(odd)  {background: #FFF}

    </style>
</head>

<body style="font-family: Arial ">


<div class="panel panel-default">
    <div class="panel-heading"><h3 style="color: #005580">Stanje Vpisa za študijsko leto {{$leto}}</h3></div>
    <br/>
    <div class="panel-body">

        <div class="panel panel-default">
            <div class="panel-body">
                <table class="table" style="font-size: small">
                    <tr style="background: #F9f9f9">
                        <th>Program</th>
                        <th>Letnik</th>
                        <th></th>
                        <th>Število študentov</th>
                        <div style="display: none">{{$skupajTotal=0}}</div>
                    </tr>
                    <tr style="background: #000"><td></td><td></td><td></td><td></td></tr>
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
                                            <td style="width: 20%; text-align: center">{{$row->letnik}}.</td>
                                            <td style="width: 15%"></td>
                                            <td style="width: 20%; text-align: center">{{$row->total}}</td>
                                            <div style="display: none">{{$skupajTotal=$skupajTotal+$row->total}}{{$skupajTotalProgram=$skupajTotalProgram+$row->total}}</div>
                                        </tr>
                                        @foreach($programLetniki as $programLetnik)
                                            @if($programLetnik->id_programa==$row->id_programa)
                                                @if($programLetnik->letnik==$row->letnik)
                                                    <div style="display: none" >
                                                        {{$steviloZaModule=0}}
                                                        @foreach($modul_array[$leto] as $m)
                                                            {{$steviloZaModule = $steviloZaModule + $m}}
                                                        @endforeach
                                                    </div>
                                                    @if($programLetnik->stevilo_modulov > 0 && $steviloZaModule > 0)
                                                        <!-- Moduli -->
                                                        <tr>
                                                            <th></th>
                                                            <th>{{$row->letnik}}. letnik</th>
                                                            <th>Modul</th>
                                                            <th>Število Študentov</th>
                                                        </tr>
                                                        @foreach($moduli as $modul)
                                                            @if($modul_array[$leto][$modul->ime] > 0)
                                                                <tr>
                                                                    <td></td>
                                                                    <td></td>
                                                                    <td>{{$modul->ime}}</td>
                                                                    <td><!-- {{$programLetnik}} -->
                                                                        {{$modul_array[$leto][$modul->ime]}}
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
                                    <td style="width: 20%; text-align: center">{{$i}}.</td>
                                    <td style="width: 15%"></td>
                                    <td style="width: 20%; text-align: center">0</td>
                                </tr>
                            @endif
                        @endfor
                        <tr style="background: #000"><td></td><td></td><td></td><td></td></tr><tr><td></td><td></td><td></td><td></td></tr>

                            <tr style="background: #EEE;">
                                <th>{{$program->ime}}</th>
                                <th>Skupno v programu:</th>
                                <th></th>
                                <th>{{$skupajTotalProgram}}</th>
                            </tr>
                        <tr style="background: #000"><td></td><td></td><td></td><td></td></tr>
                        <tr><td></td><td></td><td></td><td></td></tr>
                        <tr style="background: #000"><td></td><td></td><td></td><td></td></tr>
                    @endforeach
                    <tr style="background: #000"><td></td><td></td><td></td><td></td></tr>
                    <tr style="background: #DDD">
                    <th> </th><th>Skupno v študijskem letu: </th> <td></td><th> <b>{{$skupajTotal}}</b> </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>





</body>
</html>

























