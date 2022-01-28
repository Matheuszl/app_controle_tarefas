<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAcessoPerfil;

class LogAcessoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        //ela é executad automaticamente quando o muddleware é ativado
        //para ativado temos que atribuir em uma rota ou controller
        //aqui vai a logca da requast ou response

        //como atribuir esse middleware ao uma determinada rota ou controller?
        // return $next($request); //recupero e impurro pra frente
        $ip = $request->server->get('REMOTE_ADDR');
        $rota = $request->getRequestUri();
        LogAcessoPerfil::create(['log' => "IP $ip, solicitou a rota $rota"]);
        return $next($request); 


    }
}
