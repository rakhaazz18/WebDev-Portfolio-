<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProjectSkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create some users (in addition to Test User from DatabaseSeeder)
        \App\Models\User::factory(3)->create();

        // Create skills
        \App\Models\Skill::factory(12)->create();

        $userIds = \App\Models\User::pluck('id')->toArray();

        // Create projects and attach random skills and assign a random user owner
        \App\Models\Project::factory(8)->create()->each(function ($project) use ($userIds) {
            // Assign random user owner
            $project->user_id = $userIds[array_rand($userIds)];
            $project->save();

            // Attach random skills
            $skillIds = \App\Models\Skill::inRandomOrder()->take(rand(1,5))->pluck('id')->toArray();
            $project->skills()->attach($skillIds);
        });
    }
}
