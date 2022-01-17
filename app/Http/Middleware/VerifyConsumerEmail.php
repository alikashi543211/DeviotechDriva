<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class VerifyConsumerEmail
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
        if(Auth::user()->email_status=='verified'){
            return $next($request);
        }else{
            return redirect()->back()->with('error','Please verify your email');
        }
    }
}