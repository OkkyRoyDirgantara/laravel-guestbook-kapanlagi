<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GuestBookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'body' => $this->faker->text,
            'organization' => $this->faker->company,
            'address' => $this->faker->address,
            'province' => $this->faker->state,
            'city' => $this->faker->city,
            'email' => $this->faker->safeEmail,
        ];
    }
}
