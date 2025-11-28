<?php

namespace Modules\Location\Database\seeders;

use Illuminate\Database\Seeder;

class LocationDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            LocationSeeder::class,
        ]);
    }
}
