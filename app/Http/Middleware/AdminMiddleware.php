<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        //return $next($request);
        if(isset(Auth::user()->user_type)){
            if (Auth::user()->user_type == 'Admin'){
                return $next($request);
            }
            else if (Auth::user()->user_type == 'User'){
                return $next($request);
            }
            else{
                return redirect()->route('admin');
            }
        }else{
            return redirect()->route('admin');
        }
    }
}
