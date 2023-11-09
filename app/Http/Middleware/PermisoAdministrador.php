<?php

namespace App\Http\Middleware;

use Closure;

class PermisoAdministrador
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
        if ($this->permiso())
            return $next($request);
        return redirect('/login')->with('mensaje', 'No tiene permiso para entrar aquí');
    }

    private function permiso()
    {
        //dd(session()->get('nombre'));
        
        return 'Administrator';
    }
}
