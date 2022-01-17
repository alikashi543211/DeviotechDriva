<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
                // return redirect(RouteServiceProvider::HOME);
            if(auth()->user()->role=="admin" || auth()->user()->role=="sub_admin")
            {
                return redirect()->route("admin.dashboard");
            } elseif(auth()->user()->role=="garage" || auth()->user()->role=="sub_garage")
            {
                return redirect()->route("garage.dashboard");
            } elseif(auth()->user()->role=="consumer")
            {
                return redirect()->route("consumer.dashboard");
            }
        }

        return $next($request);
    }
}
