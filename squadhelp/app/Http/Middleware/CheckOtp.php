<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckOtp
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
        if ($request->session()->exists('otp')) {
            // user value cannot be found in session
            return redirect('otp');
        }
        return $next($request);
    }
}
