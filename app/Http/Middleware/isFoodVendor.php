<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Session;
use Auth;


class isFoodVendor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('MDFoodVendor*%') && Auth::guard('md_health_food_registers')->user()){
            return $next($request);
        }
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
}
