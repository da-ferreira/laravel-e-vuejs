<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'PrincipalController@principal')->name('site.index')->middleware('log.acesso');
Route::get('/sobre-nos', 'SobreNosController@sobreNos')->name('site.sobrenos');

Route::get('/contato', 'ContatoController@contato')->name('site.contato');
Route::post('/contato', 'ContatoController@salvar')->name('site.contato');

Route::get('/login/{erro?}', 'LoginController@index')->name('site.login');
Route::post('/login', 'LoginController@autenticar')->name('site.login');

Route::middleware('autenticacao:padrao, visitante')->prefix('/app')->group(function () {
    Route::get('/home', 'HomeController@index')->name('app.home');
    Route::get('/sair', 'LoginController@sair')->name('app.sair');
    Route::get('/cliente', 'ClienteController@index')->name('app.cliente');

    Route::get('/fornecedor', 'FornecedorController@index')->name('app.fornecedor');
    Route::get('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::post('/fornecedor/listar', 'FornecedorController@listar')->name('app.fornecedor.listar');
    Route::get('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar', 'FornecedorController@adicionar')->name('app.fornecedor.adicionar');
    Route::get('/fornecedor/editar/{id}/{mensagem?}', 'FornecedorController@editar')->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}', 'FornecedorController@excluir')->name('app.fornecedor.excluir');

    /*
        Rotas para produtos criada pelo resource:

        | Method    | URI                        | Name            | Action
        +-----------+----------------------------+-----------------+-----------------------------------------------
        | GET|HEAD  | app/produto                | produto.index   | App\Http\Controllers\ProdutoController@index
        | POST      | app/produto                | produto.store   | App\Http\Controllers\ProdutoController@store
        | GET|HEAD  | app/produto/create         | produto.create  | App\Http\Controllers\ProdutoController@create
        | GET|HEAD  | app/produto/{produto}      | produto.show    | App\Http\Controllers\ProdutoController@show
        | PUT|PATCH | app/produto/{produto}      | produto.update  | App\Http\Controllers\ProdutoController@update
        | DELETE    | app/produto/{produto}      | produto.destroy | App\Http\Controllers\ProdutoController@destroy
        | GET|HEAD  | app/produto/{produto}/edit | produto.edit    | App\Http\Controllers\ProdutoController@edit
    */
    Route::resource('produto', 'ProdutoController');
});

// Route::get('/teste/{p1}/{p2}', 'TesteController@teste')->name('teste');

Route::fallback(function () {
    echo 'A rota acessada não existe. Clique <a href="' . route('site.index') . '">aqui para</a> ir para a página inicial';
});
