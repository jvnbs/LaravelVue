<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AuthAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth('admin')->check()) {
            $admin = auth('admin')->user();
            
            if ($admin->is_active != 1) {
                Auth::logout();
                return back()->withErrors(['login' => 'Your account is inactive. Please contact support.']);
            }

            if ($admin->is_deleted != 0) {
                Auth::logout();
                return back()->withErrors(['login' => 'Your account has been deleted.']);
            }

            return $next($request);
        }

        return redirect()->route('Admin.login')->with('error', 'Unauthorized access.');
    }
}
