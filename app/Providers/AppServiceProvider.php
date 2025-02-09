<?php

namespace App\Providers;

use App\Models\Task;
use App\Models\Category;
use App\Repositories\TaskRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositories\CategoryRepository;
use App\Interfaces\BaseRepositoryInterface;
use App\Interfaces\TaskRepositoryInterface;
use App\Http\Controllers\Api\TaskController;
use App\Interfaces\BaseReadRepositoryInterface;
use App\Http\Controllers\Api\CategoryController;
use App\Interfaces\BaseWriteRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $loader = \Illuminate\Foundation\AliasLoader::getInstance();
        $loader->alias('Debugbar', \Barryvdh\Debugbar\Facades\Debugbar::class);
        // Bind TaskRepository to BaseRepositoryInterface for TaskController
        $this->app->when(TaskController::class)
            ->needs(BaseRepositoryInterface::class)
            ->give(function () {
                return new TaskRepository(new Task());
            });

        // Bind CategoryRepository to BaseRepositoryInterface for CategoryController
        $this->app->when(CategoryController::class)
            ->needs(BaseRepositoryInterface::class)
            ->give(function () {
                return new CategoryRepository(new Category());
            });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
