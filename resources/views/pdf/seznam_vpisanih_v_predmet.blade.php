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
    <p>Seznam študentov za predmet <h3> {{ $predmet  }} </h3> </p>
    <p>v študijskem letu {{ $leto }}</p>

    <br><br><br><br><br>

    <table class="table table-hover">
        <tr>
            <th></th>
            <th></th>
            <th>Vpisna številka</th>
            <th>Priimek in ime</th>
            <th>Vrsta vpisa</th>
        </tr>
        @foreach($student_list as $student)
            <tr>
                <td>{{$student->zaporedna}}</td>
                <td>{{$student->vpisna}}</td>
                <td>{{$student->priimek}} {{$student->ime}}</td>
                <td>{{ $vrsteVpisa->get($student->vrstavpisa)->ime }}</td>
            </tr>
        @endforeach
    </table>
</div>
</body>
</html>