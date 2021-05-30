<?php

namespace App\Http\Middleware;

use App\Http\Controllers\UserService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!UserService::verify()) return redirect('/login');
        return $next($request);
    }
}
