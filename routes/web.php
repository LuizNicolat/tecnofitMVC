<?php

/*
 * |--------------------------------------------------------------------------
 * | Web Routes
 * |--------------------------------------------------------------------------
 * |
 * | Here is where you can register web routes for your application. These
 * | routes are loaded by the RouteServiceProvider within a group which
 * | contains the "web" middleware group. Now create something great!
 * |
 */
Route::get('/', function () {
    return view('index');
});

Route::prefix('produtos')->group(function () {
    Route::get('index', 'ProdutoController@index')->name('prod.index');
    Route::post('insert', 'ProdutoController@store')->name('prod.insert');
    Route::get('edit/{id}', 'ProdutoController@edit')->name('prod.editar');
    Route::post('salvarEditar', 'ProdutoController@update')->name('prod.salvarEditar');
    Route::get('deletar/{id}', 'ProdutoController@destroy')->name('prod.deletar');
});

Route::prefix('pedidos')->group(function () {
    Route::get('index', 'PedidoController@index')->name('ped.index');
    Route::get('novo', 'PedidoController@create')->name('ped.novo');
    Route::get('adicionarProdutos/{idPedido}', 'PedidoController@addprodutos')->name('prod.adicionarProdutos');
    Route::get('salvarProdutos/{idPedido}/{idProduto}', 'PedidoController@inserirprodutosPedido')->name('prod.salvarProdutos');
    Route::get('removerProdutos/{idPedido}/{idProduto}', 'PedidoController@removerprodutosPedido')->name('ped.removeProduto');
    Route::get('detalhesPedido/{idPedido}', 'PedidoController@detalhesDoPedido')->name('ped.detalhesDoPedido');
    Route::get('deletar/{idPedido}', 'PedidoController@deletar')->name('ped.delete');
});