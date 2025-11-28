<?php

namespace Modules\Exclusion\Database\seeders;

use Illuminate\Database\Seeder;

class ExclusionDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call([
            ExclusionSeeder::class,
        ]);
    }
}
