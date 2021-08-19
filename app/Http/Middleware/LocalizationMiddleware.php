<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Session;
use Closure;

class LocalizationMiddleware
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
        if(Session::has('locale')){
            \App::setlocale(Session::get('locale'));
        }
        return $next($request);
    }
}
