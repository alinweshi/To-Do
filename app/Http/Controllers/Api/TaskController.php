<?php

namespace App\Http\Controllers\Api;


use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\BaseRepositoryInterface;
use App\Interfaces\TaskRepositoryInterface;
use App\Http\Requests\Tasks\CreateTaskRequest;
use App\Interfaces\BaseReadRepositoryInterface;
use App\Interfaces\BaseWriteRepositoryInterface;

class TaskController extends Controller
{
    public function __construct(private BaseRepositoryInterface $taskRepository) {}

    public function index()
    {
        return response()->json($this->taskRepository->getAll());
    }

    public function store(CreateTaskRequest $request) {}

    public function show(Task $task)
    {
        $task = $this->taskRepository->getById($task);

        return new TaskResource($task);
    }

    public function update(Task $task, CreateTaskRequest $request)
    {
        // dd($task);
        $validated = $request->validated();
        $updated = $this->taskRepository->update($task, $validated);

        return $updated ? response()->json(['message' => 'Task updated successfully']) :
            response()->json(['error' => 'Task not found'], 404);
    }

    public function destroy(task $task)
    {
        $deleted = $this->taskRepository->delete($task);

        return $deleted ? response()->json(['message' => 'Task deleted successfully']) :
            response()->json(['error' => 'Task not found'], 404);
    }
    // public function restore($id)
    // {
    //     $restored = $this->taskRepository->restoreTask($id);

    //     return $restored ? response()->json(['message' => 'Task restored successfully']) :
    //         response()->json(['error' => 'Task not found'], 404);
    // }
}
