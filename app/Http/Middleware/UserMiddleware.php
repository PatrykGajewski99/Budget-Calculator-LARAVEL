<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class UserMiddleware
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
        if(Auth::user()) {
            if (Auth::user()->privilege == "user") {
                return $next($request);
            }
        }
        return redirect('/login');
    }
}
