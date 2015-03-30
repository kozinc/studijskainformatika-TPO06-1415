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

Route::get('get_students', 'HomeController@seznam');

Route::get('/vpisnilist', 'VpisniListController@obrazecVpisniList');

Route::post('/izbirapredmetov', 'izbiraPredmetovController@vpisniListHandler');

Route::post('login', 'LoginController@login_handler');

Route::post('home', 'LoginController@login_handler');

Route::post('addnew', 'AddStudentsController@addFromText');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('predmeti', 'PredmetController@index');
Route::get('predmeti/{id}', 'PredmetController@show' );
Route::get('predmeti/{id}/edit', 'PredmetController@edit');
Route::post('predmeti/{id}/edit', 'PredmetController@update');


