<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SecurityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'username' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => bcrypt('iijs@123'), // password
            'remember_token' => Str::random(10),
        ];
    }
}
