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
        return $this->model->limit(10)->get();
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


    public function markAsCompleted(Model $model): bool
    {
        $model->status = 'completed';
        return $model->save();
    }
    public function getAllTrashed(): collection
    {
        return $this->model->onlyTrashed()->get();
    }
    public function restore(Model $model)
    {
        // dd($model);
        return $model->restore();
    }
}
