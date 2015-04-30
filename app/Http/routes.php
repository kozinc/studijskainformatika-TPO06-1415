<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');
Route::get('add_from_file', 'HomeController@datoteka');
Route::get('home', 'HomeController@home');
Route::get('seznam', 'ListStudentsController@get_all_students');
Route::get('vpisnilist', 'VpisniListController@obrazecVpisniList');
Route::post('vpisnilist', 'VpisniListController@handlerVpisniList');

Route::get('potrdiloVpis', 'ListStudentsController@getPotrdilo');

Route::get('vpisnilistReferent', 'VpisniListReferentController@obrazecVpisniList');
Route::post('vpisnilistReferent/potrdi', 'VpisniListReferentController@handlerVpisniList');
Route::get('vpisnilistReferent/{id}', 'VpisniListReferentController@prikaziStudenta');
Route::post('vpisnilistReferent/najdiStudenta', 'VpisniListReferentController@searchStudent');
Route::post('vpisnilistReferent/{id}/ponovi', 'VpisniListReferentController@ponoviVlogo');

Route::post('login', 'LoginController@login_handler');
Route::post('home', 'LoginController@login_handler');
Route::post('addnew', 'AddStudentsController@addFromText');
Route::post('seznam', 'ListStudentsController@getStudents');

Route::get('ponastavitev-gesla/{koda}', 'LoginController@passwordResetPotrditev');

Route::get('vloge', 'VpisniListController@seznamVlog');
Route::get('vloge/{id}/potrdi', 'VpisniListController@potrdiVlogo');

Route::get('kartotecniList/{id}', 'KartotecniListController@prikazKartotecniList');
Route::post('kartotecniList/export', 'KartotecniListController@export');


Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::post('predmeti/export', 'PredmetController@export');
Route::get('predmeti', 'PredmetController@index');
Route::get('predmeti/create', 'PredmetController@create');
Route::post('predmeti/create', 'PredmetController@store');
Route::get('predmeti/{id}', 'PredmetController@show' );
Route::get('predmeti/{id}/edit', 'PredmetController@edit');
Route::post('predmeti/{id}/edit', 'PredmetController@update');

Route::get('programi', 'StudijskiProgramController@index');
Route::get('programi/create', 'StudijskiProgramController@create');
Route::post('programi/create', 'StudijskiProgramController@store');
Route::get('programi/{id}', 'StudijskiProgramController@show');
Route::put('programi/{id}', 'StudijskiProgramController@update');
Route::post('programi/{id}/strukutura', 'StudijskiProgramController@spremeni_strukturo');
Route::get('programi/{id}/predmetnik-{studijsko_leto}', 'StudijskiProgramController@showPredmetnik');
Route::post('programi/{id}/predmetnik-{studijsko_leto}', 'StudijskiProgramController@editPredmetnik');
Route::get('programi/{id}/predmetnik/create', 'StudijskiProgramController@create_predmetnik');
Route::post('programi/{id}/predmetnik/create', 'StudijkskiProgramController@store_predmetnik');

Route::get('studenti', 'StudentController@searchForm');
Route::post('studenti', 'StudentController@search');
Route::post('potrdilo/1', 'ListStudentsController@potrdilo_pdf');
Route::get('potrdilo/{id}', 'ListStudentsController@getPotrdilo');
Route::get('potrdilo/{id}/vpisniList', 'ListStudentsController@natisniVpisniList');
Route::get('potrdilo', 'ListStudentsController@getPotrdila');
Route::get('studenti', 'ListStudentsController@returnBack');
Route::get('studenti/{id}', 'StudentController@show');
Route::get('studenti/{id}/nov-zeton', 'StudentController@novZeton');
Route::post('studenti/{id}/nov-zeton', 'StudentController@ustvariNovZeton');
Route::get('studenti/{idStudenta}/indeks/{idStudentProgram}', 'StudentController@elektronskiIndeks');
Route::get('studenti/{idStudenta}/sklepi/{idSklepa}', 'SklepController@edit');
Route::post('studenti/{idStudenta}/sklepi/{idSklepa}', 'SklepController@update');
Route::get('studenti/{idStudenta}/nov-sklep', 'SklepController@create');
Route::post('studenti/{idStudenta}/nov-sklep', 'SklepController@store');


Route::get('izpitni_roki/nov_izpitni_rok', 'IzpitniRokController@getNovIzpitniRok');
Route::get('izpitni_roki/uredi_izpitni_rok', 'IzpitniRokController@getSpremeniIzpitniRok');
Route::post('izpitni_roki/uredi_izpitni_rok', 'IzpitniRokController@getPredmetRoki');
Route::post('izpitni_roki/uredi_izpitni_roka', 'IzpitniRokController@dodajIzpitniRok');
Route::post('izpitni_roki/uredi_izpitni_rokb', 'IzpitniRokController@spremeniIzpitniRok');
Route::get('izpitni_roki/uredi_izpitni_rok/{id}', 'IzpitniRokController@brisiIzpitniRok');
Route::get('izpitni_roki/uredi_izpitni_rok/{id}/seznam_studentov', 'IzpitniRokController@izpisiSeznam');





