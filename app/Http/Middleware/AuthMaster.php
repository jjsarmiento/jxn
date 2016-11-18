<?php

namespace App\Http\Middleware;

use Closure;

class AuthMaster
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
        if($request->user()->role != 'MASTER'){
            return redirect()->intended('/logout');
        }
        return $next($request);
    }
}
