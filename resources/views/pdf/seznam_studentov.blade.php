<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-študij FRI</title>

    <link href="{{ asset('bootstrap-3.3.4-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <script scr="{{ asset('bootstrap-3.3.4-dist/js/bootstrap.min.js') }}"></script>

    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/jquery-te-1.4.0.css') }}" rel="stylesheet">
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

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

<h3>Seznam prijavljenih na izpit</h3>

<p>Predmet: {{$predmet->naziv}}</p>
<p>Datum: {{$datum}}</p>
<br/>

<table class="table table-hover">
    <tr>
        <th></th>
        <th></th>
        <th>Vpisna številka</th>
        <th>Ime in priimek</th>
        <th>E-mail</th>
    </tr>
    @foreach($studentje as $student)
        <tr>
            <td>{{$student->zaporedna_st}}</td>
            <td>{{$student->vpisna}}</td>
            <td>{{$student->priimek}} {{$student->ime}}</td>
            <td>{{$student->email}}</td>
        </tr>
    @endforeach
</table>
</body>
</html>