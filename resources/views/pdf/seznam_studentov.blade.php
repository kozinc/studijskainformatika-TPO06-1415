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
            page-break-inside:auto;
            margin:0px;padding:0px;
            width:100%;
            border-collapse:collapse;
        }
        td {
            border-bottom: 0.5px solid #cccccc;
        }
        #footer {
            position:fixed;
            bottom:0;
        }
    </style>
</head>
<body>

    <h3>Seznam prijavljenih na izpit</h3>

    <p>Predmet: [{{$predmet->sifra}}] {{$predmet->naziv}}</p>
    <p>Izpraševalci: {{$nosilci}}</p>
    <p>Datum in ura: {{$datum}} ob {{ $ura  }}h</p>
    <p>Prostor: {{$prostor}}</p>

    <br>

    <div class="CSSTableGenerator">
        <table>
            <tr style="background-color: #cccccc">
                <td style="width: 50px"> </td>
                <td style="width: 150px">Vpisna št.</td>
                <td style="width: 180px">Priimek in ime</td>
                <td style="width: 150px">Štud. leto</td>
                <td style="width: 80px">Št vseh</td>
                <td style="width: 80px">Št letos</td>
            </tr>
            @foreach($studentje as $student)
                <tr>
                    <td> {{$student->zaporedna_st}} </td>
                    <td> {{$student->vpisna}} </td>
                    <td> {{$student->priimek}} {{$student->ime}} </td>
                    <td> {{ substr($student->st_leto, 0, 5). substr($student->st_leto, 7, 9)}} </td>
                    <td> {{$student->st_vseh}} </td>
                    <td> {{$student->st_letos}} </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div id="footer">1</div>
</body>
</html>