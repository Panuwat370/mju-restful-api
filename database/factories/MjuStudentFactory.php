<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MjuStudent>
 */
class MjuStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_code' => fake()->unique()->randomNumber(8),
            'first_name' => fake('th_TH')->firstName,
            'last_name' => fake('th_TH')->lastName,
            'first_name_en' => fake()->firstName,
            'last_name_en' => fake()->lastName,
            'major_id' => fake()->numberBetween(1, 5),
            'idcard' => fake()->unique()->regexify('[0-9]{13}'),
            'birthdate' => fake()->date,
            'gender' => fake()->randomElement(['M', 'F']),
            'address' => fake()->address,
            'phone' => fake()->phoneNumber,
            'email' => fake()->unique()->safeEmail,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}