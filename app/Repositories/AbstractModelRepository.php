<?php

namespace App\Repositories;

use App\Interfaces\BaseReadRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\BaseWriteRepositoryInterface;

abstract class AbstractModelRepository implements BaseWriteRepositoryInterface, BaseReadRepositoryInterface
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getAllModels(): mixed
    {
        return $this->model->all();
    }

    public function createModel($data): mixed
    {
        return $this->model->create($data);
    }

    public function updateModel($model, $data): mixed
    {
        $this->model = $model;
        return $this->model->update($data);
    }


    public function deleteModel($model): mixed
    {
        $this->model = $model;
        return $this->model->delete();
    }

    public function getModelById($model): mixed
    {
        return $this->model->find($model);
    }
}
