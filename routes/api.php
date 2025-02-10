<?php

use App\Models\Task;
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

/*--------------------------------------------------------------------------------------------------------------------*/
Route::middleware('auth:sanctum')->group(function () {
    Route::get('tasks/trashed', [TaskController::class, 'getAllTrashedTasks'])->name('tasks.trashed');
    // Route::put('/restore/{task}', [TaskController::class, 'restore'])->name('tasks.restore');
    // Route::put('/restore/{id}', function ($id) {
    //     $restored = Task::onlyTrashed()->find($id);
    //     $restored->restore();
    // })->name('tasks.restore');
    // Route::put('/restore/{task}', function (Task $task) {
    //     $restored = $task->onlyTrashed();
    //     $restored->restore();
    // })->name('tasks.restore');
    Route::put('tasks/restore/{task}', [TaskController::class, "restore"])->name('tasks.restore')->withTrashed();

    Route::apiResource('tasks', TaskController::class);
});
/*--------------------------------------------------------------------------------------------------------------------*/

// Route::get('tasks/trashed-tasks', [TaskController::class, 'getAllTrashedTasks'])->middleware("auth:sanctum");
Route::middleware('auth:sanctum')->apiResource('categories', CategoryController::class);
