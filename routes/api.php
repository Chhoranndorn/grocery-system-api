<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BrandController;

// Public
// Route::get('/products', [ProductController::class, 'index']);
Route::get('/products', function () {
    return response()->json(['message' => 'NEW VERSION']);
});
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/brands', [BrandController::class, 'index']);

// Protected
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});

