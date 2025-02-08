<?php

namespace App\Interfaces;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

interface TaskRepositoryInterface
{
    /**
     * Get all tasks.
     */
    public function getAll(): Collection;

    /**
     * Get a task by ID.
     */
    public function getById(Model $model): ?Task;

    /**
     * Create a new task.
     */
    public function create(array $data): Task;

    /**
     * Update an existing task.
     */
    public function update(Model $model, array $data): bool;

    /**
     * Delete a task.
     */
    public function delete(Model $model): bool;

    /**
     * Restore a soft-deleted task.
     */
    public function restore(Model $model): bool;

    /**
     * Mark a task as completed.
     */
    public function complete(Model $model): ?Task;
}
