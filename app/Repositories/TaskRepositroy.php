<?php

namespace App\Repositories;

use App\Models\Task;

class TaskRepository extends AbstractTaskRepository
{
    public function __construct(Task $task)
    {
        parent::__construct($task);
    }
}
