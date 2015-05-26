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
        <!--tr:nth-child(even) {background: #E9E9E9}
        tr:nth-child(odd)  {background: #FFF}-->

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
                    @foreach($programi as $program)
                        <div style="display: none">{{$skupajTotalProgram=0}}</div>
                        @foreach($stStudentov as $row)
                            @if($row->studijsko_leto == $leto && $row->id_programa == $program->id)
                                <tr>
                                    <td>{{$programi->get($row->id_programa)->ime}}</td>
                                    <td style="width: 20%; text-align: center;">{{$row->letnik}}.</td>
                                    <td style="width: 15%"></td>
                                    <td style="width: 20%; text-align: center;">{{$row->total}}</td>
                                    <div style="display: none">{{$skupajTotal=$skupajTotal+$row->total}}{{$skupajTotalProgram=$skupajTotalProgram+$row->total}}</div>
                                </tr>
                                    @foreach($programLetniki as $programLetnik)
                                        @if($programLetnik->id_programa==$row->id_programa)
                                            @if($programLetnik->letnik==$row->letnik)
                                                @if($programLetnik->stevilo_modulov > 0)
                                                    <!-- Moduli -->
                                                     <tr style="background: #F9f9f9">
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
                                                                    <td style="text-align: center;">{{$modul->ime}}</td>
                                                                    <td style="text-align: center;"><!-- {{$programLetnik}} -->
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
                    <th> </th><th>Skupno v študijskem letu: </th> <th> <b>{{$skupajTotal}}</b> </th>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>





</body>
</html>

























