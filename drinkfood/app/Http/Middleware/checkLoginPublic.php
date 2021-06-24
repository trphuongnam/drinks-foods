<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkLoginPublic
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
        /* Check if the user is logged in to allow access  */
        if(Auth::check() == true)
        {
            return $next($request);
        }else{
            return redirect()->route('sign_in.index');
        }
    }
}
