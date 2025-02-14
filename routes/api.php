<?php

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/categories', [HomeController::class, 'getCategory']);

Route::apiResource('/products',ProductController::class);
