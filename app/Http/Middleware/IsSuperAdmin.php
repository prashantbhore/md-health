<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Session::has('md_super_admin*%') && Auth::guard('superadmin')->user()) {
            return $next($request);
        }
        Auth::logout();
        Session::flush();
        return redirect('superadmin');
    }

    // public function handle(Request $request, Closure $next): Response
    // {

    //     if (Session::has('athletekar_admin*%') && Auth::guard('admin')->user()) {
    //         return $next($request);
    //     }
    //     Auth::logout();
    //     Session::flush();
    //     return redirect('admin');
    // }



}
