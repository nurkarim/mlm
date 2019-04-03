<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AdminMiddleware
{

    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->user_type == 0) {
                return $next($request);
            }
            return route('login'); 
        }
    }
}
