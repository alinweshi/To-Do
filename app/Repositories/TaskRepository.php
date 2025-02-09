<?php

namespace App\Repositories;


use App\Models\Task;
use App\Repositories\AbstractModelRepository;

class TaskRepository extends AbstractModelRepository
{
    public function __construct(public Task $task)
    {
        // dd($task);
        parent::__construct($task);
    }
}
