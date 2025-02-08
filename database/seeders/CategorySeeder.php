<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Create 5 categories using the factory
        Category::factory()->count(5)->create();

        // Create specific categories if needed
        Category::create([
            'name' => 'Work',
            'description' => 'Tasks related to work',
        ]);

        Category::create([
            'name' => 'Personal',
            'description' => 'Tasks related to personal life',
        ]);
    }
}
