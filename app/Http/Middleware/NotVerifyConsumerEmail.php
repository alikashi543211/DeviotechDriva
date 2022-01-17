<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class NotVerifyConsumerEmail
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
        if(Auth::user()->email_status=='not_verified'){
            return $next($request);
        }else{
            return redirect()->route("consumer.dashboard");
        }
    }
}
