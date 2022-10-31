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
        $requestOrigin = parse_url($request->headers->get('origin'),  PHP_URL_HOST);

        if($requestOrigin != 'benostermeier.com')
        {
            return response('Only api requests from same domain are allowed.', 403);
        }
        
        return $next($request);
    }
}