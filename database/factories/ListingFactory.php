<?php

namespace Database\Factories;

use App\Models\Listing;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'beds' => $this->faker->numberBetween(1, 7),
            'baths' => $this->faker->numberBetween(1, 7),
            'area' => $this->faker->numberBetween(30, 400),
            'city' => $this->faker->city(),
            'code' => $this->faker->postcode(),
            'street' => $this->faker->streetName(),
            'street_nr' => $this->faker->streetAddress(),
            'price' => $this->faker->randomFloat(50_000, 2_000_000),
        ];
    }
}
