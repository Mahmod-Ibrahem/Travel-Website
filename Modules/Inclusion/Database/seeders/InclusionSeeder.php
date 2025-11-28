<?php

namespace Modules\Inclusion\Database\seeders;

use Illuminate\Database\Seeder;
use Modules\Inclusion\Entities\Inclusion;

class InclusionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $inclusions = [
            ['title' => 'Hotel Pickup and Drop-off'],
            ['title' => 'Professional Tour Guide'],
            ['title' => 'Entry Fees to All Sites'],
            ['title' => 'Lunch at Local Restaurant'],
            ['title' => 'Air-conditioned Vehicle'],
            ['title' => 'Bottled Water'],
            ['title' => 'All Taxes and Service Charges'],
            ['title' => 'Snacks and Refreshments'],
            ['title' => 'Travel Insurance'],
            ['title' => 'Photography Services'],
            ['title' => 'Breakfast'],
            ['title' => 'Dinner'],
            ['title' => 'WiFi on Board'],
            ['title' => 'Licensed Egyptologist Guide'],
            ['title' => 'Traditional Egyptian Lunch'],
        ];

        foreach ($inclusions as $inclusion) {
            Inclusion::create($inclusion);
        }
    }
}
