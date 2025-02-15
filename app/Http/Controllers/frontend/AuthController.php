<?php

namespace App\Http\Controllers\frontend;

use App\Classes\ApiResponseClass;
use App\Http\Controllers\Controller;
use App\Http\Requests\adminpnlx\UserAddRequest;
use App\Http\Resources\ModelResource;
use App\Interfaces\AuthRepositoryInterface;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    private AuthRepositoryInterface $AuthRepositoryInterface;
    public function __construct(AuthRepositoryInterface $AuthRepositoryInterface)
    {
        $this->AuthRepositoryInterface = $AuthRepositoryInterface;
    }


    public function index()
    {
        $data = $this->AuthRepositoryInterface->index();

        if ($data->isEmpty()) {
            return ApiResponseClass::sendResponse([], 'No blog found', 404);
        }

        return ApiResponseClass::sendResponse(
            ModelResource::collection($data),
            'Blog retrieved successfully',
            200,
        );
    }

        public function register(UserAddRequest $request)
        {
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password), 
            ];
        
            DB::beginTransaction();
            try {
                $user = $this->AuthRepositoryInterface->register($details);
                DB::commit();
                return ApiResponseClass::sendResponse(new ModelResource($user), 'Register Successful', 201);
        
            } catch (\Exception $ex) {
                DB::rollback(); 
                // return ApiResponseClass::sendError($ex->getMessage(), 500);
                return response()->json(['message' => 'Password incorrect!'], 500);
            }
        }
    
    
    
    
        public function login(Request $request)
        {
            $request->validate([
                'email' => 'required|email',
                'password' => 'required'
            ]);
    
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
    
                // Check if user is active
                if ($user->is_active != 1) {
                    return response()->json(['error' => 'Your account is inactive.'], 403);
                }
    
                // Check if user is deleted
                if ($user->is_deleted != 0) {
                    return response()->json(['error' => 'Your account has been deleted.'], 403);
                }
    
                // Generate Token
                $token = $user->createToken('API Token')->accessToken;
    
                return response()->json([
                    'message' => 'Login successful',
                    'user' => $user,
                    'token' => $token
                ]);
            }
    
            return response()->json(['error' => 'Invalid credentials'], 401);
        }
    


    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }

    
}
