<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Experience;
use App\Models\Skill;
use App\Models\Project;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        Experience::truncate();
        Skill::truncate();
        Project::truncate();

        // Generate Experience data (5 entries)
        Experience::factory()->count(5)->create();
        
        // Generate Skills data (10 entries)
        Skill::factory()->count(10)->create();
        
        // Generate Projects data (6 entries, 3 featured)
        Project::factory()->count(3)->create(['is_featured' => true]);
        Project::factory()->count(3)->create(['is_featured' => false]);

        $this->command->info('Portfolio data seeded successfully!');
        $this->command->info('- Experiences: 5');
        $this->command->info('- Skills: 10');
        $this->command->info('- Projects: 6 (3 featured)');
    }
}
