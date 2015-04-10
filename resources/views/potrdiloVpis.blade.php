<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-študij FRI</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-te-1.4.0.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body onload="window.print()">

    <div style="position: absolute; top: 5%; left: 50%; width: auto; height: auto; margin-left: -125px;">
        {!! HTML::image('http://www.culture.si/images/thumb/6/6c/Faculty_of_Computer_and_Information_Science_University_of_Ljubljana_%28logo%29.svg/576px-Faculty_of_Computer_and_Information_Science_University_of_Ljubljana_%28logo%29.svg.png', 'Logo - ni povezave', array( 'width' => 250, 'height' => 150 )) !!}
    </div>

    <div class="form-group" style="width: 800px; margin: auto; margin-top: 250px">


        <a class="hidden-print" href="{{ action('ListStudentsController@returnBack') }}">Nazaj na seznam študentov</a>
        <h2>Potrdilo o vpisu</h2>
        <br><br>
        <p>Vpisna številka: {!!$vpisna!!}</p><br/>
            <div style="width: 60%; display: inline-block; border-right: thin solid #aaaaaa">
                <p>Potrjujemo, da je {!!$ime!!} {!!$priimek!!}</p>
                <p>rojen-a {!!$datum_rojstva!!}, v kraju {!!$kraj_rojstva!!}</p>
                <p>vpisan-a v {!!$letnik!!}. letnik</p>
                <p>v študijskem letu {!!$studijsko_leto!!}</p>
                <p>kot {!!$vrsta_vpisa!!}</p>
                <p>v program {!!$program!!}</p>
                <br><br>
                <p>Ljubljana, dne {!!$date!!}</p>
            </div>
            <div style="width: 30%; display: inline-block; margin: 1em;">
                <p>Uradne opombe: </p>
                <br><br><br><br>
                <p>Žig:</p>
                <br><br><br><br>
                <p>Dekan:</p>
            </div>
    </div>

</body>
</html>