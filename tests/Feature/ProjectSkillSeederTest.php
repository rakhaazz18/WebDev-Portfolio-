<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProjectSkillSeederTest extends TestCase
{
    use RefreshDatabase;

    public function test_project_skill_seeder_populates_database_and_relations()
    {
        // Run the DatabaseSeeder which calls ProjectSkillSeeder
        $this->seed(\Database\Seeders\DatabaseSeeder::class);

        // Assert that Test User exists
        $this->assertDatabaseHas('users', [
            'email' => 'test@example.com',
        ]);

        // There should be at least one skill and one project
        $this->assertTrue(\App\Models\Skill::count() >= 1);
        $this->assertTrue(\App\Models\Project::count() >= 1);

        // Fetch a project with relations
        $project = \App\Models\Project::with('user', 'skills')->first();
        $this->assertNotNull($project, 'No project was created by the seeder');
        $this->assertNotNull($project->user, 'Project does not have an assigned user');
        $this->assertGreaterThanOrEqual(1, $project->skills->count(), 'Project should have at least one skill attached');
    }
}
