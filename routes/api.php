<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Products
Route::get("/products",  [ProductController::class, 'index']);
Route::post("/products",  [ProductController::class, 'store']);
Route::delete("/products/{id}",  [ProductController::class, 'delete']);
Route::get("/products/{id}",  [ProductController::class, 'show']);
Route::put("/products/{id}",  [ProductController::class, 'update']);

// Categories
Route::get("/categories",  [CategoryController::class, 'index']);
Route::post("/categories",  [CategoryController::class, 'store']);
Route::delete("/categories/{id}",  [CategoryController::class, 'delete']);
Route::get("/categories/{id}",  [CategoryController::class, 'show']);
Route::put("/categories/{id}",  [CategoryController::class, 'update']);

