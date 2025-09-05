<?php

namespace Database\Seeders;

use App\Models\Listing;
use App\Models\User;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'is_admin' => true,
        ]);

        User::factory()->create([
            'name' => 'Test User 2',
            'email' => 'test@example2.com',
            'is_admin' => false,
        ]);

        Listing::factory(2)->create([
            'user_id' => 1,
        ]);
        Listing::factory(10)->create([
            'user_id' => 2,
        ]);
    }
}
