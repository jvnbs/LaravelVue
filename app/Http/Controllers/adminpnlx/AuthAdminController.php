<?php

namespace App\Http\Controllers\adminpnlx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class AuthAdminController extends Controller
{
    protected $modelName = "auth";
    protected $sectionName = "Auth";
    protected $sectionNamePlural = "Auths";

    public function __construct(Request $request)
    {
        View::share('modelName', $this->modelName);
        View::share('sectionName', $this->sectionName);
        View::share('sectionNamePlural', $this->sectionNamePlural);
    }

    public function login(Request $request)
    {
        
        if ($request->isMethod('post')) {
            $validator = Validator::make(
                $request->all(),
                [
                    'email' => 'required|email|unique:users,email',
                    'password' => 'required|string|min:8|max:12',
                ],
                [
                    'email' => [
                        'required' => 'The email field is required.',
                        'email' => 'The email must be a valid email.',
                        'unique' => 'The email is already taken.',
                    ],
                    'password' => [
                        'required' => 'The password field is required.',
                        'string' => 'The password must be a string.',
                        'min' => 'The password must be at least 8 characters.',
                    ],
                ]
                
                );
            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $credentials = $request->only('email', 'password');

            if (auth('admin')->attempt($credentials)) {
                $user = Auth::guard('admin')->user();

                // Check if the user is active
                if ($user->is_active != 1) {
                    Auth::logout();
                    return back()->withErrors(['login' => 'Your account is inactive. Please contact support.']);
                }

                // Check if the user is deleted
                if ($user->is_deleted != 0) {
                    Auth::logout();
                    return back()->withErrors(['login' => 'Your account has been deleted.']);
                }

                // Successful login
                return redirect()->route('Dashboard')->with('success', 'Login successful!');
            }

            return redirect()->back()->withErrors(['error' => 'Something Wrong Try Again']);
        }
        if(Auth::guard('admin')->user())
        {
            return back();
        }
        return view('adminpnlx.auth.login');
    }
}