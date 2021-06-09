<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        /*
        if (!$request->is('login', 'registro') && !Auth::check()) {
            return redirect('/entrar');
        }

        Caso eu queira adicionar o novo middleware de forma global no 'web', no Kernel.php.
        */

        return $next($request);
    }
}
