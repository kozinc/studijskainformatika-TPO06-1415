<!DOCTYPE html>
<html lang="sl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>E-študij FRI</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery-te-1.4.0.min.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>

</head>

<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        @if (\Session::get('vloga') == "referent" )
            <div class="navbar-header">
                <a class="navbar-brand">Pozdravljeni, {{\Session::get('imepriimek')}} ({{\Session::get('vloga')}})</a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <a class="navbar-brand" href="{{ action('WelcomeController@index') }}">Odjava</a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <a class="navbar-brand" href="{{ action('StudijskiProgramController@index') }}">Programi</a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <a class="navbar-brand" href="{{ action('IzpitniRokController@getSpremeniIzpitniRok') }}">Izpitni roki</a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <a class="navbar-brand" href="{{ action('PredmetController@index') }}">Predmeti</a>
            </div>
            <div class="nav navbar-nav navbar-right dropdown">
                <a class="navbar-brand" href="" class="dropdown-toggle" data-toggle="dropdown" role="button">Študenti</a>
                <ul class="dropdown-menu" role="menu">
                    <li><a href="{{ action('HomeController@datoteka') }}">Uvoz novih študentov</a></li>
                    <li><a href="{{ action('VpisniListController@seznamVlog') }}">Potrdi vpisane študente</a></li>
                    <li><a href="{{ action('StudentController@searchForm') }}">Podatki o študentih</a></li>
                    <li><a href="{{ action('ListStudentsController@getStudents') }}">Seznam študentov po predmetih</a></li>
                </ul>
            </div>

        @elseif (\Session::get('vloga') == "student" )
            <div class="navbar-header">
                <a class="navbar-brand">Pozdravljeni, {{\Session::get('imepriimek')}} ({{\Session::get('vloga')}})</a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <a class="navbar-brand" href="{{ action('WelcomeController@index') }}">Odjava</a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <a class="navbar-brand" href="{{ action('VpisniListController@obrazecVpisniList')  }}">Vpisni list</a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <a class="navbar-brand" href="{{ action('KartotecniListController@prikazKartotecniList', ['id'=>\Session::get('id')])  }}">Kartotečni list</a>
            </div>
        @elseif (\Session::get('vloga') == "ucitelj" )
            <div class="navbar-header">
                <a class="navbar-brand">Pozdravljeni, {{\Session::get('imepriimek')}} ({{\Session::get('vloga')}})</a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <a class="navbar-brand" href="{{ action('WelcomeController@index') }}">Odjava</a>
            </div>
            <div class="nav navbar-nav navbar-right">
                <a class="navbar-brand" href="{{ action('StudentController@searchForm') }}">Podatki o študentih</a>
            </div>
        @endif
    </div>
</nav>

    <div class="form-group" style="width:1000px; margin: auto; margin-top: 200px">

        {!! Form::open(array('action' => 'IzpitniRokController@getPredmetRoki')) !!}
            {!! Form::select('predmeti', $predmeti, $predmet_id, array('class' => 'btn btn-default dropdown-toggle')) !!}
            {!! Form::submit('Izpiši izpitne roke', array('class' => 'btn btn-danger')) !!}
        {!! Form::close() !!}
        <br/>

        @if($izpitni_roki != '' || Session::get('izpitni_roki_sporocilo') == "Za predmet ni razpisanih izpitnih rokov")
            <button id="izpit_button1"  class="btn btn-default">Dodaj izpitni rok</button>
            @if($izpitni_roki != '')
                <button id="izpit_button2"  class="btn btn-default">Spremeni izpitni rok</button>
                <br/>
            @endif


            <div  id="obrazec_izpit" style="background-color: #FAFAFA">
                <div class="form-group" id="obrazec_izpit1" style="width:200px; margin-left: 10px">
                    <br>
                    {!! Form::open(array('action' => 'IzpitniRokController@dodajIzpitniRok')) !!}
                    {!! Form::text('date', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Datum izpita', 'id' => 'datepicker')) !!}
                    {!! Form::text('ura', null, array('type' => 'text', 'class' => 'form-control', 'placeholder' => '12:00:00')) !!}
                    {!! Form::text('prostor', null, array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'P1, P22')) !!}
                    <br/>
                    {!! Form::submit('Dodaj', array('class' => 'btn btn-danger')) !!}<br/><br/>
                    {!! Form::close() !!}
                    <br>
                </div>

                @if($izpitni_roki != '')
                <div class="form-group" id="obrazec_izpit2" style="width:200px; margin-left: 10px">
                    <br><br>
                    {!! Form::open(array('action' => 'IzpitniRokController@spremeniIzpitniRok')) !!}
                    {!! Form::select('star_rok', $datumi_izpitov, 1, array('class' => 'btn btn-default dropdown-toggle')) !!}
                    <br/><br/>
                    {!! Form::text('date1', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Datum izpita', 'id' => 'datepicker1')) !!}
                    {!! Form::text('ura1', null, array('type' => 'text', 'class' => 'form-control', 'placeholder' => '12:00:00')) !!}
                    {!! Form::text('prostor1', null, array('type' => 'text', 'class' => 'form-control', 'placeholder' => 'P1, P22')) !!}
                    <br/>
                    {!! Form::submit('Shrani spremembe', array('class' => 'btn btn-danger')) !!}<br/><br/>
                    {!! Form::close() !!}
                </div>
                @endif
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
        <th>Predmet</th>
        <th>Nosilec</th>
        <th>Datum</th>
        <th>Ura</th>
        <th>Prostor</th>
        <th>Število prijav</th>
        <th>Status</th>
    </tr>
    @foreach($izpitni_roki as $i)
        <tr>
            <td>{{$i->ime_predmeta}}</td>
            <td>{{$i->nosilec}}</td>
            <td id="datum">{{ $i->datum }}</td>
            <td>{{$i->ura_izpita}}</td>
            <td>{{$i->predavalnice}}</td>
            <td>{{ $i->st_prijav }} @if($i->st_prijav > 0) / <a href="{{ action('IzpitniRokController@izpisiSeznam',['id'=>$i->id]) }}">Seznam študentov</a> @endif</td>
            @if($i->ocene != "Ocene so vnešene")
                <td>
                    <a href="{{ action('IzpitniRokController@brisiIzpitniRok',['id'=>$i->id]) }}" onclick="if(!confirm('Ste prepričani, da želite izbrisati izpitni rok? Vsi prijavljeni študenje bodo obveščeni s strani sistema.')){return false;};">Briši</a>
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

        $("#datepicker1").datepicker({
            minDate: 1,
            dateFormat: 'dd.mm.yy'
        });
    });

    var tables = document.getElementsByTagName('table');
    var table = tables[tables.length - 1];
    var rows = table.rows;
    for(var i = 1, td; i < rows.length; i++){
        td = document.createElement('td');
        td.appendChild(document.createTextNode(i));
        rows[i].insertBefore(td, rows[i].firstChild);
    }
</script>
</body>
</html>