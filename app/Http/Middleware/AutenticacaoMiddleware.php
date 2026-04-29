<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if(!$request -> session()->has('id')){

            // Verifica se não existe ID do usuário na sessão
            return redirect()->route('loginForm')->with('error', 'Você precisa estar logado para acessar essa página');

        }
        return $next($request);
    }
}
