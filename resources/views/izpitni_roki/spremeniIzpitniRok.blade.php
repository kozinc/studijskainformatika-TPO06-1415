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
        <div class="navbar-header">
            <a class="navbar-brand">Pozdravljeni, {{\Session::get('imepriimek')}}</a>
        </div>
        <div class="nav navbar-nav navbar-right">
            <a class="navbar-brand" href="{{ action('WelcomeController@index') }}">Odjava</a>
        </div>
        <div class="nav navbar-nav navbar-right">
            <a class="navbar-brand" href="{{ action('HomeController@datoteka') }}">Uvoz novih študentov</a>
        </div>
        <div class="nav navbar-nav navbar-right">
            <a class="navbar-brand" href="{{ action('VpisniListController@seznamVlog') }}">Potrdi vpisane študente</a>
        </div>
        <div class="nav navbar-nav navbar-right">
            <a class="navbar-brand" href="{{ action('VpisniListReferentController@obrazecVpisniList') }}">Vpisni list</a>
        </div>
        <div class="nav navbar-nav navbar-right">
            <a class="navbar-brand" href="{{ action('StudentController@searchForm') }}">Podatki o študentih</a>
        </div>
        <div class="nav navbar-nav navbar-right">
            <a class="navbar-brand" href="{{ action('ListStudentsController@getStudents') }}">Seznam vpisanih študentov v predmet</a>
        </div>
        <div class="nav navbar-nav navbar-right">
            <a class="navbar-brand" href="{{ action('IzpitniRokController@getSpremeniIzpitniRok') }}">Izpitni roki</a>
        </div>
        <div class="nav navbar-nav navbar-right">
            <a class="navbar-brand" href="{{ action('PredmetController@index') }}">Predmeti</a>
        </div>
    </div>
</nav>

    <div class="form-group" style="width:700px; margin: auto; margin-top: 200px">

        {!! Form::open(array('action' => 'IzpitniRokController@getPredmetRoki')) !!}
            {!! Form::select('predmeti', $predmeti, $predmet_id, array('class' => 'btn btn-default dropdown-toggle')) !!}
            {!! Form::submit('Izpiši izpitne roke', array('class' => 'btn btn-danger')) !!}
        {!! Form::close() !!}
        <br/>

        @if($izpitni_roki != '' || Session::get('izpitni_roki_sporocilo') != "")
            <button id="izpit_button"  class="btn btn-default">Dodaj izpitni rok</button>
            <br/>

            <div  id="obrazec_izpit" style="background-color: #FAFAFA">
                <div class="form-group" id="obrazec_izpit" style="width:200px; margin-left: 10px">
                    <br>
                    {!! Form::open(array('action' => 'IzpitniRokController@dodajIzpitniRok')) !!}
                        {!! Form::text('date', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Datum izpita', 'id' => 'datepicker')) !!}
                    <br/>
                        {!! Form::submit('Dodaj', array('class' => 'btn btn-danger')) !!}<br/><br/>
                    {!! Form::close() !!}
                </div>
            </div>
            <br><br>
        @endif

        @if (Session::has('izpitni_roki_sporocilo'))
            @if (Session::get('izpitni_roki_sporocilo') != "")
                <div class="alert alert-info">{{ Session::get('izpitni_roki_sporocilo') }}</div>
                <br/>
            @endif
        @endif

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
                        <td id="datum">{{ $i->datum }}</td>
                        <td>{{ $i->st_prijav }}</td>
                        @if($i->ocene != "Ocene so vnešene")
                            <td>
                                <a id="uredi_button" href="#">Uredi</a> / <a href="{{ action('IzpitniRokController@brisiIzpitniRok',['id'=>$i->id]) }}" onclick="if(!confirm('Ste prepričani, da želite izbrisati izpitni rok? Vsi prijavljeni študenje bodo obveščeni s strani sistema.')){return false;};">Briši</a>
                            </td>
                        @else
                            <td>{{ $i->ocene }}</td>
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

        $(document).ready(function() {
            $('#obrazec_izpit').hide();
            $('#izpit_button').show();

            $('#izpit_button').click(function() {
                $('#izpit_button').hide();
                $('#obrazec_izpit').show('slow');
                return false;
            });

            $('#uredi_button').click(function(){

            });
        });

    </script>
</body>
</html>