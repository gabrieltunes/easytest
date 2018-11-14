<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!

Route::get('materia', function () {
    	return view('materia');
	});
|
*/

Auth::routes();

Route::group(['middleware' => ['auth']],function(){

	Route::resource('materia','MateriaController');

	Route::resource('assunto','AssuntoController');

	Route::resource('questao_dissertativa','Questao_DissertativaController');

	Route::resource('questao_objetiva','Questao_ObjetivaController');

	Route::resource('cabecalho','Cabecalho_ProvaController');

	Route::resource('ver_cabecalhos','Cabecalho_ProvaController');

	Route::resource('prova','ProvaController');

	//Route::post('ver_prova','ProvaController@index');

	Route::get('prova_cabecalho','ProvaController@provaCabecalho');

	Route::post('prova_materia','ProvaController@provaMateria');

	Route::post('prova_questoes','ProvaController@provaQuestoes');

	Route::get('get-assuntos/{materia_id}', 'Questao_DissertativaController@getAssuntos');

	Route::get('get-assuntos-obj/{materia_id}', 'Questao_ObjetivaController@getAssuntos');

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/', function () {
    	return view('home');
	});
});



