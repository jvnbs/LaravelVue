<?php

use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\NewsController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);


Route::get('/categories', [HomeController::class, 'categories']);
Route::get('/faqs', [HomeController::class, 'faqs']);
Route::get('/products', [HomeController::class, 'products']);
Route::get('/news', [HomeController::class, 'news']);

Route::middleware('AuthApi')->group(function () {
    Route::get('/blogs', [HomeController::class, 'blogs']);
    Route::post('/logout', [AuthController::class, 'logout']);
    // Route::apiResource('/blogs',BlogController::class);
    Route::apiResource('/news',NewsController::class);

});



