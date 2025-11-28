<?php

namespace Modules\Inclusion\Database\seeders;

use Illuminate\Database\Seeder;

class InclusionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            InclusionSeeder::class,
        ]);
    }
}
