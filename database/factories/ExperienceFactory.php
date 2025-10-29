<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = fake()->dateTimeBetween('-5 years', '-6 months');
        $isCurrent = fake()->boolean(30);
        
        return [
            'position' => fake()->randomElement([
                'Senior Full Stack Developer',
                'Frontend Developer',
                'Backend Developer',
                'UI/UX Designer',
                'Web Developer',
                'Software Engineer',
                'DevOps Engineer',
                'Product Designer',
                'Lead Developer',
                'Technical Lead'
            ]),
            'company' => fake()->company(),
            'location' => fake()->city() . ', ' . fake()->country(),
            'description' => fake()->paragraph(3),
            'start_date' => $startDate,
            'end_date' => $isCurrent ? null : fake()->dateTimeBetween($startDate, 'now'),
            'is_current' => $isCurrent,
        ];
    }
}
