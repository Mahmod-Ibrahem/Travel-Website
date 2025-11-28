<?php

namespace Modules\Location\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Location\Entities\Location;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Location\Entities\Location>
 */
class LocationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Location::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->city(),
            'image' => 'locations/default.jpg',
            'position' => fake()->numberBetween(0, 100),
        ];
    }
}
