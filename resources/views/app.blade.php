<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>E-študij FRI</title>

	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">


	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<!-- [endif]-->
    <!-- Scripts -->
    <script src="{{ asset('js/jquery-2.1.3.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/jquery-te-1.4.0.min.js') }}"></script>
    <script src="{{ asset('js/functions.js') }}"></script>

</head>
<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">

            @if (\Session::get('vloga') == "referent" )
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
                    <a class="navbar-brand" href="{{ action('StudijskiProgramController@index') }}">Programi</a>
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

            @elseif (\Session::get('vloga') == "student" )

                <div class="navbar-header">
                    <a class="navbar-brand">Pozdravljeni, {{\Session::get('imepriimek')}}</a>
                </div>
                <div class="nav navbar-nav navbar-right">
                    <a class="navbar-brand" href="{{ action('WelcomeController@index') }}">Odjava</a>
                </div>
                <div class="nav navbar-nav navbar-right">
                    <a class="navbar-brand" href="{{ action('VpisniListController@obrazecVpisniList')  }}">Vpisni list</a>
                </div>
                <div class="nav navbar-nav navbar-right">
                    <a class="navbar-brand" href="{{ action('KartotecniListController@prikazKartotecniList')  }}">Kartotečni list</a>
                </div>
            @endif

        </div>
    </nav>

	@yield('content')
</body>
</html>
