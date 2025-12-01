<?php

namespace Modules\Location\Database\seeders;

use Illuminate\Database\Seeder;
use Modules\Location\Entities\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['name' => 'Cairo', 'image' => 'locations/cairo.jpg'],
            ['name' => 'Giza', 'image' => 'locations/giza.jpg'],
            ['name' => 'Luxor', 'image' => 'locations/luxor.jpg'],
            ['name' => 'Aswan', 'image' => 'locations/aswan.jpg'],
            ['name' => 'Alexandria', 'image' => 'locations/alexandria.jpg'],
            ['name' => 'Hurghada', 'image' => 'locations/hurghada.jpg'],
            ['name' => 'Sharm El Sheikh', 'image' => 'locations/sharm.jpg'],
            ['name' => 'Dahab', 'image' => 'locations/dahab.jpg'],
            ['name' => 'Marsa Alam', 'image' => 'locations/marsa-alam.jpg'],
            ['name' => 'Siwa Oasis', 'image' => 'locations/siwa.jpg'],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
