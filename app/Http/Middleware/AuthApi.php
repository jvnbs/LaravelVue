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
        if (auth('api')->check()) {
            $user = auth('api')->user();
            
            if ($user->is_active != 1) {
                auth('api')->logout();
                return response()->json([
                    'error' => 'Your account is inactive. Please contact support.'
                ], 403);
            }

            if ($user->is_deleted != 0) {
                auth('api')->logout();
                return response()->json([
                    'error' => 'Your account has been deleted.'
                ], 403);
            }

            return $next($request);
        }

        return response()->json([
            'error' => 'Unauthorized access. Please sign in to continue.'
        ], 401);
    }
}
