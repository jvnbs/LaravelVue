<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthApi
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized access. Please sign in to continue.'
            ], 401);
        }

        if (!Auth::guard('api')->check()) {
            return response()->json([
                'success' => false,
                'message' => 'Session expired or invalid token. Please log in again.'
            ], 401);
        }

        return $next($request);
    }
}
