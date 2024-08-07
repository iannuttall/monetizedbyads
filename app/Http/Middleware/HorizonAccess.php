<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HorizonAccess
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
        if (!in_array($request->ip(), explode(',', config('app.horizon_allowed_ips')))) {
            abort(403);
        }

        return $next($request);
    }
}
