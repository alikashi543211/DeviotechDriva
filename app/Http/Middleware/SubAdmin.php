<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class SubAdmin
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
        if (Auth::check()) {
            if(auth()->user()->role=="sub_admin")
            {
                return back()->with("error","You are not allowed for this action.");
            }
        }
        return $next($request);
    }
}
