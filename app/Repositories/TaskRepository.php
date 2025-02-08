<?php

namespace App\Repositories;


use App\Models\Task;
use App\Repositories\AbstractModelRepository;

class TaskRepository extends AbstractTaskRepository
{
    public function __construct(public Task $task)
    {
        // dd($task);
        parent::__construct($task);
    }
    // public function restoreTask(int $taskId): mixed
    // {
    //     $task = $this->model->withTrashed()->find($taskId);
    //     return $task ? $task->restore() : null;
    // }
}
