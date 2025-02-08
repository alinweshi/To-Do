<?php

namespace App\Interfaces;


interface TaskRepositoryInterface
{
    public function getAllTasks(): mixed;

    public function createTask(array $data): mixed;

    public function updateTask(int $taskId, array $data): mixed;

    public function deleteTask(int $taskId): mixed;

    public function getTaskById(int $taskId): mixed;

    public function restoreTask(int $taskId): mixed;

    public function completeTask(int $taskId): mixed;
}
