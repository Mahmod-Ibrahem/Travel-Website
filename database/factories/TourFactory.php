<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tour>
 */
class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'group' => $this->faker->randomElement(['SeaShoreTours','SafariAdventures','LayoverTours']),
            'slug' => $this->faker->slug(),
            'preference' => $this->faker->randomElement(['limited_offers', 'hidden_gems', 'recommended']),
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'tour_cover' => $this->faker->imageUrl(800, 600, 'travel'),
            'itenary_title' => $this->faker->sentence(),
            'locations' => json_encode([
                'address' => 'asdsad',
            ]),
            'places' => $this->faker->words(3, true),
            'itenary_section' => $this->faker->paragraph(),
            'included' => $this->faker->words(5, true),
            'excluded' => $this->faker->words(5, true),
            'duration' => $this->faker->numberBetween(1, 14) . ' days',
            'price_per_person' => $this->faker->randomFloat(2, 100, 1000),
            'price_two_five' => $this->faker->randomFloat(2, 500, 4000),
            'price_six_twenty' => $this->faker->randomFloat(2, 2000, 15000),
        ];
    }
}
