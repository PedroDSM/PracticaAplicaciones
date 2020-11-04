<?php

namespace App\Http\Middleware;

use Closure;

class VerificarProducto
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
        if($request->id <=15){
            return $next($request);
        }
        return abort(400, 'id no existente');
    }
}
