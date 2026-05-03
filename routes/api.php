<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductController;

//Public
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',[AuthController::class,'login']);

// Protected
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class,'logout']);
    Route::get('/user', [AuthController::class,'user']);
    Route::apiResource('products', ProductController::class);
});