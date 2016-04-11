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

//Route::get('/', 'WelcomeController@index');

Route::get('', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::resource('revistas','RevistaController');
Route::resource('convocatorias','ConvocatoriaController');
Route::resource('eventoAcademico','EventoAcademicoController');

Route::get('ciudades/{id}','RevistaController@getCiudades');
//Route::get('ciudades/{id}','ConvocatoriaController@getCiudades');
//Route::get('ciudades/{id}','EventoAcademicoController@getCiudades');

Route::get('universidades/{id}','RevistaController@getUniversidades');

