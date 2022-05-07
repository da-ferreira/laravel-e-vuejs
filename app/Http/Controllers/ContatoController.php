<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
    public function contato()
    {
        $motivo_contatos = MotivoContato::all();
        return view('site.contato', ['motivo_contatos' => $motivo_contatos]);  # Enviando para a view
    }

    public function salvar(Request $request)
    {
        $regras = [
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000',
        ];

        $feedbacks = [
            'required' => 'O campo :attribute deve ser preenchido',  // Informando apenas o tipo de validação

            // 'nome.required' => 'O campo "nome" precisa ser preenchido',
            'nome.min' => 'O campo "nome" precisa ter no mínimo 3 caracteres',
            'nome.max' => 'O campo "nome" deve ter no máximo 40 caracteres',
            'nome.unique' => 'O nome informado já está em uso',

            // 'telefone.required' => 'O campo "telefone" precisa ser preenchido',

            'email.email' => 'O email informado não é válido',

            // 'motivo_contatos_id.required' => 'O motivo do contato precisa ser preenchido',

            // 'mensagem.required' => 'O campo "mensagem" precisa ser preenchido',
            'mensagem.max' => 'O campo "mensagem" deve ter no máximo 2000 caracteres'
        ];

        $request->validate($regras, $feedbacks);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
