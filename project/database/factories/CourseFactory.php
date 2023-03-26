<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $courses = [
            'Web Programming',
            'Data Warehouse',
            'Algorithm',
            'Discrete Mathematics',
            'English',
            'Machine Learning',
            'Artificial Intelligent',
            'Database Design',
            'Object-Oriented Programming',
            'Advance Object-Oriented Programming',
            'Operating System',
            'Data Structures',
            'Database System',
            'Computer Networks',
            'Software Engineering',
            'Business Communication'
        ];
        return [
            'code' => fake()->unique()->bothify('########'),
            'name' => fake()->unique()->randomElement($courses),
        ];
    }
}
