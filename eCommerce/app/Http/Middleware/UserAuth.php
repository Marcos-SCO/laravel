<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAuth
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
        // init session
        session();
        $next = $next($request);
        $loginPath = $request->path() == 'login';
        $sessionUser = session('user');

        return $loginPath && $sessionUser ? redirect('/') : $next;
    }
}
