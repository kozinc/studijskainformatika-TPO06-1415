<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-študij FRI</title>

    <style>
        h1, h2, h3, h4, h5, h6 {
            font-family:  DejaVu Sans;
        }
        p, div {
            font-family: DejaVu Sans;
        }
        table {
            margin:0px;padding:0px;
            width:100%;
            border-collapse:collapse;
        }
        td {
            border-bottom: 0.5px solid #cccccc;
        }
    </style>
</head>
<body>

<div>
    <p>Seznam vpisanih za dane kriterije:</p>

    @if($leto_id>0)
        <p/> Leto: {{ str_replace('/20','-',$leta[$leto_id]) }} <p/>
    @endif
    @if($letnik_id>0)
        <p/> Letnik:
                    {{ $letniki[$letnik_id].'.letnik' }}
        <p/>
    @endif
    @if($id_programa>0)
        <p/> Študijski program: {{ $studProgrami[$id_programa] }} <p/>
    @endif
    @if($vrsteVpisa_id>0)
        <p/> Vrsta studija: {{ $vrsteVpisa[$vrsteVpisa_id] }} <p/>
    @endif
    @if($nacinStudija_id>0)
        <p/> Način študija: {{ $naciniStudija[$nacinStudija_id] }} <p/>
    @endif
    @if(isset($modul_id))
        @if($modul_id>0)
            <p/> Modul: {{ $moduli[$modul_id] }} <p/>
        @endif
    @endif




    <br><br><br><br><br>
    <div class="CSSTableGenerator">
        <table>
            <tr>
                <th></th>
                <th>Vpisna številka</th>
                <th>Priimek in ime</th>
                <th>Študijsko leto</th>
                <th>Letnik</th>
                <th>Študijski program</th>
                <th>Vrsta vpisa</th>
                <th>Način študija</th>
            </tr>
            @foreach($student_list as $student)
                <tr>
                    <td>{{ $student->zaporedna}}</td>

                    <td>{{ $student->vpisna }}</td>
                    <td>{{ $student->priimek }} {{ $student->ime }} </td>
                    <td>{{ str_replace('/20','-',$student->studijsko_leto)  }}</td>
                    <td>{{ $student->letnik  }}.letnik</td>
                    <td>{{ $studProgrami[$student->id_programa] }}</td>
                    <td>{{ $vrsteVpisa[$student->vrstavpisa] }}</td>
                    <td>{{ $student->nacinstudija }}</td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>