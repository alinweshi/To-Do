<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\AbstractModelRepository;

class CategoryRepository extends AbstractModelRepository
{
    public function __construct(public Category $category)
    {
        parent::__construct($category);
    }
}
