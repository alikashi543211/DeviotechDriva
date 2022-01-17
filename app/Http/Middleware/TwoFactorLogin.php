<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Session;

class TwoFactorLogin
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
        if (Auth::check())
        {
            if(auth()->user()->two_factor_login==1 && Session::get("two_factor_auth")==false)
                {
                    return redirect()->route("verify_login");
                }
        }
        return $next($request);
    }
}
