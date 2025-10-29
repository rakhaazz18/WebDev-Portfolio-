<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class RealProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing projects
        Project::truncate();

        $projects = [
            [
                'title' => 'Google Developer Group Event',
                'description' => 'GDG (Google Developer Group) event at Universitas Ciputra Makassar. A technology event discussing application development with Google Cloud and AI technology. I was involved as Public Relations in organizing this event.',
                'image_url' => '/images/projects/gdg-event.jpg',
                'demo_url' => null,
                'github_url' => null,
                'technologies' => ['Event Management', 'Public Relations', 'Google Cloud', 'Community Building'],
                'completed_date' => '2024-01-01',
                'is_featured' => true,
            ],
            [
                'title' => 'Build with AI - Google Cloud Roadshow',
                'description' => 'Participation in Google Cloud Roadshow 2025 with the theme "Build with AI". An event focused on developing applications using AI and machine learning from Google Cloud Platform.',
                'image_url' => '/images/projects/google-roadshow.jpg',
                'demo_url' => null,
                'github_url' => null,
                'technologies' => ['Google Cloud', 'AI', 'Machine Learning', 'Workshop'],
                'completed_date' => '2025-01-01',
                'is_featured' => true,
            ],
            [
                'title' => 'Entrance 3.0 Event',
                'description' => 'Entrance 3.0 event organized by MSU (Mahasiswa Student Union). As Sponsorship Coordinator, I was responsible for seeking and managing sponsorships from various companies to support this event.',
                'image_url' => '/images/projects/entrance-event.jpg',
                'demo_url' => null,
                'github_url' => null,
                'technologies' => ['Sponsorship', 'Event Coordination', 'Leadership', 'Partnership'],
                'completed_date' => '2023-12-01',
                'is_featured' => true,
            ],
            [
                'title' => 'Developer Festival (DevFest)',
                'description' => 'Developer Festival organized by GDG UC. I played a role in the logistics division responsible for preparing event needs and decorations.',
                'image_url' => '/images/projects/devfest.jpg',
                'demo_url' => null,
                'github_url' => null,
                'technologies' => ['Event Planning', 'Logistics', 'Team Collaboration'],
                'completed_date' => '2024-06-01',
                'is_featured' => false,
            ],
            [
                'title' => 'ISU (Informatika Student Union) Activities',
                'description' => 'Activities as Student Academic at ISU (Informatika Student Union). Managing IMT student database, organizing Fun Club events, and assisting with student competition administration.',
                'image_url' => '/images/projects/isu-activities.jpg',
                'demo_url' => null,
                'github_url' => null,
                'technologies' => ['Student Management', 'Database', 'Event Organization', 'Administration'],
                'completed_date' => '2024-01-01',
                'is_featured' => false,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }

        $this->command->info('✅ Real projects data seeded successfully!');
        $this->command->info('   - Total: ' . count($projects) . ' projects');
        $this->command->info('   - Featured: 3 projects');
        $this->command->info('');
        $this->command->warn('⚠️  Please copy your images to public/images/projects/ folder:');
        $this->command->warn('   - gdg-event.jpg');
        $this->command->warn('   - google-roadshow.jpg');
        $this->command->warn('   - entrance-event.jpg');
        $this->command->warn('   - devfest.jpg');
        $this->command->warn('   - isu-activities.jpg');
    }
}
