<?php

namespace App\Http\Middleware;

use Closure;

class VerificarRol
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
        if($request->user()->tokenCan('Usuario'))
        {
            return $next($request);
        }
        else if($request->user()->tokenCan('Admin'))
        {
            return $next($request);
        }

        return abort(403, "¿Y TU ERES?");
    }
}
