<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = ['Frontend', 'Backend', 'Database', 'DevOps', 'Design', 'Tools'];
        $skills = [
            'Frontend' => ['React', 'Vue.js', 'Angular', 'HTML/CSS', 'JavaScript', 'TypeScript', 'Tailwind CSS', 'Bootstrap'],
            'Backend' => ['Laravel', 'Node.js', 'Express.js', 'PHP', 'Python', 'Django', 'REST API', 'GraphQL'],
            'Database' => ['MySQL', 'PostgreSQL', 'MongoDB', 'Redis', 'SQLite'],
            'DevOps' => ['Docker', 'Git', 'CI/CD', 'AWS', 'Linux', 'Nginx'],
            'Design' => ['Figma', 'Adobe XD', 'Photoshop', 'Illustrator'],
            'Tools' => ['VS Code', 'Postman', 'Jira', 'Slack', 'npm', 'Composer']
        ];
        
        $category = fake()->randomElement($categories);
        $skillName = fake()->randomElement($skills[$category]);
        
        return [
            'name' => $skillName,
            'category' => $category,
            'proficiency' => fake()->numberBetween(60, 100),
            'description' => fake()->optional()->sentence(),
        ];
    }
}
