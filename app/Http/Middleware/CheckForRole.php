<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckForRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    $roles = array_slice(func_get_args(), 2);
        if (\Auth::user()->hasRole($roles))
         {

        return $next($request);          
        }
        return redirect('/logout');     
    }
}
