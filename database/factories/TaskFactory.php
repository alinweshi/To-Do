<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Task;
use App\Models\User;
use App\Models\Category;

class TaskFactory extends Factory
{
    protected $model = Task::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'user_id' => User::factory(), // Creates a user if none exists
            'category_id' => Category::factory(), // Creates a category if none exists
            // 'status' => $this->faker->randomElement(['pending', 'completed', 'failed', 'active']),
        ];
    }
}
