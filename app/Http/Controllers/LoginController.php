<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request)
    {
        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário e ou senha não existe';
        }

        return view('site.login', ['erro' => $erro]);
    }

    public function autenticar(Request $request)
    {
        // Regras de validação:
        $regras = [
            'usuario' => 'email',
            'senha' => 'required'
        ];

        // Mensagens de feedback de validação:
        $feedbacks = [
            'usuario.email' => 'O campo usuário (email) é obrigatório',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        // Se não passar pelas validações, a requisição é empurrada para a anterior
        $request->validate($regras, $feedbacks);

        // Recuperando os parâmetros do formulário:
        $email = $request->get('usuario');
        $password = $request->get('senha');

        // Usando o model User:
        $usuario = User::where('email', $email)
                       ->where('password', $password)
                       ->get()
                       ->first();

        // Passando parametro para a rota utilizando o redirect
        return isset($usuario->name) ? 'Usuário existe' : redirect()->route('site.login', ['erro' => 1]);
    }
}
