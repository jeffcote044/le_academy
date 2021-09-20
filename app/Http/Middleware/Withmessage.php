<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Withmessage
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
        $route = $request->route()->getName();
        if(!Auth::user() and $route === 'payment.checkout') {                
            return redirect()->route('login')->with('error', 'Para seguir con tu proceso de compra es necesario que inicies sesión o crees una cuenta nueva.');
        }

        return $next($request);
    }
}
