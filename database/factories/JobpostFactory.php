<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class JobpostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => 1,
            'company' => $this->faker->company,
            'title' => $this->faker->jobTitle,
            'experience' => $this->faker->numberBetween(1, 20),
            'salary' => $this->faker->numberBetween(500, 5000),
            'skills' => implode(',', $this->faker->words(3)),
            'location' => $this->faker->city,
            'job_link' => $this->faker->url,
            'description' => $this->faker->paragraph,
            'updated_at' => $this->faker->dateTimeBetween('-1 year', '-1 day')->format('m/d/Y'),
            'created_at' => $this->faker->dateTimeBetween('-2 year', '-1 year')->format('m/d/Y')
        ];
    }
}
