<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-študij FRI</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        h1, h2, h3, h4, h5, h6 {
            font-family:  DejaVu Sans;
        }
        p, div {
            font-family: DejaVu Sans;
        }
    </style>
</head>
<body style="font-family: DejaVu Sans">

<div>
    <p>Seznam vpisanih za </p>
    <p>dane kriterije:</p>

    <p/> Leto_ID: {{ $leta[$leto_id] }} <p/>
    <p/> Letnik: {{ $letniki[$letnik_id] }}. letnik <p/>
    <p/> Študijski program: {{ $studProgrami[$id_programa] }} <p/>
    <p/> Vrsta studija: {{ $vrsteVpisa[$vrsteVpisa_id] }} <p/>
    <p/> Način študija: {{ $naciniStudija[$nacinStudija_id] }} <p/>

    <br><br><br><br><br>

    <table class="table table-hover">
        <tr>
            <th></th>
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
                <td>{{$student->zaporedna}}</td>

                <td>{{ $student->vpisna }}</td>
                <td>{{ $student->priimek }} {{ $s->ime }} </td>
                <td>{{ $student->studijsko_leto  }}</td>
                <td>{{ $student->letnik  }}.letnik</td>
                <td>{{ $studProgrami[$student->id_programa] }}</td>
                <td>{{ $vrsteVpisa[$student->vrstavpisa] }}</td>
                <td>{{ $student->nacinstudija }}</td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>