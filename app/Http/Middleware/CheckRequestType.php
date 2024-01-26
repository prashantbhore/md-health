<?php

namespace App\Http\Middleware;

use Closure;

class CheckRequestType
{
    public function handle($request, Closure $next)
    {
        // Check if the request is coming from the API
        if ($request->is('api/*')) {
            $request->requestType = 'api';
        } else {
            $request->requestType = 'web';
        }

        return $next($request);
    }
}
