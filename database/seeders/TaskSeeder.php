<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;

class TaskSeeder extends Seeder
{
    public function run()
    {
        // Create 50 tasks using the factory
        Task::factory()->count(50)->create();

        // Create specific tasks if needed
        Task::create([
            'title' => 'Complete project',
            'description' => 'Finish the Laravel project',
            'user_id' => 1, // Assuming user with ID 1 exists
            'category_id' => 1, // Assuming category with ID 1 exists
        ]);
    }
}
