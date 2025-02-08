<?php

use App\Http\Controllers\Api\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::prefix('users')->group(function () {
    Route::post('/register', [UserAuthController::class, "register"]);
    Route::post('/login', [UserAuthController::class, "login"])->name('login');
    Route::post('/logout', [UserAuthController::class, 'logout'])->middleware('auth:sanctum');
});
