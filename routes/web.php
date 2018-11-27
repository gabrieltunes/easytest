<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => ['auth']],function(){

	Route::resource('profile','ProfessorController');

	Route::resource('disciplina','DisciplinaController');

	Route::any('lista_disciplinas','DisciplinaController@listar');

	Route::resource('assunto','AssuntoController');

	Route::any('lista_assuntos','AssuntoController@lista_assuntos');

	Route::resource('questao_dissertativa','Questao_DissertativaController');

	Route::any('list_questoes_dissertativas','Questao_DissertativaController@listar_questoes');

	Route::resource('questao_objetiva','Questao_ObjetivaController');

	Route::any('list_questoes_objetivas','Questao_ObjetivaController@listar_questoes');

	Route::resource('cabecalho','Cabecalho_ProvaController');

	Route::any('lista_cabecalho','Cabecalho_ProvaController@listar_cabecalhos');

	Route::resource('ver_cabecalhos','Cabecalho_ProvaController');

	Route::resource('prova','ProvaController');

	Route::resource('gabaritos','GabaritoController');

	Route::post('update_profile','ProfessorController@edit');

	Route::get('prova_cabecalho','ProvaController@provaCabecalho');

	Route::post('prova_disciplina','ProvaController@provaDisciplina');

	Route::post('prova_questoes','ProvaController@provaQuestoes');

	Route::get('get-assuntos/{disciplina_id}', 'AssuntoController@getAssuntos');

	Route::get('gabarito', 'GabaritoController@imprimir');

	Route::get('/home', 'HomeController@index')->name('home');

	Route::get('/', function () {
    	return view('home');
	});
});



