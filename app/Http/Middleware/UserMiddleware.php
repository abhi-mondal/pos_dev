<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UserMiddleware
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
        if(isset(Auth::user()->id)) {
            $user_type = Auth::user()->user_type;
            if($user_type=='User'){
                return $next($request);
            }else{
                return redirect(url('/'));
            }
        }else{
            return redirect(url('/'));
        }
    }
}
