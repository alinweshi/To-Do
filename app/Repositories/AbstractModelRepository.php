<?php

namespace App\Repositories;

use App\Models\Task;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

abstract class AbstractModelRepository implements BaseRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }



    public function getAll(): Collection
    {
        return $this->model->all();
    }
    public function getById(Model $model): ?Model
    {
        // dd($model);
        // return new ModelResource($this->model);
        return $model;
    }
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(Model $model, array $data): bool
    {
        return $model->update($data);
    }

    public function delete(Model $model): bool
    {
        return $model->delete();
    }

    public function restore(Model $model): bool
    {
        $task = $this->model->onlyTrashed()->find($model);
        return $task ? $task->restore() : false;
    }

    public function complete(Model $model): ?Model
    {
        $task = $this->model->find($model);
        if ($task) {
            $task->update(['completed' => true]);
            return $task;
        }
        return false;
    }
}
