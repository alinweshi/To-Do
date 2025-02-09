<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserAuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::prefix('users')->group(function () {
    Route::get('/user', function (Request $Request) {
        return $Request->user();
    });
    Route::post('/register', [UserAuthController::class, "register"]);
    Route::post('/login', [UserAuthController::class, "login"])->name('login');
    Route::post('/logout', [UserAuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->apiResource('tasks', TaskController::class);
Route::post('tasks/restore', [TaskController::class, 'restore'])->middleware("auth:sanctum");
Route::middleware('auth:sanctum')->apiResource('categories', CategoryController::class);
