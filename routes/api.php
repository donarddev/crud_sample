<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

// Public routes (no authentication required)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Public GET - List all products (no token required)
Route::get('/products', [\App\Http\Controllers\Api\ProductController::class, 'index']);

// Protected routes (authentication required)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Product API routes (protected)
    Route::apiResource('products', \App\Http\Controllers\Api\ProductController::class);
});
