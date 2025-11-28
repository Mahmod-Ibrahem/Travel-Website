<?php

namespace Modules\Exclusion\Database\seeders;

use Illuminate\Database\Seeder;
use Modules\Exclusion\Entities\Exclusion;

class ExclusionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $exclusions = [
            ['title' => 'Personal Expenses'],
            ['title' => 'Gratuities'],
            ['title' => 'Optional Activities'],
            ['title' => 'Alcoholic Beverages'],
            ['title' => 'Flight Tickets'],
            ['title' => 'Visa Fees'],
            ['title' => 'Travel Insurance (Optional)'],
            ['title' => 'Additional Meals Not Mentioned'],
            ['title' => 'Entrance to Optional Sites'],
            ['title' => 'Shopping Costs'],
            ['title' => 'Any Activities Not Mentioned in Itinerary'],
            ['title' => 'Airport Transfers (if not specified)'],
            ['title' => 'International Phone Calls'],
            ['title' => 'Laundry Services'],
            ['title' => 'Hotel Accommodation (for day tours)'],
        ];

        foreach ($exclusions as $exclusion) {
            Exclusion::create($exclusion);
        }
    }
}
