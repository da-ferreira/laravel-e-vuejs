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

/*
Route::get('/', function () {
    return 'Olá, seja bem-vindo';
});

# Definindo parametros para rotas. O que importa é a sequencia dos parametros:
Route::get(
    '/contato/{nome}/{categoria_id}',
    function (
        string $nome = 'Desconhecido',
        int $categoria_id = 1
    ) {
        echo "Estamos aqui $nome, $categoria_id";
    }
)->where('nome', '[A-Za-z ]+')->where('categoria_id', '[0-9]+');  # Regex
*/

Route::get('/', 'PrincipalController@principal');

Route::get('/sobre-nos', 'SobreNosController@sobreNos');

Route::get('/contato', 'ContatoController@contato');

Route::get('/login', function () {
    return 'Login';
});

Route::get('/clientes', function () {
    return 'Clientes';
});

Route::get('/fornecedores', function () {
    return 'Fornecedores';
});

Route::get('/produtos', function () {
    return 'Produtos';
});
