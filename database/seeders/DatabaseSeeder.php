<?php

namespace Database\Seeders;

use App\Models\Tour;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\productFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Boobie',
            'email' => 'Boogie@Boogie.com',
        ]);

//        Tour::factory(100)->create();
    }
}
