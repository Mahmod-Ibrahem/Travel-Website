<?php

namespace Modules\Inclusion\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Inclusion\Entities\Inclusion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Inclusion\Entities\Inclusion>
 */
class InclusionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Inclusion::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $inclusions = [
            'Hotel Pickup and Drop-off',
            'Professional Tour Guide',
            'Entry Fees to All Sites',
            'Lunch at Local Restaurant',
            'Air-conditioned Vehicle',
            'Bottled Water',
            'All Taxes and Service Charges',
            'Snacks and Refreshments',
            'Travel Insurance',
            'Photography Services',
        ];

        return [
            'title' => fake()->unique()->randomElement($inclusions),
        ];
    }
}
