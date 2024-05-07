<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Lead;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lead>
 */
class LeadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name,
            'first_name'=>fake()->firstName,
            'phone'=>fake()->phoneNumber,
            'email'=>fake()->email,
            'address'=>fake()->address,
            'postcode'=>fake()->postcode,
            'city'=>fake()->city,
            'country'=>fake()->country,
            'gender'=>fake()->randomElement(Lead::$gender),
            'description'=>fake()->paragraph(2),
        ];
    }
}
