<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'fname' => fake()->firstName(),
            'lname' => fake()->lastName(),
            'nic' => fake()->unique()->randomNumber(9) . 'V',
            'name_prefix' => fake()->randomElement(['Mr', 'Mrs', 'Miss', 'Dr', 'Prof', 'Rev', 'Other']),
            'gender' => fake()->randomElement(['Male', 'Female', 'Other']),
            'pno' => fake()->unique()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'school' => fake()->company(),
            'description' => fake()->text(),
            'updated_by' => User::get()->random()->id,
            'created_by' => User::get()->random()->id,
            'state' => fake()->randomElement([0, 1]),

        ];
    }
}
