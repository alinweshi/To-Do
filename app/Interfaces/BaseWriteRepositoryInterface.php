<?php

namespace App\Interfaces;

interface BaseWriteRepositoryInterface
{
    public function createModel($data);
    public function updateModel($model, $data);
    public function deleteModel($model);
}
