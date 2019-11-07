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

Route::get('/', function () {
    return view('welcome');
});

Route::get('compraingresso/{id}', 'CompraIngressoController@prepararCompra')
    ->middleware('auth');
Route::post('compraingresso', 'CompraIngressoController@comprar')
    ->middleware('auth');

Route::get('ingressos', 'CompraIngressoController@listagemIngressosPagos')
    ->middleware('auth');

Route::get('ingressos/confirmacao', 'CompraIngressoController@confirmarPagamento')->name('ingressos.confirmacao')
    ->middleware('auth');


 // CRIAR EVENTO

 Route::get('/cadastrarevento', 'CadastrarEventoController@cadastrarEvento')->name('evento.cadastrar')->middleware('auth');

Route::post('/cadastrareventosalvar', 'CadastrarEventoController@cadastrareventosalvar')->name('evento.salvar')->middleware('auth');

// ROTAS PAYPAL
Route::get('/paypal/ingresso', 'PaypalController@pagamentoIngresso')->name('paypal.ingresso')->middleware('auth');
Route::get('/paypal/status/ingresso', 'PaypalController@statusPagamentoIngresso')->name('paypal.ingresso.status')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
