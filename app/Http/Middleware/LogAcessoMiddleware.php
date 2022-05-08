<?php

namespace App\Http\Middleware;

use Closure;
use App\LogAcesso;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // return $next($request);

        $ip = $request->server->get('REMOTE_ADDR');  // IP de quem acessou a rota
        $rota = $request->getRequestUri();           // Rota acessada pelo IP

        LogAcesso::create(['log' => "IP $ip requisitou a rota $rota"]);
        return Response('Chegamos no middleware e finalizamos no próprio middleware');
    }
}
