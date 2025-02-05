<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DashboardControoler extends Controller
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

    public function index()
    {
        $users = User::where('is_deleted', 0)->limit(5)->get();
        $totalStaffs = Admin::where('is_deleted', 0)->count();
        $totalUsers = User::where('is_deleted', 0)->count();
        $totalRoles = Role::where('is_deleted', 0)->count();
        $totalCategories = Category::where('is_deleted', 0)->count();
        $totalProducts = Product::where('is_deleted', 0)->count();
        return view('adminpnlx.dashboard.index', compact('users', 'totalStaffs', 'totalUsers', 'totalRoles', 'totalCategories', 'totalProducts'));
    }



    public function profile(Request $request)
    {
        $modelDetail = getAuthUser();
        return view('adminpnlx.dashboard.profile', compact('modelDetail'));
    }


    public function profileUpdate(Request $request)
    {
        $modelId = getAuthId();
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
            $user              = $modelDetail;
            $user->first_name  = $request->firstname;
            $user->last_name   = $request->lastname;
            $user->name        = $request->firstname . ' ' . $request->lastname;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->gender = $request->gender;
            $user->date_of_birth = $request->date_of_birth;
            $user->image = null;
            $user->description = $request->description;
            $user->role_id = $request->role_id;
            $user->save();
            DB::commit();
            return redirect()->route('Dashboard')->with('success', 'Admin Profile has been updated successfully!');
        } catch (\Exception $e) {
            DB::rollBack();
            \Log::error('Error updating user: ' . $e->getMessage(), ['stack' => $e->getTrace()]);
            return redirect()->back()->with('error', 'Something went wrong. Please try again.')->withInput();
        }
    }

    
    
    public function changePassword(Request $request)
    {
        if($request->isMethod('POST')){

        $validated = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = auth()->user();
        $user->password = bcrypt($request->password);
        $user->save();
        
        return redirect()->back()->with('success', 'Password updated successfully!');
    }
    return view('adminpnlx.dashboard.change_password');

    }


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        return redirect()->route('Admin.login');
    }
}