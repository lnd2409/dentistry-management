<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next,$role)
    {
        if (Auth::guard('nhanvien')->user()->cv_ma==$role||Auth::guard('nhanvien')->user()->cv_ma==3) {
            return $next($request);
        }

        return back();
    }
}