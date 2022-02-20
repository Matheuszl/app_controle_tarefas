<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class GestorAccess
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
        /**
         * Vamos verificar se o usuario esta autenticado
         *
         * Depois verificamos se o usuario tem como atributo permissao de administrador do sistema
         * 
         * Depos temos que declarar no Karnel.php
         */
        if (auth()->check() and auth()->user()->gestor) {
            return $next($request);
        } else {
            return response()->view('acesso-negado');
        }
    }
}
