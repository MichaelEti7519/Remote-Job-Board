<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // AI: Suggested simulated payment workflow
        $this->call([
            FreelancerSeeder::class,
            ProjectSeeder::class,
        ]);
    }
}
