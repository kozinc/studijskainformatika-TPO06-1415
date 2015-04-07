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
Route::get('/vpisnilist', 'VpisniListController@obrazecVpisniList');
Route::post('/vpisnilist', 'VpisniListController@handlerVpisniList');

Route::get('/vpisnilistReferent', 'VpisniListReferentController@obrazecVpisniList');
Route::post('/vpisnilistReferent', 'VpisniListReferentController@handlerVpisniList');
Route::post('/vpisnilistReferent', 'VpisniListReferentController@searchStudent');

Route::post('login', 'LoginController@login_handler');
Route::post('home', 'LoginController@login_handler');
Route::post('addnew', 'AddStudentsController@addFromText');
Route::post('seznam', 'ListStudentsController@getStudents');

Route::get('ponastavitev-gesla/{koda}', 'LoginController@passwordResetPotrditev');

Route::get('nepotrjene-vloge', 'VpisniListController@nepotrjeneVloge');
Route::get('nepotrjene-vloge/{id}/potrdi', 'VpisniListController@potrdiVlogo');


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
Route::get('programi/{id}/edit', 'StudijskiProgramController@edit');
Route::post('programi/{id}/edit', 'StudijskiProgramController@update');
Route::get('programi/{id}/predmetnik', 'StudijskiProgramController@showPredmetnik');
Route::post('programi/{id}/predmetnik/edit', 'StudijskiProgramController@editPredmetnik');
Route::get('programi/{id}/predmetnik/create', 'StudijskiProgramController@create_predmetnik');
Route::post('programi/{id}/predmetnik/create', 'StudijkskiProgramController@store_predmetnik');

Route::get('studenti', 'StudentController@searchForm');
Route::post('studenti', 'StudentController@search');
Route::get('studenti/{id}', 'StudentController@show');
Route::get('studenti/{id}/predmetnik', 'StudentController@predmetnik');





