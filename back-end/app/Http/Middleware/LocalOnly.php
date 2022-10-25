<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class LocalOnly
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
        if($request->getHost() != 'localhost')
        {
            return response('', 400);
        }
        
        return $next($request);
    }
}