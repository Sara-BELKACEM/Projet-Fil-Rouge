<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\MessageController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\CategoryController;


Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);

Route::get('categories', [CategoryController::class,'index']);
Route::get('projects',[ProjectController::class,'index']);
Route::get('projects/{project}',[ProjectController::class,'show']);
Route::get('products',[ProductController::class,'index']);
Route::get('products/{product}',[ProductController::class,'show']);
Route::post('messages',[MessageController::class,'store']);

Route::middleware('auth:sanctum')->group(function(){
    Route::post('logout',[AuthController::class,'logout']);

    // Route::apiResource('orders',OrderController::class);
    Route::get('orders', [OrderController::class, 'index']);
    Route::post('orders', [OrderController::class, 'store']);
    Route::get('orders/{order}', [OrderController::class, 'show']);


    Route::middleware('admin')->group(function(){
        Route::apiResource('categories',CategoryController::class)->except(['index']);
        Route::apiResource('projects',ProjectController::class)->except(['index','show']);
        Route::apiResource('products',ProductController::class)->except(['index','show']);
        Route::get('messages',[MessageController::class,'index']);
    });
});

    // // CATEGORIES
    // Route::post('/categories', [CategoryController::class, 'store']);
    // Route::put('/categories/{category}', [CategoryController::class, 'update']);
    // Route::delete('/categories/{category}', [CategoryController::class, 'destroy']);

    // // PROJECT
    // Route::post('/projects', [ProjectController::class, 'store']);
    // Route::put('/projects/{project}', [ProjectController::class, 'update']);
    // Route::delete('/projects/{project}', [ProjectController::class, 'destroy']);

    // // PRODUCTS
    // Route::post('/products', [ProductController::class, 'store']);
    // Route::put('/products/{product}', [ProductController::class, 'update']);
    // Route::delete('/products/{product}', [ProductController::class, 'destroy']);
