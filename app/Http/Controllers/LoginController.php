<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('site.login');
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

        echo isset($usuario->name) ? 'Usuário existe' : 'Usuário não existe';
    }
}
