<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class   DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        $this->call([
            BrandsTableSeeder::class,        // 1. Create Brands first
            OccasionsTableSeeder::class,     // 2. Create Occasion options
            SeasonsTableSeeder::class,       // 3. Create Season options
            PerfumesTableSeeder::class,      // 4. Create Perfumes (Now they can find their Brands!)
            OccasionPerfumeTableSeeder::class, // 5. Link Perfumes to Occasions
            PerfumeSeasonTableSeeder::class,   // 6. Link Perfumes to Seasons
        ]);
        $this->call(PerfumesTableSeeder::class);
        $this->call(OccasionPerfumeTableSeeder::class);
        $this->call(PerfumeSeasonTableSeeder::class);
    }
}
