<?php
namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractTaskRepository implements TaskRepositoryInterface
{
protected Model $model;

public function __construct(Model $model)
{
$this->model = $model;
}

public function getAllTasks(): mixed
{
return $this->model->all();
}

public function createTask(array $data): mixed
{
return $this->model->create($data);
}

public function updateTask(int $taskId, array $data): mixed
{
$task = $this->model->find($taskId);
return $task ? $task->update($data) : null;
}

public function deleteTask(int $taskId): mixed
{
$task = $this->model->find($taskId);
return $task ? $task->delete() : null;
}

public function getTaskById(int $taskId): mixed
{
return $this->model->find($taskId);
}

public function restoreTask(int $taskId): mixed
{
$task = $this->model->withTrashed()->find($taskId);
return $task ? $task->restore() : null;
}

public function completeTask(int $taskId): mixed
{
$task = $this->model->find($taskId);
return $task ? $task->update(['completed_at' => now()]) : null;
}
}