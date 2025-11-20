<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Experience;

class RealExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing data
        Experience::truncate();

        // Data from CV Andi Muhammad Rakha Zulkarnain
        $experiences = [
            [
                'position' => 'Student Academic (Member)',
                'company' => 'Informatika Student Union (ISU)',
                'location' => 'Universitas Ciputra Makassar',
                'description' => 'Managing IMT events through Google Forms and discussing results with the study program, results from discussions will be realized in Fun Club. Recording every IMT student\'s progress through dedicated spreadsheets for those who have participated in competitions or are in progress. Assisting in preparing documents or assignment letters for IMT student competitions.',
                'image_url' => '/images/projects/isu-activities.jpg',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'is_current' => true,
            ],
            [
                'position' => 'Public Relations (Member)',
                'company' => 'Google Developer Group (GDG UC)',
                'location' => 'Universitas Ciputra Makassar',
                'description' => 'Served as MC at Zoom seminar events organized by GDG UC',
                'image_url' => '/images/projects/gdg-event.jpg',
                'start_date' => '2024-01-01',
                'end_date' => null,
                'is_current' => true,
            ],
            [
                'position' => 'Logistics (Member)',
                'company' => 'Developer Festival (GDG UC Event)',
                'location' => 'Universitas Ciputra Makassar',
                'description' => 'Providing all event needs on D-1 and decorating every part of the event and assisting with backstage needs',
                'image_url' => '/images/projects/devfest.jpg',
                'start_date' => '2024-01-01',
                'end_date' => '2024-12-31',
                'is_current' => false,
            ],
            [
                'position' => 'Marketing (Member)',
                'company' => 'NPLC (National Programming Language Competition)',
                'location' => 'National Competition',
                'description' => 'Assigned to several schools to deliver invitation letters and competition posters. Served as rally games committee on the event day',
                'image_url' => '/images/projects/google-roadshow.jpg',
                'start_date' => '2024-01-01',
                'end_date' => '2024-12-31',
                'is_current' => false,
            ],
            [
                'position' => 'Sponsorship (Coordinator)',
                'company' => 'Entrance 3.0 (MSU Event)',
                'location' => 'Universitas Ciputra Makassar',
                'description' => 'Finding contacts and delivering company proposals both physically and digitally. Seeking companies with potential to become event sponsors. Leading the sponsorship division and gaining leadership experience',
                'image_url' => '/images/projects/entrance-event.jpg',
                'start_date' => '2023-01-01',
                'end_date' => '2023-12-31',
                'is_current' => false,
            ],
        ];

        foreach ($experiences as $experience) {
            Experience::create($experience);
        }

        $this->command->info('✅ Real experience data from CV seeded successfully!');
        $this->command->info('   - Total: ' . count($experiences) . ' experiences');
    }
}
