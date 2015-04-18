<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-študij FRI</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
</head>

<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        @if (substr(\Session::get('session_id'), strlen(\Session::get('session_id')) - 14) == "@fri.uni-lj.si" )
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ action('HomeController@datoteka') }}">Uvoz novih študentov</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ action('VpisniListController@seznamVlog') }}">Potrdi vpisane študente</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ action('VpisniListReferentController@obrazecVpisniList') }}">Vpisni list</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ action('StudentController@searchForm') }}">Podatki o študentih</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ action('ListStudentsController@getStudents') }}">Seznam vpisanih študentov v predmet</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ action('PredmetController@index') }}">Predmeti</a>
            </div>
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ action('IzpitniRokController@getSpremeniIzpitniRok') }}">Izpitni roki</a>
            </div>
        @else
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ action('VpisniListController@obrazecVpisniList')  }}">Vpisni list</a>
            </div>
        @endif
        <div class="nav navbar-nav navbar-right">
            <a class="navbar-brand" href="{{ action('WelcomeController@index') }}">Odjava</a>
        </div>
    </div>
</nav>

<div class="form-group" style="width:700px; margin: auto; margin-top: 200px">

        {!! Form::open(array('action' => 'IzpitniRokController@getPredmetRoki')) !!}
            {!! Form::select('predmeti', $predmeti, $predmet_id, array('class' => 'btn btn-default dropdown-toggle')) !!}
            <br/><br/>
            {!! Form::submit('Izpiši izpitne roke za izbrani predmet', array('class' => 'btn btn-danger')) !!}
        {!! Form::close() !!}
        <br/>

        @if (Session::has('izpitni_roki_sporocilo'))
            @if (Session::get('izpitni_roki_sporocilo') != "")
                <div class="alert alert-info">{{ Session::get('izpitni_roki_sporocilo') }}</div>
                <br/>
            @endif
        @endif

        <p>Datum: <input type="text" id="datepicker" readonly="readonly"></p>

        @if($izpitni_roki != '')
            <table class="table table-hover">
                <tr>
                    <th>Izpitni rok</th>
                    <th>Datum</th>
                    <th>Število prijavljenih študentov</th>
                    <th>Status</th>
                </tr>
                @foreach($izpitni_roki as $i)
                    <tr>
                        <td>{{ $i->izpitni_rok }}</td>
                        <td>{{ $i->datum }}</td>
                        <td>{{ $i->st_prijav }}</td>
                        <td>{{ $i->ocene }}</td>
                        @if($i->ocene != "Ocene so vnešene")
                            <td>
                                <a href="#">Uredi</a>
                            </td>
                            <td>
                                <a href="{{ action('IzpitniRokController@brisiIzpitniRok',['id'=>$i->id]) }}" onclick="if(!confirm('Ste prepričani, da želite izbrisati izpitni rok? Vsi prijavljeni študenje bodo obveščeni s strani sistema.')){return false;};">Briši</a>
                            </td>
                        @endif
                    </tr>
                @endforeach
            </table>
        @endif
    </div>

    <script>
        $(function() {
            $("#datepicker").datepicker({
                minDate: 1,
                dateFormat: 'dd.mm.yy'
            });
        });
    </script>

</body>
</html>