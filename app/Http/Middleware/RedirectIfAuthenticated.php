<?php

namespace App\Http\Middleware;

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
            return redirect('/home');
        }
        else{
            // dd("Hello");
            return redirect()->action('AdminController@login')->with('warning','Please login to access');
        }
        // if (Auth::user()->admin == 1 ) {
        //     return redirect('/dashboard');
        // }
        // else{
        //     // dd("Hello");
        //     return redirect()->action('AdminController@login')->with('warning','Please login to access');
        // }

        return $next($request);
    }
}
