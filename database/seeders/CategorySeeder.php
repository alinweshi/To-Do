<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Work',
            'description' => 'Tasks related to professional activities, including meetings, deadlines, and project management.',
        ]);

        Category::create([
            'name' => 'Personal',
            'description' => 'Tasks related to personal errands, hobbies, and family events.',
        ]);

        Category::create([
            'name' => 'Urgent',
            'description' => 'Tasks that require immediate attention to prevent delays or issues.',
        ]);

        Category::create([
            'name' => 'Health',
            'description' => 'Tasks related to health and wellness, such as exercise routines, doctor appointments, and health tracking.',
        ]);

        Category::create([
            'name' => 'Eating',
            'description' => 'Tasks related to meal planning, cooking, and dining out, ensuring balanced nutrition.',
        ]);

        Category::create([
            'name' => 'Medicine',
            'description' => 'Tasks concerning medication schedules, prescription refills, and regular medical check-ups.',
        ]);

        Category::create([
            'name' => 'Vacation',
            'description' => 'Tasks to plan and organize travel, leisure activities, and relaxation time.',
        ]);

        Category::create([
            'name' => 'Sleep',
            'description' => 'Tasks that help maintain a healthy sleep schedule and establish a consistent bedtime routine.',
        ]);
    }
}
