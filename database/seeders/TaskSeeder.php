<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Task;
use Carbon\Carbon;

class TaskSeeder extends Seeder
{
    public function run()
    {
        $tasks = [
            [
                'title' => 'Complete project',
                'description' => 'Finish the Laravel project for client ABC before the deadline.',
                'user_id' => 1,
                'category_id' => 1, // Work
                'date' => Carbon::now()->format('Y-m-d'),
            ],
            [
                'title' => 'Plan weekly meeting',
                'description' => 'Schedule the weekly team meeting and prepare the agenda for next week.',
                'user_id' => 1,
                'category_id' => 1, // Work
                'date' => Carbon::now()->addDay()->format('Y-m-d'),
            ],
            [
                'title' => 'Buy groceries',
                'description' => 'Purchase fresh fruits, vegetables, dairy, and other essentials from the supermarket.',
                'user_id' => 2,
                'category_id' => 2, // Personal
                'date' => Carbon::now()->addDays(1)->format('Y-m-d'),
            ],
            [
                'title' => 'Attend doctor\'s appointment',
                'description' => 'Visit the clinic for a regular check-up and necessary blood tests.',
                'user_id' => 2,
                'category_id' => 4, // Health
                'date' => Carbon::now()->addDays(2)->format('Y-m-d'),
            ],
            [
                'title' => 'Take prescribed medicine',
                'description' => 'Ensure the prescribed medicine is taken in the morning and at night as directed.',
                'user_id' => 2,
                'category_id' => 6, // Medicine
                'date' => Carbon::now()->addDays(2)->format('Y-m-d'),
            ],
            [
                'title' => 'Prepare presentation',
                'description' => 'Create slides and rehearse the presentation for the upcoming client meeting.',
                'user_id' => 1,
                'category_id' => 1, // Work
                'date' => Carbon::now()->addDays(3)->format('Y-m-d'),
            ],
            [
                'title' => 'Schedule workout session',
                'description' => 'Book a slot at the gym and plan the workout routine for the week.',
                'user_id' => 3,
                'category_id' => 4, // Health
                'date' => Carbon::now()->addDay()->format('Y-m-d'),
            ],
            [
                'title' => 'Plan vacation itinerary',
                'description' => 'Research destinations and organize an itinerary for the upcoming vacation.',
                'user_id' => 3,
                'category_id' => 7, // Vacation
                'date' => Carbon::now()->addDays(10)->format('Y-m-d'),
            ],
            [
                'title' => 'Call family',
                'description' => 'Schedule a video call with family members to catch up and plan the weekend.',
                'user_id' => 2,
                'category_id' => 2, // Personal
                'date' => Carbon::now()->addDay()->format('Y-m-d'),
            ],
            [
                'title' => 'Fix website bug',
                'description' => 'Identify the bug reported by users and deploy a fix on the company website.',
                'user_id' => 1,
                'category_id' => 1, // Work
                'date' => Carbon::now()->addDays(2)->format('Y-m-d'),
            ],
            [
                'title' => 'Organize bedroom',
                'description' => 'Clean, declutter, and organize the bedroom, including closet and storage areas.',
                'user_id' => 2,
                'category_id' => 2, // Personal
                'date' => Carbon::now()->addDays(1)->format('Y-m-d'),
            ],
            [
                'title' => 'Go for a run',
                'description' => 'Run 5 kilometers in the park for cardio and endurance training.',
                'user_id' => 3,
                'category_id' => 4, // Health
                'date' => Carbon::now()->addDays(1)->format('Y-m-d'),
            ],
            [
                'title' => 'Prepare healthy meal',
                'description' => 'Cook a nutritious dinner with lean protein, vegetables, and whole grains.',
                'user_id' => 2,
                'category_id' => 5, // Eating
                'date' => Carbon::now()->addDays(1)->format('Y-m-d'),
            ],
            [
                'title' => 'Review project budget',
                'description' => 'Analyze and adjust the budget for the current project based on recent expenses.',
                'user_id' => 1,
                'category_id' => 1, // Work
                'date' => Carbon::now()->addDays(3)->format('Y-m-d'),
            ],
            [
                'title' => 'Meditate for 20 minutes',
                'description' => 'Dedicate time to meditate and reduce stress for improved focus.',
                'user_id' => 2,
                'category_id' => 2, // Personal
                'date' => Carbon::now()->addDay()->format('Y-m-d'),
            ],
            [
                'title' => 'Attend webinar on tech trends',
                'description' => 'Participate in an online webinar to learn about emerging trends in technology.',
                'user_id' => 1,
                'category_id' => 1, // Work
                'date' => Carbon::now()->addDays(4)->format('Y-m-d'),
            ],
            [
                'title' => 'Schedule dental check-up',
                'description' => 'Book an appointment with the dentist for a routine cleaning and check-up.',
                'user_id' => 2,
                'category_id' => 4, // Health
                'date' => Carbon::now()->addDays(3)->format('Y-m-d'),
            ],
            [
                'title' => 'Update resume',
                'description' => 'Revise and update the resume with recent job experiences and skills.',
                'user_id' => 1,
                'category_id' => 1, // Work
                'date' => Carbon::now()->addDays(2)->format('Y-m-d'),
            ],
            [
                'title' => 'Book flight tickets',
                'description' => 'Compare flight options and book tickets for the planned vacation.',
                'user_id' => 3,
                'category_id' => 7, // Vacation
                'date' => Carbon::now()->addDays(10)->format('Y-m-d'),
            ],
            [
                'title' => 'Plan bedtime routine',
                'description' => 'Establish a consistent bedtime routine to improve sleep quality and overall health.',
                'user_id' => 2,
                'category_id' => 8, // Sleep
                'date' => Carbon::now()->addDay()->format('Y-m-d'),
            ],
        ];

        foreach ($tasks as $task) {
            Task::create($task);
        }
    }
}
