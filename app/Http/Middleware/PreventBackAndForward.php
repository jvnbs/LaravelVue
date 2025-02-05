<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PreventBackAndForward
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
    
        // Set no-cache headers
        $response->headers->set('Cache-Control', 'no-store, no-cache, must-revalidate, max-age=0');
        $response->headers->set('Expires', '0');
        $response->headers->set('Pragma', 'no-cache');
    
        return $response;
    }
    
    
    
}
