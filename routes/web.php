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

Route::get('/', 'HomeController@index');

// INGRESSOS
Route::get('compraingresso/{id}', 'CompraIngressoController@prepararCompra')
    ->middleware('auth');
Route::post('compraingresso', 'CompraIngressoController@comprar')
    ->middleware('auth');

Route::get('ingressos', 'CompraIngressoController@listagemIngressosPagos')->name('listagemIngressosPagos')
    ->middleware('auth');

Route::get('ingressos/confirmacao', 'CompraIngressoController@confirmarPagamento')->name('ingressos.confirmacao')
    ->middleware('auth');


// COMENTARIOS
Route::get('comentarios', 'ComentarioController@listagemComentariosUsuario')->name('comentarios')
    ->middleware('auth');
Route::get('comentarios/{model}/{id}', 'ComentarioController@listagemComentarios')
    ->middleware('auth');
Route::post('comentarios/{model}/{id}/add', 'ComentarioController@addComentario')
    ->middleware('auth');
Route::post('comentarios/responder/{id}', 'ComentarioController@responderComentario')
    ->middleware('auth');

// ATRACAOS
Route::get('/cadastraratracao', 'AtracaoController@create')->name('atracao.cadastrar')->middleware('auth');
Route::post('/cadastraratracaosalvar', 'AtracaoController@store')->name('atracao.salvar')->middleware('auth');
Route::get('/cadastraratracaoshow', 'AtracaoController@show')->name('atracao.show')->middleware('auth');

//ESTABELECIMENTO
Route::get('/cadastrarestabelecimento', 'EstabelecimentoController@create')->name('estabelecimento.cadastrar')->middleware('auth');
Route::post('/cadastrarestabelecimentosalvar', 'EstabelecimentoController@store')->name('estabelecimento.salvar')->middleware('auth');
Route::get('/listarestabelecimentos', 'EstabelecimentoController@index')->name('estabelecimento.listar')->middleware('auth');
Route::get('/listarestabelecimentosUser', 'EstabelecimentoController@indexByUser')->name('estabelecimento.listar.user')->middleware('auth');
Route::get('/mostrarestabelecimento/{id}', 'EstabelecimentoController@show')->name('estabelecimento.mostrar')->middleware('auth');
Route::get('/editarestabelecimento/{id}', 'EstabelecimentoController@edit')->name('estabelecimento.editar')->middleware('auth');
Route::post('/editarestabelecimentosalvar/{id}', 'EstabelecimentoController@update')->name('estabelecimento.alterar')->middleware('auth');
Route::get('/removerestabelecimento/{id}', 'EstabelecimentoController@destroy')->name('estabelecimento.remover')->middleware('auth');

// CRIAR EVENTO
// EVENTO
Route::get('/eventoscadastrados', 'CadastrarEventoController@listarEvento')->name('listar.eventos.cadastrados')->middleware('auth');
Route::get('/cadastrarevento', 'CadastrarEventoController@cadastrarEvento')->name('evento.cadastrar')->middleware('auth');
Route::get('/editar/evento', 'CadastrarEventoController@editarEvento')->name('editar.cadastrar')->middleware('auth');
Route::get('/deletar/evento', 'CadastrarEventoController@deletarEvento')->name('deletar.cadastrar')->middleware('auth');
Route::get('/atualizarevento', 'CadastrarEventoController@atualizarEvento')->name('atualizar.evento.cadastrar')->middleware('auth');
Route::get('/cadastrareventosalvar', 'CadastrarEventoController@cadastrarEventoSalvar')->name('evento.salvar')->middleware('auth');

// ESTABELECIMENTOS
Route::get('/estabelecimentoscadastrados', function(){return view('listarEstabelecimentosCadastrados');})->name('listar.estabelecimentos.cadastrados')->middleware('auth');
Route::get('/cadastrarestabelecimento', function(){return view('cadastrarEstabelecimento');})->name('estabelecimentos.cadastrados')->middleware('auth');


//  CONFIGURACAO
Route::get('/configurarConta', function(){return view('configurarConta');})->name('configurar.conta')->middleware('auth');


// ROTAS PAYPAL
Route::get('/paypal/ingresso', 'PaypalController@pagamentoIngresso')->name('paypal.ingresso')->middleware('auth');
Route::get('/paypal/status/ingresso', 'PaypalController@statusPagamentoIngresso')->name('paypal.ingresso.status')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
