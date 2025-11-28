<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\Exclusion\Database\seeders\ExclusionSeeder;
use Modules\Inclusion\Database\seeders\InclusionSeeder;
use Modules\Location\Database\seeders\LocationSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'ElGobaya',
            'email' => 'Hamad@gmail.com',
        ]);
        $this->call([
            LocationSeeder::class,
            InclusionSeeder::class,
            ExclusionSeeder::class,
        ]);
    }
}
