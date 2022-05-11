<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, string $metodo_autenticacao, string $perfil)
    {
        echo "$metodo_autenticacao | $perfil <br>";
        // Verifica se o usuário possui acesso a rota
        if (true) {
            return $next($request);  // Está mandando a requisição pro Controller
        }

        return Response('Acesso negado! Rota exige autenticação');
    }
}
