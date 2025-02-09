<?php

namespace App\Http\Controllers\Api;


use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Resources\TaskResource;
use App\Interfaces\BaseRepositoryInterface;
use App\Http\Requests\Tasks\CreateTaskRequest;
use App\Http\Requests\Tasks\RestoreTaskRequest;


class TaskController extends Controller
{
    public function __construct(private BaseRepositoryInterface $taskRepository) {}

    public function index()
    {
        $tasks = cache()->remember('tasks.all', now()->addMinutes(10), function () {
            return $this->taskRepository->getAll();
        });

        return response()->json($tasks);
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

    public function restore(RestoreTaskRequest $request)
    {
        $validated = $request->validated();

        // Attempt to restore the task
        $restored = $this->taskRepository->restore($validated['task_id']);

        if (!$restored) {
            return response()->json(['success' => false, 'message' => 'Task not found or not deleted'], 404);
        }

        return response()->json(['success' => true, 'message' => 'Task restored successfully']);
    }
}
