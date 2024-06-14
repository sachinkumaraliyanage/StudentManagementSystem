<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\student>
 */
class StudentFactory extends Factory
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
            'gender' => fake()->randomElement(['Male', 'Female', 'Other']),
            'student_phone' => fake()->unique()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'address' => fake()->address(),
            'dob' => fake()->date(),
            'school' => fake()->company(),
            'parent_name' => fake()->name(),
            'parent_phone' => fake()->phoneNumber(),
            'parent_address' => fake()->address(),
            'parent_nic' => fake()->unique()->randomNumber(9) . 'V',
            'parent_email' => fake()->unique()->safeEmail(),
            'updated_by' => User::get()->random()->id,
            'created_by' => User::get()->random()->id,
            'state' => fake()->randomElement([0, 1]),

        ];
    }
}
