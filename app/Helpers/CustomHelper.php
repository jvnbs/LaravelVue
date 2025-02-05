<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use App\Models\Role;
use App\Models\Permission;
use App\Models\Acl;
use App\Models\UserPermission;
use App\Models\UserPermissionAction;
use App\Models\Translation;

if (!function_exists('getAuthUser')) {
    function getAuthUser()
    {
        try {
            if (Auth::guard('admin')->check()) {
                return Auth::guard('admin')->user();
            }
            return null; // Or throw an exception if needed
        } catch (\Exception $e) {
            Log::error("Error retrieving Auth ID: " . $e->getMessage());
            return null;
        }
    }
}

if (!function_exists('getAuthId')) {
    function getAuthId()
    {
        try {
            if (Auth::guard('admin')->check()) {
                return Auth::guard('admin')->user()->id;
            }
            return null; // Or throw an exception if needed
        } catch (\Exception $e) {
            Log::error("Error retrieving Auth ID: " . $e->getMessage());
            return null;
        }
    }
}

if (!function_exists('getAuthFName')) {
    function getAuthFName()
    {
        try {
            if (Auth::guard('admin')->check()) {
                return Auth::guard('admin')->user()->first_name;
            }
            return null; // Or throw an exception if needed
        } catch (\Exception $e) {
            Log::error("Error retrieving Auth First Name: " . $e->getMessage());
            return null;
        }
    }
}

if (!function_exists('getAuthLName')) {
    function getAuthLName()
    {
        try {
            if (Auth::guard('admin')->check()) {
                return Auth::guard('admin')->user()->last_name;
            }
            return null; // Or throw an exception if needed
        } catch (\Exception $e) {
            Log::error("Error retrieving Auth Last Name: " . $e->getMessage());
            return null;
        }
    }
}

if (!function_exists('getAuthName')) {
    function getAuthName()
    {
        try {
            if (Auth::guard('admin')->check()) {
                $user = Auth::guard('admin')->user();
                return $user->first_name . ' ' . $user->last_name;
            }
            return null; // Or throw an exception if needed
        } catch (\Exception $e) {
            Log::error("Error retrieving Auth Name: " . $e->getMessage());
            return null;
        }
    }
}

if (!function_exists('getAuthEmail')) {
    function getAuthEmail()
    {
        try {
            if (Auth::guard('admin')->check()) {
                return Auth::guard('admin')->user()->email;
            }
            return null; // Or throw an exception if needed
        } catch (\Exception $e) {
            Log::error("Error retrieving Auth Email: " . $e->getMessage());
            return null;
        }
    }
}

if (!function_exists('getAuthRoles')) {
    function getAuthRoles()
    {
        try {
            if (Auth::guard('admin')->check()) {
                return Role::where('is_active', 1)->get();
            }
            return null; // Or throw an exception if needed
        } catch (\Exception $e) {
            Log::error("Error retrieving Auth Email: " . $e->getMessage());
            return null;
        }
    }
}

if (!function_exists('getPermissions')) {
    function getPermissions()
    {
        try {
            if (Auth::guard('admin')->check()) {
                return Permission::where('is_active', 1)->get();
            }
            return null;
        } catch (\Exception $e) {
            Log::error("Error retrieving Auth Email: " . $e->getMessage());
            return null;
        }
    }
}


if (!function_exists('getSidebarModule')) {
    function getSidebarModule()
    {
        try {
            if (Auth::guard('admin')->check()) {
                if (getAuthId() == 1) {
                    $hasUserPermission = Acl::with('getAclSubModules')->where('is_active', 1)->where('parent_id', 0)->get();
                } else {

                    $hasUserPermission = UserPermission::with([
                        'getAclSubModules' => function ($query) {
                            // Filter sub-modules based on user ID and exclude main modules
                            $query->where('user_id', getAuthId())
                                ->where('admin_sub_module_id', '!=', 0)
                                ->leftJoin('acls', 'acls.id', '=', 'user_permissions.admin_sub_module_id');
                        }
                    ])
                        ->where('user_id', getAuthId())
                        ->where('admin_sub_module_id', 0) // Only fetch main modules
                        ->leftJoin('acls', 'acls.id', '=', 'user_permissions.admin_module_id') // Join with ACL table for main modules
                        ->select('user_permissions.*', 'acls.title', 'acls.path', 'acls.parent_id')
                        ->get();
                }
                $modelss = $hasUserPermission;
                return $modelss;
            }
            return null;
        } catch (\Exception $e) {
            Log::error("Error retrieving Auth Email: " . $e->getMessage());
            return null;
        }
    }
}




if (!function_exists('getTableSchemaWithRecords')) {
    function getTableSchemaWithRecords($tableName)
    {
        try {
            // Validate table name to avoid SQL injection
            if (!preg_match('/^[a-zA-Z0-9_]+$/', $tableName)) {
                throw new \Exception("Invalid table name: {$tableName}");
            }

            // Retrieve the schema information for the given table
            $columns = DB::select("SHOW COLUMNS FROM {$tableName}");

            // Format schema into a table-like structure
            $formattedSchema = [];
            foreach ($columns as $column) {
                $formattedSchema[] = [
                    'Field' => $column->Field,
                    'Type' => $column->Type,
                    'Null' => $column->Null,
                    'Key' => $column->Key,
                    'Default' => $column->Default,
                    'Extra' => $column->Extra,
                ];
            }

            $records = DB::table($tableName)->orderByDesc('id')->get();
            return [
                'schema' => $formattedSchema,
                'records' => $records,
            ];
        } catch (\Exception $e) {
            Log::error("Error retrieving schema or records for table '{$tableName}': " . $e->getMessage());
            return null;
        }
    }
}


if (!function_exists('hasPermissions')) {
    function hasPermissions()
    {
        $path = request()->path();
        $aclId = Acl::where('path', $path)->where('is_active', 1)->value('id');
        try {
            // Check if the user is authenticated
            if (Auth::guard('admin')->check()) {
                // Get the user's permission action IDs for the specified sub-module (3)
                $permissionIds = DB::table('user_permission_actions')
                    ->where('user_id', getAuthId())
                    ->where('admin_sub_module_id', $aclId)
                    ->pluck('admin_module_action_id');

                // If the user has no permissions, return an empty array
                if ($permissionIds->isEmpty()) {
                    return [];
                }

                // Get the current path
                $path = request()->path();

                // Retrieve permissions based on the path and filter by allowed actions
                return Acl::where('acls.path', $path)
                    ->where('acls.is_active', 1)
                    ->leftJoin('acl_actions', 'acl_actions.acl_module_id', 'acls.id')
                    ->whereIn('acl_actions.id', $permissionIds)
                    ->pluck('acl_actions.name', 'acl_actions.id')
                    // ->select(
                    //     'acls.title',
                    //     'acls.path',
                    //     'acl_actions.id as acl_action_id',
                    //     'acl_actions.name',
                    //     'acl_actions.function_name'
                    // )
                    // ->get()
                    ->toArray();
            }

            // If the user is not authenticated, return an empty array
            return [];
        } catch (\Exception $e) {
            Log::error("Error retrieving permissions: " . $e->getMessage());
            return [];
        }
    }
}





if (!function_exists('functionCheckPermission')) {
    function functionCheckPermission($function_name = "")
    {
        if (Auth::guard('admin')->user()->id != 1) {
            $user_id = Auth::guard('admin')->user()->id;
            $permissionData = DB::table("user_permission_actions")
                ->select("user_permission_actions.is_active")
                ->leftJoin("acl_actions", "acl_actions.id", "=", "user_permission_actions.admin_module_action_id")
                ->where('user_permission_actions.user_id', $user_id)
                ->where('user_permission_actions.is_active', 1)
                ->where('acl_actions.function_name', $function_name)
                ->first();

            if (!empty($permissionData)) {
                return 1;
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }
}



if (!function_exists('checkPermissionddd')) {
    function checkPermissiossn()
    {
        $segment1 = Request()->segment(1);
        $segment2 = Request()->segment(2);
        $segment3 = Request()->segment(3);

        $segment1_1 = explode(' ', $segment1);
        $segment1_1 = end($segment1_1);
        $segment2_2 = explode(' ', $segment2);
        $segment2_2 = end($segment2_2);
        $segment3_3 = explode(' ', $segment3);
        $segment3_3 = end($segment3_3);

        if (in_array($segment1_1, $actions_arr) || in_array($segment2_2, $actions_arr) || in_array($segment3_3, $actions_arr)) {
            return 1;
        }

        $user_id = Auth::user()->id;
        $user_role_id = Auth::user()->user_role_id;
        $path = Request()->path();
        $action = Route::current()->getAction();

        $function_name = explode("\\", $action['controller']);
        $function_name = end($function_name);
        $permissionData = DB::table("user_permission_actions")
            ->select("user_permission_actions.is_active")
            ->leftJoin("acl_admin_actions", "acl_admin_actions.id", "=", "user_permission_actions.admin_module_action_id")
            ->where('user_permission_actions.user_id', $user_id)
            ->where('user_permission_actions.is_active', 1)
            ->where('acl_admin_actions.function_name', $function_name)
            ->first();

        $byDefaultPermissionData = DB::table("acl_admin_actions")
            ->where('acl_admin_actions.is_show', 0)
            ->where('acl_admin_actions.function_name', $function_name)
            ->first();
        if (!empty($permissionData) || !empty($byDefaultPermissionData)) {
            return 1;
        } else {
            return 0;
        }
    }
}