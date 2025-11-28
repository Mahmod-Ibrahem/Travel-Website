<?php

namespace Modules\Exclusion\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Exclusion\Entities\Exclusion;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Exclusion\Entities\Exclusion>
 */
class ExclusionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Exclusion::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $exclusions = [
            'Personal Expenses',
            'Gratuities',
            'Optional Activities',
            'Alcoholic Beverages',
            'Flight Tickets',
            'Visa Fees',
            'Travel Insurance (Optional)',
            'Additional Meals',
            'Entrance to Optional Sites',
            'Shopping Costs',
        ];

        return [
            'title' => fake()->unique()->randomElement($exclusions),
        ];
    }
}
