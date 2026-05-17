<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\BrandController;

// Public
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/brands', [BrandController::class, 'index']);

Route::get('/banners', function () {
    return response()->json([
        'status' => true,
        'data' => [
            [
                'id' => 1,
                'image' => 'https://picsum.photos/400/200?1',
            ],
            [
                'id' => 2,
                'image' => 'https://picsum.photos/400/200?2',
            ],
            [
                'id' => 3,
                'image' => 'https://picsum.photos/400/200?3',
            ],
        ]
    ]);
});

// Protected
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
});
