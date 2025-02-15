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
                $validator = Validator::make($request->all(), [
                    'email' => 'required|email',
                    'password' => 'required|min:6'
                ]);

                if ($validator->fails()) {
                    return response()->json($validator->errors(), 400);
                }

                if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                    return response()->json(['error' => 'Unauthorized'], 401);
                }

                $user = Auth::user();
                $token = $user->createToken('LaravelVueApp')->accessToken;

                return response()->json([
                    'user' => $user,
                    'access_token' => $token
                ]);
            }

    


    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Successfully logged out']);
    }

    
}
