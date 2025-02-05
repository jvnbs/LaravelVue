<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Request;

class CheckPermission
{
    public function handle($request, Closure $next)
    {
        // $adminModules = DB::table('user_permissions as up')
        //         ->select('up.admin_module_id', DB::raw('MAX(up.id) as id'), 'acls.title', 'acls.path', 'acls.icon') // Corrected select
        //         ->where('up.user_id', getAuthId())
        //         ->leftJoin('acls', 'acls.id', '=', 'up.admin_module_id')
        //         ->groupBy('up.admin_module_id', 'acls.title') 
        //         ->get()
        //         ->map(function ($adminModule) {
        //             $adminSubModule = DB::table('user_permissions')
        //             ->select('acls.id','acls.title', 'acls.path', 'acls.icon') 
        //             ->where('user_id', getAuthId())
        //         ->leftJoin('acls', 'acls.id', '=', 'user_permissions.admin_sub_module_id') 
        //                 ->where('admin_module_id', $adminModule->admin_module_id)
        //                 ->where('admin_sub_module_id', '!=', 0)
        //                 ->get();

        //             if ($adminSubModule->isNotEmpty()) {
        //                 $adminModule->adminSubModule = $adminSubModule;
        //             }

        //             return $adminModule;
        //         });




        if (auth('admin')->check()) {
            $admin = auth('admin')->user();
            if ($admin->id == 1) {
                return $next($request);
            }

            $currentRouteAction = Route::currentRouteAction();
            list($controller, $method) = explode('@', class_basename($currentRouteAction));
            $function_name = class_basename($currentRouteAction);
            $moduleName = str_replace('Controller', '', $controller);
            $methodType = Request::method();

            if ($methodType != 'GET') {
                return $next($request);
            }

            $permissionData = DB::table("user_permission_actions")
                ->select("user_permission_actions.is_active")
                ->leftJoin("acl_actions", "acl_actions.id", "=", "user_permission_actions.admin_module_action_id")
                ->where('user_permission_actions.user_id', $admin->id)
                ->where('user_permission_actions.is_active', 1)
                ->where('acl_actions.function_name', $function_name)
                ->first();

            if (!empty($permissionData)) {
                return $next($request);
            } else {
                return back()->with('error', 'You do not have permission to access ' . $moduleName . ' ' . $method);

            }

        }

        return redirect()->route('Admin.login')->with('error', 'Unauthorized access.');
    }
}
