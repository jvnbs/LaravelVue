<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // ✅ Register API

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // ✅ Ensure Password is Hashed
        ]);

        return response()->json(['message' => 'User registered successfully'], 201);
    }


    // ✅ Login API
       
    public function login(Request $request)
    {
        try {
            // Log the login attempt
            Log::info('Login attempt for email: ' . $request->email);
    
            // Validate request input
            $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            // Attempt authentication
            if (!Auth::attempt($request->only('email', 'password'))) {
                Log::warning('Login failed for email: ' . $request->email);
                return response()->json(['message' => 'Invalid credentials'], 401);
            }
    
            // Retrieve authenticated user
            $user = Auth::user();
    
            // Check if Passport is installed and generate token
            if (!method_exists($user, 'createToken')) {
                Log::error('Passport issue: createToken method not found for user ID: ' . $user->id);
                return response()->json(['message' => 'OAuth issue: Passport may not be installed'], 500);
            }
    
            $token = $user->createToken('MyApp')->accessToken;
    
            // Log successful login
            Log::info('User logged in successfully: ' . $user->email);
    
            return response()->json([
                'status' => 200,
                'message' => 'Login successful',
                'token' => $token,
                'user' => $user
            ], 200);
            
        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
    
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred during login. Please try again later.'
            ], 500);
        }
    }
    

    // ✅ Logout API
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['message' => 'Logged out successfully']);
    }

    // ✅ Get Authenticated User
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
}
