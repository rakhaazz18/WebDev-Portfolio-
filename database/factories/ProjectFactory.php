<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $techStacks = [
            ['Laravel', 'Vue.js', 'MySQL', 'Tailwind CSS'],
            ['React', 'Node.js', 'MongoDB', 'Express'],
            ['PHP', 'JavaScript', 'PostgreSQL', 'Bootstrap'],
            ['Next.js', 'TypeScript', 'Prisma', 'Tailwind'],
            ['Django', 'Python', 'SQLite', 'React'],
        ];
        
        return [
            'title' => fake()->catchPhrase() . ' ' . fake()->randomElement(['Platform', 'App', 'Website', 'System', 'Tool']),
            'description' => fake()->paragraph(3),
            'image_url' => fake()->imageUrl(640, 480, 'business', true),
            'demo_url' => fake()->optional(0.7)->url(),
            'github_url' => fake()->optional(0.8)->url(),
            'technologies' => json_encode(fake()->randomElement($techStacks)),
            'completed_date' => fake()->dateTimeBetween('-2 years', 'now'),
            'is_featured' => fake()->boolean(30),
        ];
    }
}
