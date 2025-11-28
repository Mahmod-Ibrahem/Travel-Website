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
            ['name' => 'Cairo', 'image' => 'locations/cairo.jpg', 'position' => 1],
            ['name' => 'Giza', 'image' => 'locations/giza.jpg', 'position' => 2],
            ['name' => 'Luxor', 'image' => 'locations/luxor.jpg', 'position' => 3],
            ['name' => 'Aswan', 'image' => 'locations/aswan.jpg', 'position' => 4],
            ['name' => 'Alexandria', 'image' => 'locations/alexandria.jpg', 'position' => 5],
            ['name' => 'Hurghada', 'image' => 'locations/hurghada.jpg', 'position' => 6],
            ['name' => 'Sharm El Sheikh', 'image' => 'locations/sharm.jpg', 'position' => 7],
            ['name' => 'Dahab', 'image' => 'locations/dahab.jpg', 'position' => 8],
            ['name' => 'Marsa Alam', 'image' => 'locations/marsa-alam.jpg', 'position' => 9],
            ['name' => 'Siwa Oasis', 'image' => 'locations/siwa.jpg', 'position' => 10],
        ];

        foreach ($locations as $location) {
            Location::create($location);
        }
    }
}
