<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="utf-8">
    <title>E-študij FRI</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        @page{
            size: A4 portrait;

        }

    </style>

    <!-- Fonts -->

</head>
<body style="font-family: DejaVu Sans; font-size: 12px;">
<div class="potrdilaPdf">
    @for($i=0; $i < $stevilo; $i++)
        <div class="potrdilo" <?php if($i != $stevilo-1)echo 'style="page-break-after: always;"';?> >
                <img src="{{ asset('img/fri-logo.png') }}" width="250" height="150" style=" margin-left: 30%;">
            <div class="form-group" style="width: 800px; margin: auto; margin-top: 160px">
                <br>
                <h3 style="font-size: 18pt">Potrdilo o vpisu</h3>
                <br><br><br><br><br><br>
                <p>Vpisna številka: {!!$vpisna!!}</p><br/><br/><br/>
                <div style="width: 50%; display: inline-block; border-right: thin solid #aaaaaa">
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
                    <br><br><br><br><br>
                    <p>Žig:</p>
                    <br><br><br><br><br>
                    <p>Dekan:</p>
                </div>
            </div>
        </div>
    @endfor
</div>
</body>
</html>