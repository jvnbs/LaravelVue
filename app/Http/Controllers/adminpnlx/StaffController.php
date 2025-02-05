<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\User;
use App\Models\Acl;
use App\Models\UserPermission;
use App\Models\UserPermissionAction;
use App\Models\Permission;
use App\Models\PermissionAction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;



class StaffController extends Controller
{
    protected $modelName = "Staff";
    protected $sectionName = "Staff";
    protected $sectionNamePlural = "Staffs";

    public function __construct(Request $request)
    {
        View::share('modelName', $this->modelName);
        View::share('sectionName', $this->sectionName);
        View::share('sectionNamePlural', $this->sectionNamePlural);
    }

    public function index(Request $request)
    {
        $query = Admin::query();

        $searchArray = $request->all();

        $gender = $request->gender;
        $status = $request->status;
        $searchTerm = $request->searchTerm;

        if ($request->has('gender')) {
            $query->where('gender', $request->gender);
        }

        if ($request->has('status')) {
            $query->where('status', $request->status);
        }

        if ($request->has('searchTerm')) {
            $searchTerm = $request->searchTerm;
            $query->where(function ($query) use ($searchTerm) {
                $query->where('name', 'LIKE', "%$searchTerm%")
                    ->orWhere('email', 'LIKE', "%$searchTerm%")
                    ->orWhere('phone', 'LIKE', "%$searchTerm%");
            });
        }
        $query->whereNotIn('id', [getAuthId(), 1]);
        $query->where('is_deleted', 0);
        $results = $query->paginate(5);

        return view('adminpnlx.' . $this->modelName . '.index', compact('results', 'searchTerm', 'gender', 'status'));
    }






    public function create()
    {
        $admin_modules = Acl::where('parent_id', 0)
            ->with(['admin_module_actions', 'admin_sub_modules.admin_module_actions'])->get();
        return view('adminpnlx.' . $this->modelName . '.add', compact('admin_modules'));
    }




    public function store(Request $request)
    {
        $formData = $request->all();

        $user = new Admin();
        $user->first_name = $request->firstname;
        $user->last_name = $request->lastname;
        $user->name = $request->firstname . ' ' . $request->lastname;
        $user->email = rand(10, 100) . $request->email;
        $user->phone_number = $request->phone_number;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->date_of_birth = $request->date_of_birth;
        $user->image = null;
        $user->description = $request->description;
        $user->role_id = $request->role_id;
        $user->save();
        $userId = $user->id;

        if (!empty($formData['data'])) {
            $id = $userId;
            // Delete old permissions
            UserPermission::where('user_id', $id)->delete();
            UserPermissionAction::where('user_id', $id)->delete();

            // Iterate over each admin module and process the permissions
            foreach ($formData['data'] as $adminModuleId => $moduleData) {
                // Save the main module permission
                $permission = new UserPermission;
                $permission->user_id = $id;
                $permission->admin_module_id = $adminModuleId;
                $permission->admin_sub_module_id = 0;
                $permission->is_active = 0;
                $permission->save();
                $userPermissionId = $permission->id;

                // Handle sub-modules and their actions
                if (!empty($moduleData['sub_modules'])) {
                    foreach ($moduleData['sub_modules'] as $subModuleId => $subModuleData) {
                        if ($subModuleData) {
                            // Save sub-module permission without actions
                            $subPermission = new UserPermission;
                            $subPermission->user_id = $id;
                            $subPermission->admin_module_id = $adminModuleId;
                            $subPermission->admin_sub_module_id = $subModuleId;
                            $subPermission->is_active = 1;
                            $subPermission->save();
                            $userSubPermissionId = $subPermission->id;
                            // Save actions for the sub-module
                            if (isset($subModuleData['module_actions'])) {
                                foreach ($subModuleData['module_actions'] as $actionId) {
                                    $subAction = new UserPermissionAction;
                                    $subAction->user_id = $id;
                                    $subAction->user_permission_id = $userSubPermissionId;
                                    $subAction->admin_module_id = $adminModuleId;
                                    $subAction->admin_sub_module_id = $subModuleId;
                                    $subAction->admin_module_action_id = $actionId;
                                    $subAction->is_active = 1;
                                    $subAction->save();
                                }
                            }
                        }
                    }
                } else {
                    if (!empty($moduleData['module_actions'])) {
                        foreach ($moduleData['module_actions'] as $actionId) {
                            $action = new UserPermissionAction;
                            $action->user_id = $id;
                            $action->user_permission_id = $userPermissionId;
                            $action->admin_module_id = $adminModuleId;
                            $action->admin_module_action_id = $actionId;
                            $action->is_active = 1;
                            $action->save();
                        }
                    }
                }
            }
        }

        return redirect()->route($this->modelName . '.index')->with('success', 'User has been created successfully!');

    }

    public function storeold(Request $request)
    {
        $formData = $request->all();
        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'phone_number' => 'required|numeric|digits:10',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|max:12',
                'gender' => 'required',
                'role_id' => 'required',
            ],
            [
                'firstname.required' => 'The first name is required.',
                'firstname.string' => 'The first name must be a string.',
                'firstname.max' => 'The first name cannot exceed 255 characters.',
                'lastname.required' => 'The last name is required.',
                'lastname.string' => 'The last name must be a string.',
                'lastname.max' => 'The last name cannot exceed 255 characters.',
                'phone_number.required' => 'The phone number is required.',
                'phone_number.numeric' => 'The phone number must be numeric.',
                'phone_number.digits' => 'The phone number must be exactly 10 digits.',
                'email.required' => 'The email address is required.',
                'email.email' => 'The email address must be a valid email.',
                'email.unique' => 'The email address is already taken.',
                'password.required' => 'The password is required.',
                'password.string' => 'The password must be a string.',
                'password.min' => 'The password must be at least 8 characters.',
                'password.max' => 'The password cannot exceed 12 characters.',
                'gender.required' => 'The gender is required.',
                'role_id.required' => 'The Role field is required.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            $user = new Admin();
            $user->first_name = $request->firstname;
            $user->last_name = $request->lastname;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->password = Hash::make($request->password);
            $user->gender = $request->gender;
            $user->date_of_birth = $request->date_of_birth;
            $user->image = null;
            $user->description = $request->description;
            $user->role_id = $request->role_id;
            $user->save();
            $userId = $user->id;


            if (!empty($formData['parent'])) {
                $id = $userId;
                UserPermission::where('user_id', $id)->delete();
                UserPermissionAction::where('user_id', $id)->delete();
                $roleId = $formData['role_id'];
                foreach ($formData['parent'] as $data) {

                    $obj = new UserPermission;
                    $obj['user_id'] = !empty($id) ? $id : 0;
                    $obj['admin_module_id'] = !empty($data['selected']) ? $data['selected'] : 0;
                    $obj['is_active'] = !empty($data['value']) ? $data['value'] : 0;
                    $userpermissiondata = $obj->save();
                    $userpermissionID = $obj->id;


                    if (isset($data['children']) && !empty($data['children'])) {
                        foreach ($data['children'] as $subModule) {
                            $objData = new UserPermissionAction;
                            $objData['user_id'] = !empty($id) ? $id : 0;
                            $objData['user_permission_id'] = $userpermissionID;
                            $objData['admin_module_id'] = !empty($data['selected']) ? $data['selected'] : 0;
                            $objData['admin_sub_module_id'] = !empty($subModule) ? $subModule : 0;
                            $objData['admin_module_action_id'] = !empty($subModule['id']) ? $subModule['id'] : 0;
                            $objData->save();
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->route($this->modelName . '.index')->with('success', 'User has been created successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Please try again.');
        }
    }

    public function show(string $id)
    {
        $modelId = base64_decode($id);
        $modelDetail = Admin::find($modelId);
        if (!$modelDetail) {
            return redirect()->back()->with('error', 'Something went wrong try Again');
        }
        return view('adminpnlx.' . $this->modelName . '.view', compact('modelDetail'));
    }

    public function edit(string $id)
    {
        $modelId = base64_decode($id);
        $modelDetail = Admin::find($modelId);
        if (!$modelDetail) {
            return redirect()->back()->with('error', 'Something went wrong try Again');
        }
        $admin_modules = Acl::where('parent_id', 0)
            ->with(['admin_module_actions', 'admin_sub_modules.admin_module_actions'])->get();

        $admin_moduless = UserPermissionAction::where('user_id', getAuthId())->get();
        return view('adminpnlx.' . $this->modelName . '.edit', compact('modelDetail', 'admin_modules'));
    }


    public function update(Request $request, $id)
    {
        $modelId = base64_decode($id);
        $modelDetail = Admin::find($modelId);
        if (!$modelDetail) {
            return redirect()->back()->with('error', 'Something went wrong try Again');
        }
        $validator = Validator::make(
            $request->all(),
            [
                'firstname' => 'required|string|max:255',
                'lastname' => 'required|string|max:255',
                'phone_number' => 'required|numeric|digits:10',
                'email' => 'required|email|unique:users,email,' . $modelId,
                'gender' => 'required',
                'description' => 'nullable|string|max:1000',
            ],
            [
                'firstname.required' => 'The first name is required.',
                'lastname.required' => 'The last name is required.',
                'phone_number.required' => 'The phone number is required.',
                'phone_number.numeric' => 'The phone number must be numeric.',
                'phone_number.digits' => 'The phone number must be exactly 10 digits.',
                'email.required' => 'The email address is required.',
                'email.email' => 'The email address must be valid.',
                'email.unique' => 'The email address is already taken.',
                'gender.required' => 'The gender is required.',
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            $user = $modelDetail;
            $user->first_name = $request->firstname;
            $user->last_name = $request->lastname;
            $user->name = $request->firstname . ' ' . $request->lastname;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->gender = $request->gender;
            $user->date_of_birth = $request->date_of_birth;
            $user->image = null;
            $user->description = $request->description;
            $user->role_id = $request->role_id;
            $user->save();
            $userId = $user->id;

            $formData = $request->all();
            if (!empty($formData['data'])) {
                $id = $userId;
                // Delete old permissions
                UserPermission::where('user_id', $id)->delete();
                UserPermissionAction::where('user_id', $id)->delete();
    
                // Iterate over each admin module and process the permissions
                foreach ($formData['data'] as $adminModuleId => $moduleData) {
                    // Save the main module permission
                    $permission = new UserPermission;
                    $permission->user_id = $id;
                    $permission->admin_module_id = $adminModuleId;
                    $permission->admin_sub_module_id = 0;
                    $permission->is_active = 0;
                    $permission->save();
                    $userPermissionId = $permission->id;
    
                    // Handle sub-modules and their actions
                    if (!empty($moduleData['sub_modules'])) {
                        foreach ($moduleData['sub_modules'] as $subModuleId => $subModuleData) {
                            if ($subModuleData) {
                                // Save sub-module permission without actions
                                $subPermission = new UserPermission;
                                $subPermission->user_id = $id;
                                $subPermission->admin_module_id = $adminModuleId;
                                $subPermission->admin_sub_module_id = $subModuleId;
                                $subPermission->is_active = 1;
                                $subPermission->save();
                                $userSubPermissionId = $subPermission->id;
                                // Save actions for the sub-module
                                if (isset($subModuleData['module_actions'])) {
                                    foreach ($subModuleData['module_actions'] as $actionId) {
                                        $subAction = new UserPermissionAction;
                                        $subAction->user_id = $id;
                                        $subAction->user_permission_id = $userSubPermissionId;
                                        $subAction->admin_module_id = $adminModuleId;
                                        $subAction->admin_sub_module_id = $subModuleId;
                                        $subAction->admin_module_action_id = $actionId;
                                        $subAction->is_active = 1;
                                        $subAction->save();
                                    }
                                }
                            }
                        }
                    } else {
                        if (!empty($moduleData['module_actions'])) {
                            foreach ($moduleData['module_actions'] as $actionId) {
                                $action = new UserPermissionAction;
                                $action->user_id = $id;
                                $action->user_permission_id = $userPermissionId;
                                $action->admin_module_id = $adminModuleId;
                                $action->admin_module_action_id = $actionId;
                                $action->is_active = 1;
                                $action->save();
                            }
                        }
                    }
                }
            }

            DB::commit();
            return redirect()->route($this->modelName . '.index')->with('success', 'User has been updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error updating user: ' . $e->getMessage(), ['stack' => $e->getTrace()]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.')->withInput();
        }
    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            $modelId = base64_decode($id);
            $modelDetail = Admin::find($modelId);
            if (!$modelDetail) {
                DB::rollBack();
                return redirect()->back()->with('error', 'User not found. Try again.');
            }

            $modelDetail->delete();
            DB::commit();
            return redirect()->route($this->modelName . '.index')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Something went wrong. Try again.');
        }
    }


    public function changeStatus($id, $status)
    {
        $modelId = base64_decode($id);
        $modelDetail = Admin::find($modelId);
        if (!$modelDetail) {
            return redirect()->back()->with('error', 'User not found. Try again.');
        }

        $modelDetail->is_active = $status == 1 ? 0 : 1;
        $modelDetail->save();

        return redirect()->route($this->modelName . '.index')->with('success', 'User status has been updated successfully.');
    }


    public function generatePdf()
    {
        $admins = Admin::get();
        $data = [
            'title' => 'PTI',
            'emoji' => "\u{1F600}",
            'date' => date('m/d/Y'),
            'admins' => $admins
        ];

        $pdf = PDF::loadView('adminpnlx.' . $this->modelName . '.pdf-view', $data);
        return $pdf->download('admins.pdf');
    }


}