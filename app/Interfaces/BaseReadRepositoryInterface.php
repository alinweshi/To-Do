<?php

namespace App\Interfaces;

interface BaseReadRepositoryInterface
{
    public function getAllModels();
    public function getModelById($model);
}
