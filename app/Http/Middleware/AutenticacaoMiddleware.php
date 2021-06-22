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
    public function handle($request, Closure $next, $metodo_autenticacao)
    {

        if($metodo_autenticacao == 'padrao')
        {
            return $next($request);
        }
        else{
             return Response('Opa fi bão ?');
        }
       // return $next($request);
      
    }
}
